<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use app\forms\TicketSearchForm;
use core\RoleUtils;
use core\SessionUtils;

class TicketListCtrl {

    private $form; // dane formularza wyszukiwania
    private $records; // rekordy pobrane z bazy danych

    public function __construct() {
        // stworzenie potrzebnych obiektów
        $this->form = new TicketSearchForm();
    }

    public function validate() {
        // Pobranie parametru wyszukiwania z formularza
        $this->form->title = ParamUtils::getFromRequest('sf_title');
        return !App::getMessages()->isError();
    }

    public function action_ticketList() {
        if (RoleUtils::inRole('admin')) {
            SessionUtils::store('error_message', 'Tylko użytkownicy powinni mieć dostęp do tej strony');
            App::getRouter()->redirectTo('roleError'); // Przekierowanie na stronę błędu
            return;
        }
        // 1. Walidacja danych formularza
        $this->validate();
    
        // 2. Przygotowanie mapy z parametrami wyszukiwania
        $search_params = [];
        if (isset($this->form->title) && strlen($this->form->title) > 0) {
            $search_params['title[~]'] = $this->form->title . '%'; // Wyszukiwanie po tytule
        }
    
        $search_params["ORDER"] = "createdAt"; // Sortowanie po dacie utworzenia
    
        try {
            // 3. Pobranie zgłoszeń z tabeli `tickets`
            $tickets = App::getDB()->select("tickets", [
                "idTicket",
                "title",
                "description",
                "createdAt",
                "createdBy",
                "modifiedAt",
                "modifiedBy",
                "idStatus"
            ], $search_params);
    
            // 4. Pobranie dodatkowych danych z innych tabel
            $users = App::getDB()->select("users", [
                "idUser",
                "username"
            ]);
    
            $statuses = App::getDB()->select("statuses", [
                "idStatus",
                "statusName"
            ]);
    
            // 5. Mapowanie danych
            $userMap = [];
            foreach ($users as $user) {
                $userMap[$user["idUser"]] = $user["username"];
            }
    
            $statusMap = [];
            foreach ($statuses as $status) {
                $statusMap[$status["idStatus"]] = $status["statusName"];
            }
    
            // Dodanie nazw użytkowników i statusów do zgłoszeń
            foreach ($tickets as &$ticket) {
                $ticket["createdBy"] = isset($userMap[$ticket["createdBy"]]) ? $userMap[$ticket["createdBy"]] : "Nieznany";
                $ticket["modifiedBy"] = isset($userMap[$ticket["modifiedBy"]]) ? $userMap[$ticket["modifiedBy"]] : "Brak";
                $ticket["status"] = isset($statusMap[$ticket["idStatus"]]) ? $statusMap[$ticket["idStatus"]] : "Nieznany";
            }
    
            $this->records = $tickets;
    
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania zgłoszeń.');
            if (App::getConf()->debug) {
                Utils::addErrorMessage($e->getMessage());
            }
        }
    
        // 6. Wygenerowanie widoku
        App::getSmarty()->assign('searchForm', $this->form); // dane formularza wyszukiwania
        App::getSmarty()->assign('tickets', $this->records); // lista zgłoszeń
        App::getSmarty()->display('TicketList.tpl');
    }
}
