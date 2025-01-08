<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\SessionUtils;
use core\RoleUtils;
use app\forms\TicketEditForm;

class TicketEditCtrl {
    
    private $form; // dane formularza

    public function __construct() {
        $this->form = new TicketEditForm();
    }

    // Walidacja danych przed zapisem (nowe dane lub edycja).
    public function validateSave() {
        $this->form->id = ParamUtils::getFromRequest('id', false); // Pole opcjonalne dla edycji
        $this->form->title = ParamUtils::getFromRequest('title', true, 'Podaj tytuł zgłoszenia');
        $this->form->description = ParamUtils::getFromRequest('description', true, 'Podaj opis zgłoszenia');
    
        // Sprawdzaj `idStatus` tylko, jeśli jest edytowane zgłoszenie
        if (!empty($this->form->id)) {
            $this->form->idStatus = ParamUtils::getFromRequest('idStatus', true, 'Wybierz poprawny status zgłoszenia');
        }
    
        if (App::getMessages()->isError()) return false;
    
        if (empty(trim($this->form->title))) {
            Utils::addErrorMessage('Tytuł zgłoszenia jest wymagany.');
        }
        if (empty(trim($this->form->description))) {
            Utils::addErrorMessage('Opis zgłoszenia jest wymagany.');
        }
    
        return !App::getMessages()->isError();
    }

    public function validateEdit() {
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function action_ticketNew() {
        $this->generateView();
    }

    public function action_ticketEdit() {
        if ($this->validateEdit()) {
            try {
                $record = App::getDB()->get("tickets", "*", [
                    "idTicket" => $this->form->id
                ]);

                $this->form->id = $record['idTicket'];
                $this->form->title = $record['title'];
                $this->form->description = $record['description'];
                $this->form->idStatus = $record['idStatus'];
                $this->form->createdBy = $record['createdBy'];
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        $this->generateView();
    }

    public function action_ticketSave() {
        if ($this->validateSave()) {
            try {
                $currentUserId = SessionUtils::load('idUser'); // ID użytkownika z sesji
    
                if (!$currentUserId) {
                    Utils::addErrorMessage('Musisz być zalogowany, aby zapisywać zgłoszenia.');
                    App::getRouter()->redirectTo('loginShow');
                    return;
                }
    
                if (empty($this->form->id)) { // Nowe zgłoszenie
                    App::getDB()->insert("tickets", [
                        "title" => $this->form->title,
                        "description" => $this->form->description,
                        "idStatus" => 1, // Nowy status (np. "Nowe")
                        "createdBy" => $currentUserId,
                        "createdAt" => date("Y-m-d H:i:s")
                    ]);
    
                    $newTicketId = App::getDB()->id(); // ID nowego zgłoszenia
    
                    // Dodanie historii statusu
                    App::getDB()->insert("ticket_status_history", [
                        "idTicket" => $newTicketId,
                        "idStatus" => 1, // Status "Nowe"
                        "changedBy" => $currentUserId,
                        "changedAt" => date("Y-m-d H:i:s")
                    ]);
    
                    Utils::addInfoMessage('Pomyślnie dodano nowe zgłoszenie.');
                } else { // Edycja zgłoszenia
                    $existingStatus = App::getDB()->get("tickets", "idStatus", [
                        "idTicket" => $this->form->id
                    ]);
    
                    if ($existingStatus != $this->form->idStatus) {
                        // Jeśli status się zmienia, dodaj wpis do historii
                        App::getDB()->insert("ticket_status_history", [
                            "idTicket" => $this->form->id,
                            "idStatus" => $this->form->idStatus,
                            "changedBy" => $currentUserId,
                            "changedAt" => date("Y-m-d H:i:s")
                        ]);
                    }
    
                    // Aktualizacja zgłoszenia
                    App::getDB()->update("tickets", [
                        "title" => $this->form->title,
                        "description" => $this->form->description,
                        "idStatus" => $this->form->idStatus,
                        "modifiedBy" => $currentUserId,
                        "modifiedAt" => date("Y-m-d H:i:s")
                    ], [
                        "idTicket" => $this->form->id
                    ]);
    
                    Utils::addInfoMessage('Pomyślnie zaktualizowano zgłoszenie.');
                }
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas zapisywania zgłoszenia.');
                if (App::getConf()->debug) {
                    Utils::addErrorMessage($e->getMessage());
                }
            }
    
            App::getRouter()->forwardTo('ticketList');
        } else {
            $this->generateView();
        }
    }
    
    



    public function action_ticketDelete() {
        $ticketId = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
    
        if (!$ticketId) {
            Utils::addErrorMessage('Nie znaleziono zgłoszenia do usunięcia.');
            App::getRouter()->redirectTo('ticketList');
            return;
        }
    
        try {
            App::getDB()->delete("tickets", [
                "idTicket" => $ticketId
            ]);
            Utils::addInfoMessage('Zgłoszenie zostało pomyślnie usunięte.');
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas usuwania zgłoszenia.');
            if (App::getConf()->debug) {
                Utils::addErrorMessage($e->getMessage());
            }
        }
    
        App::getRouter()->redirectTo('ticketList');
    }
    
    

    public function generateView() {
        App::getSmarty()->assign('form', $this->form); // dane formularza dla widoku
        App::getSmarty()->assign('statuses', App::getDB()->select("statuses", ["idStatus", "statusName"])); // lista statusów
        App::getSmarty()->display('TicketEdit.tpl');
    }
}
