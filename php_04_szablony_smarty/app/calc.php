<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';
//załaduj Smarty
require_once _ROOT_PATH.'/lib/smarty/Smarty.class.php';

//pobranie parametrów
function getParams(&$form){
    $form['kwota'] = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
    $form['oprocentowanie']  = isset($_REQUEST['oprocentowanie']) ? $_REQUEST['oprocentowanie'] : null;
    $form['okres'] = isset($_REQUEST['okres']) ? $_REQUEST['okres'] : null;
}

//walidacja parametrów z przygotowaniem zmiennych dla widoku
function validate(&$form,&$infos,&$msgs,&$hide_intro){

    //sprawdzenie, czy parametry zostały przekazane - jeśli nie to zakończ walidację
    if (!(isset($form['kwota']) && isset($form['oprocentowanie']) && isset($form['okres']))) return false;


    //parametry przekazane zatem
    //nie pokazuj wstępu strony gdy tryb obliczeń (aby nie trzeba było przesuwać)
    // - ta zmienna zostanie użyta w widoku aby nie wyświetlać całego bloku itro z tłem
    $hide_intro = true;

    $infos [] = 'Przekazano parametry.';

    // sprawdzenie, czy potrzebne wartości zostały przekazane
    if ( $form['kwota'] == "") $msgs [] = 'Nie podano kwoty kredytu';
    if ( $form['oprocentowanie'] == "") $msgs [] = 'Nie podano oprocentowania';
    if ( $form['okres'] == "") $msgs [] = 'Nie podano okresu kredytowania';

    //nie ma sensu walidować dalej gdy brak parametrów
    if ( count($msgs)==0 ) {
        // sprawdzenie, czy $x i $y są liczbami całkowitymi
        if (! is_numeric( $form['kwota'] )) $msgs [] = 'Pierwsza wartość nie jest liczbą';
        if (! is_numeric( $form['oprocentowanie'] )) $msgs [] = 'Druga wartość nie jest liczbą';
        if (! is_numeric( $form['okres'] )) $msgs [] = 'Trzecia wartość nie jest liczbą';
    }

    if (count($msgs)>0) return false;
    else return true;
}

// wykonaj obliczenia
function process(&$form,&$infos,&$msgs,&$result){
    $infos [] = 'Parametry poprawne. Wykonuję obliczenia.';

    // Konwersja parametrów na int/float
    $form['kwota'] = floatval($form['kwota']);
    $form['oprocentowanie']= floatval($form['oprocentowanie']);
    $form['okres'] = intval($form['okres']);


    $result = number_format(
        floatval($form['kwota'] + ($form['kwota'] * ($form['oprocentowanie'] * $form['okres'] / 100))) / (12 * $form['okres']),
        2
    );


}

//inicjacja zmiennych
$form = null;
$infos = array();
$messages = array();
$result = null;

getParams($form);
if ( validate($form,$infos,$messages,$hide_intro) ){
    process($form,$infos,$messages,$result);
}

// 4. Przygotowanie danych dla szablonu

$smarty = new Smarty();

$smarty->assign('app_url',_APP_URL);
$smarty->assign('root_path',_ROOT_PATH);
$smarty->assign('page_title','Przykład 04');
$smarty->assign('page_description','Profesjonalne szablonowanie oparte na bibliotece Smarty');
$smarty->assign('page_header','Szablony Smarty');

$smarty->assign('hide_intro',$hide_intro);

//pozostałe zmienne niekoniecznie muszą istnieć, dlatego sprawdzamy aby nie otrzymać ostrzeżenia
$smarty->assign('form',$form);
$smarty->assign('result',$result);
$smarty->assign('messages',$messages);
$smarty->assign('infos',$infos);

// 5. Wywołanie szablonu
$smarty->display(_ROOT_PATH.'/app/calc.html');