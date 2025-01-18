<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\RoleUtils;
use core\SessionUtils;
use app\forms\UserSearchForm;

class UserListCtrl {

    private $form; //dane formularza wyszukiwania
    private $records; //rekordy pobrane z bazy danych

    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new UserSearchForm();
    }

    public function validate() {
        // 1. sprawdzenie, czy parametry zostały przekazane
        // - nie trzeba sprawdzać
        $this->form->username = ParamUtils::getFromRequest('sf_username');

        // 2. sprawdzenie poprawności przekazanych parametrów
        // - nie trzeba sprawdzać

        return !App::getMessages()->isError();
    }
    public function action_userBlock() {
        $userId = ParamUtils::getFromCleanURL(1); // Pobieramy ID użytkownika z URL

        if (!isset($userId)) {
            Utils::addErrorMessage('Brak identyfikatora użytkownika.');
            return;
        }

        try {
            // Aktualizacja statusu użytkownika
            App::getDB()->update("users", [
                "isBlocked" => 1 // Ustawiamy flagę blokady
            ], [
                "idUser" => $userId
            ]);

            Utils::addInfoMessage("Użytkownik został zablokowany.");
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas blokowania użytkownika.');
            if (App::getConf()->debug) {
                Utils::addErrorMessage($e->getMessage());
            }
        }

        // Powrót do listy użytkowników
        App::getRouter()->forwardTo('userList');
    }

    public function action_userUnblock() {
        $userId = ParamUtils::getFromCleanURL(1, true, 'Brak identyfikatora użytkownika.');
        
        if ($userId === null) {
            Utils::addErrorMessage('Nieprawidłowy identyfikator użytkownika.');
            return;
        }
    
        try {
            App::getDB()->update("users", [
                "isBlocked" => 0 // Odblokowanie użytkownika
            ], [
                "idUser" => $userId
            ]);
    
            Utils::addInfoMessage("Użytkownik został odblokowany.");
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas odblokowywania użytkownika.');
            if (App::getConf()->debug) {
                Utils::addErrorMessage($e->getMessage());
            }
        }
    
        App::getRouter()->forwardTo('userList');
    }


    public function action_userList() {
        if (! RoleUtils::inRole('admin')) {
            SessionUtils::store('error_message', 'Nie masz uprawnień do tej operacji.');
            App::getRouter()->redirectTo('roleError');
            return;
        }

        // 1. Walidacja danych formularza (z pobraniem)
        // - W tej aplikacji walidacja nie jest potrzebna, ponieważ nie wystąpią błedy podczas podawania nazwiska.
        //   Jednak pozostawiono ją, ponieważ gdyby uzytkownik wprowadzał np. datę, lub wartość numeryczną, to trzeba
        //   odpowiednio zareagować wyświetlając odpowiednią informację (poprzez obiekt wiadomości Messages)
        $this->validate();

        // 2. Przygotowanie mapy z parametrami wyszukiwania (nazwa_kolumny => wartość)
        $search_params = []; //przygotowanie pustej struktury (aby była dostępna nawet gdy nie będzie zawierała wierszy)
        if (isset($this->form->username) && strlen($this->form->username) > 0) {
            $search_params['username[~]'] = $this->form->username . '%'; // dodanie symbolu % zastępuje dowolny ciąg znaków na końcu
        }

        // 3. Pobranie listy rekordów z bazy danych
        // W tym wypadku zawsze wyświetlamy listę osób bez względu na to, czy dane wprowadzone w formularzu wyszukiwania są poprawne.
        // Dlatego pobranie nie jest uwarunkowane poprawnością walidacji (jak miało to miejsce w kalkulatorze)
        //przygotowanie frazy where na wypadek większej liczby parametrów
        $num_params = sizeof($search_params);
        if ($num_params > 1) {
            $where = ["AND" => &$search_params];
        } else {
            $where = &$search_params;
        }
        //dodanie frazy sortującej po nazwisku
        $where ["ORDER"] = "username";
        //wykonanie zapytania

        try {
            // Pobranie użytkowników z rolami
            $this->records = App::getDB()->select("users", [
                "[>]roles" => ["idRole" => "idRole"] // JOIN z tabelą ról
            ], [
                "users.idUser",
                "users.username",
                "users.email",
                "roles.roleName", // pobranie nazwy roli
                "users.createdBy", // pobranie ID użytkownika, który stworzył wpis
                "users.isBlocked"
            ], $search_params);
        
            // Pobranie wszystkich użytkowników (mapowanie ID na nazwy)
            $users = App::getDB()->select("users", [
                "idUser",
                "username"
            ]);
        
            // Tworzenie mapy użytkowników: ID -> Nazwa użytkownika
            $userMap = [];
            foreach ($users as $user) {
                $userMap[$user["idUser"]] = $user["username"];
            }
        
            // Mapowanie createdBy na nazwę użytkownika w this->records
            foreach ($this->records as &$record) {
                $record["createdByUsername"] = isset($record["createdBy"]) && isset($userMap[$record["createdBy"]])
                    ? $userMap[$record["createdBy"]]
                    : "system"; // Domyślnie "Nieznany", jeśli brak danych
            }
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania danych.');
            if (App::getConf()->debug) {
                Utils::addErrorMessage($e->getMessage());
            }
        }
        // 4. wygeneruj widok
        App::getSmarty()->assign('searchForm', $this->form); // dane formularza (wyszukiwania w tym wypadku)
        App::getSmarty()->assign('people', $this->records);  // lista rekordów z bazy danych
        App::getSmarty()->display('UserList.tpl');
    
    }

}