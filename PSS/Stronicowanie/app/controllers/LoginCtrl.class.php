<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;
use core\SessionUtils; // Import SessionUtils
use app\forms\LoginForm;

class LoginCtrl {

    private $form;

    public function __construct() {
        $this->form = new LoginForm();
    }

    public function validate() {
        $this->form->login = ParamUtils::getFromRequest('login', true, 'Nie podano loginu');
        $this->form->pass = ParamUtils::getFromRequest('pass', true, 'Nie podano hasła');
    
        if (App::getMessages()->isError()) {
            return false;
        }
    
        try {
            // Pobranie użytkownika z bazy danych na podstawie loginu
            $user = App::getDB()->get("users", [
                "idUser",
                "username",
                "password",
                "idRole"
            ], [
                "username" => $this->form->login
            ]);
    
            if (!$user) {
                Utils::addErrorMessage('Niepoprawny login');
                return false;
            }
    
            // Weryfikacja hasła
            if (!password_verify($this->form->pass, $user["password"])) {
                Utils::addErrorMessage('Niepoprawne hasło');
                return false;
            }
    
            // Sprawdzenie, czy rola użytkownika jest aktywna
            $isRoleActive = App::getDB()->get("roles", "isActive", [
                "idRole" => $user["idRole"]
            ]);
    
            if (!$isRoleActive) {
                Utils::addErrorMessage('Twoja rola jest nieaktywna. Skontaktuj się z administratorem.');
                return false;
            }

            $isBlocked = App::getDB()->get("users", "isBlocked", [
                "idUser" => $user["idUser"] // Sprawdzamy blokadę dla konkretnego użytkownika
            ]);
            
            if ($isBlocked) {
                Utils::addErrorMessage('Twoje konto jest zablokowane. Skontaktuj się z administratorem.');
                return false;
            }
            
    
            // Zapisanie nazwy użytkownika w sesji
            SessionUtils::store('idUser', $user['idUser']);
    
            // Przypisywanie ról na podstawie idRole
            switch ($user["idRole"]) {
                case 1: // ID roli administratora
                    RoleUtils::addRole('admin');
                    break;
                case 2: // ID roli userHelpdesk
                    RoleUtils::addRole('userHelpdesk');
                    break;
                case 3: // ID roli userReporting
                    RoleUtils::addRole('userReporting');
                    break;
                default:
                    Utils::addErrorMessage('Brak przypisanej roli');
                    return false;
            }
    
            Utils::addInfoMessage('Zalogowano poprawnie');
            return true;
    
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Błąd podczas logowania');
            if (App::getConf()->debug) {
                Utils::addErrorMessage($e->getMessage());
            }
            return false;
        }
    }
    public function action_logout() {
        // 1. zakończenie sesji
        session_destroy();
        // 2. idź na stronę główną - system automatycznie przekieruje do strony logowania
        App::getRouter()->redirectTo('personList');
    }
    public function action_roleError() {
        // Pobierz komunikat o błędzie z sesji
        $errorMessage = SessionUtils::load('error_message', true);
    
        // Dodaj komunikat do systemu wiadomości, jeśli istnieje
        if ($errorMessage) {
            Utils::addErrorMessage($errorMessage);
            $this->generateView();
        }
    
    }

    public function action_loginShow() {
        $this->generateView();
    }

    public function action_login() {
        if ($this->validate()) {
            if (RoleUtils::inRole('admin')) {
                App::getRouter()->redirectTo('userList');
                return;
            }
            // Przechowanie wiadomości w sesji
            $_SESSION['info_message'] = 'Poprawnie zalogowano do systemu';
    
            App::getRouter()->redirectTo("ticketList"); // Po zalogowaniu przekierowanie na listę zgłoszeń
        } else {
            $this->generateView();
        }
    }
    




   
    public function generateView() {
        App::getSmarty()->assign('form', $this->form); // dane formularza do widoku
        App::getSmarty()->display('LoginView.tpl');
    }
} 