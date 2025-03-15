<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('loginShow'); // Akcja/ścieżka domyślna
App::getRouter()->setLoginRoute('loginShow'); // Akcja/ścieżka na potrzeby logowania (przekierowanie, gdy nie ma dostępu)

// Dostępne dla wszystkich (niezalogowanych i zalogowanych)
Utils::addRoute('loginShow', 'LoginCtrl');
Utils::addRoute('login', 'LoginCtrl');

// Dostępne tylko dla zalogowanych użytkowników (dowolna rola)
Utils::addRoute('logout', 'LoginCtrl', ['userHelpdesk','admin', 'userReporting']);

// Dostępne tylko dla użytkownika z rolą `userReporting`
Utils::addRoute('ticketNew', 'TicketEditCtrl', ['userHelpdesk','admin', 'userReporting']);
Utils::addRoute('ticketSave', 'TicketEditCtrl', ['userHelpdesk', 'userReporting']);

// Dostępne tylko dla użytkownika z rolą `userHelpdesk`
Utils::addRoute('ticketEdit', 'TicketEditCtrl', ['userHelpdesk','admin', 'userReporting']);
// Dostępne tylko dla użytkownika z rolą `admin`
Utils::addRoute('userList', 'UserListCtrl', ['userHelpdesk','admin', 'userReporting']);
Utils::addRoute('userListPart','UserListCtrl', ['admin']);
Utils::addRoute('userBlock', 'UserListCtrl', ['admin']);
Utils::addRoute('userUnblock', 'UserListCtrl', ['admin']);
Utils::addRoute('userNew', 'UserEditCtrl', ['admin']);
Utils::addRoute('userEdit', 'UserEditCtrl', ['admin']);
Utils::addRoute('userSave', 'UserEditCtrl', ['admin']);
Utils::addRoute('roleList', 'RoleEditCtrl', ['admin']);
Utils::addRoute('roleToggle', 'RoleEditCtrl', ['admin']);
Utils::addRoute('roleError', 'LoginCtrl', ['userHelpdesk','admin', 'userReporting']);

// Dostępne dla wszystkich zalogowanych (do listy zgłoszeń)
Utils::addRoute('ticketList', 'TicketListCtrl', ['userHelpdesk','admin', 'userReporting']);