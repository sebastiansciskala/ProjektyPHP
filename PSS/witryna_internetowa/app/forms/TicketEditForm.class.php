<?php

namespace app\forms;

class TicketEditForm {
    public $id;           // ID zgłoszenia
    public $title;        // Tytuł zgłoszenia
    public $description;  // Opis zgłoszenia
    public $idStatus;     // ID statusu zgłoszenia
    public $createdBy;    // ID użytkownika, który stworzył zgłoszenie
}
