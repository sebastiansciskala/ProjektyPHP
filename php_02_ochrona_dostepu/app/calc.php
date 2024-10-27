<?php
require_once dirname(__FILE__).'/../config.php';

// KONTROLER strony kalkulatora

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

// Ochrona kontrolera - poniższy skrypt przerwie przetwarzanie w tym punkcie, gdy użytkownik jest niezalogowany
include _ROOT_PATH.'/app/security/check.php';

// Pobranie parametrów
function getParams(&$kwota, &$oprocentowanie, &$okres){
    $kwota = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
    $oprocentowanie = isset($_REQUEST['oprocentowanie']) ? $_REQUEST['oprocentowanie'] : null;
    $okres = isset($_REQUEST['okres']) ? $_REQUEST['okres'] : null;
}

// Walidacja parametrów z przygotowaniem zmiennych dla widoku
function validate(&$kwota, &$oprocentowanie, &$okres, &$messages){
    // Sprawdzenie, czy parametry zostały przekazane
    if (! (isset($kwota) && isset($oprocentowanie) && isset($okres))) {
        // Sytuacja wystąpi, kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
        // Teraz zakładamy, że nie jest to błąd. Po prostu nie wykonamy obliczeń
        return false;
    }
    
    // Sprawdzenie, czy potrzebne wartości zostały przekazane
    if ($kwota == "") {
        $messages[] = 'Nie podano kwoty kredytu';
    }
    if ($oprocentowanie == "") {
        $messages[] = 'Nie podano oprocentowania';
    }
    if ($okres == "") {
        $messages[] = 'Nie podano okresu kredytowania';
    }

    if (count($messages) != 0) return false;

    // Nie ma sensu walidować dalej, gdy brak parametrów
    if (empty($messages)) {
        
        // Sprawdzenie, czy kwota, oprocentowanie i okres są liczbami
        if (!is_numeric($kwota)) {
            $messages[] = 'Kwota nie jest liczbą';
        }
        
        if (!is_numeric($oprocentowanie)) {
            $messages[] = 'Oprocentowanie nie jest liczbą';
        }    

        if (!is_numeric($okres)) {
            $messages[] = 'Okres kredytowania nie jest liczbą';
        }
        if (count($messages) != 0) return false;
        else return true;
    }    
}

function process(&$kwota, &$oprocentowanie, &$okres, &$messages, &$wynik){
    global $role;
    
    // Konwersja parametrów na int/float
    $kwota = floatval($kwota);
    $oprocentowanie = floatval($oprocentowanie);
    $okres = intval($okres);

    $maksymalna_kwota = 10000000;
    
    // Wykonanie operacji
    if ($kwota > $maksymalna_kwota && $role != 'manager') {
        $messages[] = 'Tylko menedżer banku może obliczyć ratę kredytu dla tak wysokiej kwoty!';
        return;
    } else {
        $wynik = floatval($kwota + ($kwota * ($oprocentowanie * $okres / 100))) / (12 * $okres);
    }
}

// Definicja zmiennych kontrolera
$wynik = null;
$messages = array();

// Pobierz parametry i wykonaj zadanie, jeśli wszystko w porządku
getParams($kwota, $oprocentowanie, $okres);
if (validate($kwota, $oprocentowanie, $okres, $messages)) { // Gdy brak błędów
    process($kwota, $oprocentowanie, $okres, $messages, $wynik);
}

// Wywołanie widoku z przekazaniem zmiennych
include 'calc_view.php';
