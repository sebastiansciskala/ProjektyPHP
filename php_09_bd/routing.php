<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('ticketList'); // Akcja/ścieżka domyślna
App::getRouter()->setLoginRoute('login'); // Akcja/ścieżka na potrzeby logowania (przekierowanie, gdy nie ma dostępu)

// Dostępne dla wszystkich (niezalogowanych i zalogowanych)
Utils::addRoute('loginShow', 'LoginCtrl');
Utils::addRoute('login', 'LoginCtrl');

// Dostępne tylko dla zalogowanych użytkowników (dowolna rola)
Utils::addRoute('logout', 'LoginCtrl');

// Dostępne tylko dla użytkownika z rolą `userReporting`
Utils::addRoute('ticketNew', 'TicketEditCtrl');
Utils::addRoute('ticketSave', 'TicketEditCtrl');

// Dostępne tylko dla użytkownika z rolą `userHelpdesk`
Utils::addRoute('ticketEdit', 'TicketEditCtrl');
Utils::addRoute('ticketEdit', 'TicketEditCtrl');
// Dostępne tylko dla użytkownika z rolą `admin`
Utils::addRoute('userList', 'UserListCtrl');
Utils::addRoute('userNew', 'UserEditCtrl');
Utils::addRoute('userEdit', 'UserEditCtrl');
Utils::addRoute('userSave', 'UserEditCtrl');
Utils::addRoute('userDelete', 'UserEditCtrl');
Utils::addRoute('ticketDelete', 'TicketEditCtrl');
Utils::addRoute('roleList', 'RoleEditCtrl');
Utils::addRoute('roleToggle', 'RoleEditCtrl');

// Dostępne dla wszystkich zalogowanych (do listy zgłoszeń)
Utils::addRoute('ticketList', 'TicketListCtrl');