<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;

class RoleEditCtrl {

    private $roles; // Przechowuje listę ról

    public function action_roleList() {
        try {
            // Pobranie listy ról z bazy danych
            $this->roles = App::getDB()->select("roles", [
                "idRole",
                "roleName",
                "isActive" // Zakładamy, że jest kolumna 'isActive' w tabeli 'roles'
            ]);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania listy ról.');
            if (App::getConf()->debug) {
                Utils::addErrorMessage($e->getMessage());
            }
        }

        // Przekazanie danych do widoku
        App::getSmarty()->assign('roles', $this->roles);
        App::getSmarty()->display('RoleList.tpl');
    }

    public function action_roleToggle() {
        // Pobranie ID roli z adresu URL
        $idRole = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');

        try {
            // Pobranie aktualnego statusu roli
            $currentStatus = App::getDB()->get("roles", "isActive", ["idRole" => $idRole]);

            // Odwrócenie statusu
            $newStatus = $currentStatus ? 0 : 1;

            // Aktualizacja statusu w bazie danych
            App::getDB()->update("roles", ["isActive" => $newStatus], ["idRole" => $idRole]);

            Utils::addInfoMessage("Zaktualizowano aktywność roli.");
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas aktualizacji roli.');
            if (App::getConf()->debug) {
                Utils::addErrorMessage($e->getMessage());
            }
        }

        // Przekierowanie z powrotem na listę ról
        App::getRouter()->redirectTo('roleList');
    }
}
