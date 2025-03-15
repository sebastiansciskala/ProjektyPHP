<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use app\forms\TicketSearchForm;
use core\RoleUtils;
use core\SessionUtils;

class TicketListCtrl {

    private $form;
    private $records;
    private $ticketsPerPage = 4; // Liczba zgłoszeń na stronę

    public function __construct() {
        $this->form = new TicketSearchForm();
    }

    public function validate() {
        $this->form->title = ParamUtils::getFromRequest('sf_title');
        return !App::getMessages()->isError();
    }

    public function action_ticketList() {
        if (RoleUtils::inRole('admin')) {
            SessionUtils::store('error_message', 'Tylko użytkownicy powinni mieć dostęp do tej strony');
            App::getRouter()->redirectTo('roleError');
            return;
        }
            if (isset($_SESSION['info_message'])) {
                Utils::addInfoMessage($_SESSION['info_message']);
                unset($_SESSION['info_message']); // Usunięcie po odczytaniu
            }


        $this->validate();

        $search_params = [];
        if (!empty($this->form->title)) {
            $search_params['title[~]'] = $this->form->title . '%';
        }

        $search_params["ORDER"] = "createdAt";

        // Pobranie numeru aktualnej strony
        $currentPage = ParamUtils::getFromGet('page', true);
        $currentPage = $currentPage ? max(1, (int)$currentPage) : 1;
        $offset = ($currentPage - 1) * $this->ticketsPerPage;

        try {
            // Pobranie zgłoszeń z paginacją
            $tickets = App::getDB()->select("tickets", [
                "idTicket",
                "title",
                "description",
                "createdAt",
                "createdBy",
                "modifiedAt",
                "modifiedBy",
                "idStatus"
            ], array_merge($search_params, [
                "LIMIT" => [$offset, $this->ticketsPerPage]
            ]));

            // Pobranie całkowitej liczby zgłoszeń
            $totalTickets = App::getDB()->count("tickets", $search_params);
            $totalPages = ceil($totalTickets / $this->ticketsPerPage);

            // Pobranie użytkowników i statusów
            $users = App::getDB()->select("users", ["idUser", "username"]);
            $statuses = App::getDB()->select("statuses", ["idStatus", "statusName"]);

            // Mapowanie użytkowników i statusów
            $userMap = array_column($users, 'username', 'idUser');
            $statusMap = array_column($statuses, 'statusName', 'idStatus');

            foreach ($tickets as &$ticket) {
                $ticket["createdBy"] = $userMap[$ticket["createdBy"]] ?? "Nieznany";
                $ticket["modifiedBy"] = $userMap[$ticket["modifiedBy"]] ?? "Brak";
                $ticket["status"] = $statusMap[$ticket["idStatus"]] ?? "Nieznany";
            }

            $this->records = $tickets;

        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania zgłoszeń.');
            if (App::getConf()->debug) {
                Utils::addErrorMessage($e->getMessage());
            }
        }

        // Przekazanie danych do widoku
        App::getSmarty()->assign('searchForm', $this->form);
        App::getSmarty()->assign('tickets', $this->records);
        App::getSmarty()->assign('currentPage', $currentPage);
        App::getSmarty()->assign('totalPages', $totalPages);
        App::getSmarty()->display('TicketList.tpl');
    }
}
