<?php
require_once dirname(__FILE__).'/../config.php';

// KONTROLER strony kalkulatora

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

//ochrona kontrolera - poniższy skrypt przerwie przetwarzanie w tym punkcie gdy użytkownik jest niezalogowany
include _ROOT_PATH.'/app/security/check.php';

//pobranie parametrów
function getParams(&$x,&$y,&$z){
	$x = isset($_REQUEST['x']) ? $_REQUEST['x'] : null;
	$y = isset($_REQUEST['y']) ? $_REQUEST['y'] : null;
	$z = isset($_REQUEST['z']) ? $_REQUEST['z'] : null;
}

// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku

function validate(&$x,&$y,&$z,&$messages){
	// sprawdzenie, czy parametry zostały przekazane
	if ( ! (isset($x) && isset($y) && isset($z))) {
		// sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
		// teraz zakładamy, ze nie jest to błąd. Po prostu nie wykonamy obliczeń
		return false;
	}
	


// sprawdzenie, czy potrzebne wartości zostały przekazane
if ( $x == "") {
	$messages [] = 'Nie podano liczby 1';
}
if ( $y == "") {
	$messages [] = 'Nie podano liczby 2';
}

if ( $z == "") {
	$messages [] = 'Nie podano liczby 3';
}

if (count ( $messages ) != 0) return false;

//nie ma sensu walidować dalej gdy brak parametrów
if (empty( $messages )) {
	
	// sprawdzenie, czy $x i $y są liczbami całkowitymi
	if (! is_numeric( $x )) {
		$messages [] = 'Pierwsza wartość nie jest liczbą całkowitą';
	}
	
	if (! is_numeric( $y )) {
		$messages [] = 'Druga wartość nie jest liczbą całkowitą';
	}	

	if (! is_numeric( $z )) {
		$messages [] = 'Trzecia wartość nie jest liczbą całkowitą';
	}
	if (count ( $messages ) != 0) return false;
	else return true;
}	
}

function process(&$x,&$y,&$z,&$messages,&$result){
	global $role;
	
	//konwersja parametrów na int
	$x = intval($x);
	$y = intval($y);
	$z = intval($z);

	
	//wykonanie operacji

			if ($role == 'admin'){
				$result = floatval($x + ($x * ($y * $z/100)))/ (12 * $z);
			} else {
				$messages [] = 'Tylko administrator może obliczyć ratę kredytu!';
			}
}

//definicja zmiennych kontrolera

$result = null;
$messages = array();

//pobierz parametry i wykonaj zadanie jeśli wszystko w porządku
getParams($x,$y,$z);
if ( validate($x,$y,$z,$messages) ) { // gdy brak błędów
	process($x,$y,$z,$messages,$result);
}

// Wywołanie widoku z przekazaniem zmiennych

//   będą dostępne w dołączonym skrypcie
include 'calc_view.php';