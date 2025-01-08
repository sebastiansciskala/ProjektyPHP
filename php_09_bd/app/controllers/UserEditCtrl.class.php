<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\UserEditForm;
use core\SessionUtils; 

class UserEditCtrl {
    
    private $form; // dane formularza

    public function __construct() {
        $this->form = new UserEditForm();
    }

    // Walidacja danych przed zapisem (nowe dane lub edycja).
    public function validateSave() {
        $this->form->id = ParamUtils::getFromRequest('id', true, 'Błędne wywołanie aplikacji');
        $this->form->username = ParamUtils::getFromRequest('username', true, 'Błędne wywołanie aplikacji');
        $this->form->email = ParamUtils::getFromRequest('email', true, 'Błędne wywołanie aplikacji');
        $this->form->idRole = ParamUtils::getFromRequest('idRole', true, 'Błędne wywołanie aplikacji');
        $this->form->password = ParamUtils::getFromRequest('password', false); // Przypisanie hasła do formularza
    
        if (App::getMessages()->isError()) return false;
    
        if (empty(trim($this->form->username))) {
            Utils::addErrorMessage('Wprowadź nazwę użytkownika');
        }
        if (empty(trim($this->form->email))) {
            Utils::addErrorMessage('Wprowadź adres email');
        }
        if (empty($this->form->idRole)) {
            Utils::addErrorMessage('Wybierz rolę użytkownika');
        }
    
        // Walidacja hasła dla nowego użytkownika
        if (empty($this->form->id) && (empty($this->form->password) || strlen($this->form->password) < 8)) {
            Utils::addErrorMessage('Hasło jest wymagane i musi mieć co najmniej 8 znaków.');
        }
    
        return !App::getMessages()->isError();
    }

    public function validateEdit() {
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function action_userNew() {
        $this->generateView();
    }

    public function action_userEdit() {
        if ($this->validateEdit()) {
            try {
                $record = App::getDB()->get("users", "*", [
                    "idUser" => $this->form->id
                ]);

                $this->form->id = $record['idUser'];
                $this->form->username = $record['username'];
                $this->form->email = $record['email'];
                $this->form->idRole = $record['idRole'];
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        $this->generateView();
    }

    public function action_userDelete() {
        if ($this->validateEdit()) {
            try {
                App::getDB()->delete("users", [
                    "idUser" => $this->form->id
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        App::getRouter()->forwardTo('userList');
    }

    public function action_userSave() {
        if ($this->validateSave()) {
            try {
                $currentUserId = SessionUtils::load('idUser'); 
                if ($this->form->id == '') { // Nowy użytkownik
                    $insertData = [
                        "username" => $this->form->username,
                        "email" => $this->form->email,
                        "idRole" => $this->form->idRole,
                        "createdBy" => $currentUserId,
                        "password" => password_hash($this->form->password, PASSWORD_DEFAULT) // Użycie hasła z formularza
                    ];
    
                    App::getDB()->insert("users", $insertData);
                    Utils::addInfoMessage('Pomyślnie dodano nowego użytkownika.');
                } else { // Edycja użytkownika
                    $updateData = [
                        "username" => $this->form->username,
                        "email" => $this->form->email,
                        "idRole" => $this->form->idRole
                    ];
    
                    if (!empty($this->form->password)) { // Aktualizuj hasło tylko, jeśli podane
                        $updateData["password"] = password_hash($this->form->password, PASSWORD_DEFAULT);
                    }
    
                    App::getDB()->update("users", $updateData, [
                        "idUser" => $this->form->id
                    ]);
                    Utils::addInfoMessage('Pomyślnie zaktualizowano dane użytkownika.');
                }
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas zapisywania danych użytkownika.');
                if (App::getConf()->debug) {
                    Utils::addErrorMessage($e->getMessage());
                }
            }
    
            App::getRouter()->forwardTo('userList');
        } else {
            $this->generateView();
        }
    }
    

    public function generateView() {
        App::getSmarty()->assign('form', $this->form); // dane formularza dla widoku
        App::getSmarty()->assign('roles', App::getDB()->select("roles", ["idRole", "roleName"])); // lista ról
        App::getSmarty()->display('UserEdit.tpl');
    }
}
