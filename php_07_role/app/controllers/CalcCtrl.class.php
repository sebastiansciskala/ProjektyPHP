<?php
// W skrypcie definicji kontrolera nie trzeba dołączać problematycznego skryptu config.php,
// ponieważ będzie on użyty w miejscach, gdzie config.php zostanie już wywołany.

namespace app\controllers;

use app\forms\CalcForm;
use app\transfer\CalcResult;
/** Kontroler kalkulatora
 * @author Przemysław Kudłacik
 *
 */
class CalcCtrl {

    private $form;   //dane formularza (do obliczeń i dla widoku)
    private $result; //inne dane dla widoku
	/** 
	 * Konstruktor - inicjalizacja właściwości
	 */
    public function __construct(){
        //stworzenie potrzebnych obiektów
        $this->form = new CalcForm();
        $this->result = new CalcResult();
    }


    /**
	 * Pobranie parametrów
	 */
	public function getParams(){
		$this->form->kwota = getFromRequest('kwota');
        $this->form->oprocentowanie = getFromRequest('oprocentowanie');
        $this->form->okres = getFromRequest('okres');
	}
	
	/** 
	 * Walidacja parametrów
	 * @return true jeśli brak błedów, false w przeciwnym wypadku 
	 */
	public function validate() {
		// sprawdzenie, czy parametry zostały przekazane
		if (! (isset ( $this->form->kwota ) && isset ( $this->form->oprocentowanie ) && isset ( $this->form->okres ))) {
			// sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
			return false; //zakończ walidację z błędem
		}
		
		// sprawdzenie, czy potrzebne wartości zostały przekazane
		if ($this->form->kwota == "") {
            getMessages()->addError('Nie podano liczby kwoty');
		}
		if ($this->form->oprocentowanie == "") {
            getMessages()->addError('Nie podano liczby oprocentowanie');
		}
		if ($this->form->okres == "") {
            getMessages()->addError('Nie podano liczby okres');
		}
		
		// nie ma sensu walidować dalej gdy brak parametrów
		if (! getMessages()->isError()) {
			
			// sprawdzenie, czy $x i $y są liczbami całkowitymi
			if (! is_numeric ( $this->form->kwota )) {
                getMessages()->addError('Kwota nie jest liczbą');
			}
			
			if (! is_numeric ( $this->form->oprocentowanie)) {
                getMessages()->addError('Oprocentowanie nie jest liczbą');
			}
			if (! is_numeric ( $this->form->okres)) {
                getMessages()->addError('Okres kredytowania nie jest liczbą');
			}
		}
        $user = unserialize($_SESSION['user']);
        if ($user->role == "user" && $this->form->kwota > 999999) {
            getMessages()->addError('Użytkownik z rolą "user" nie może wpisać kwoty większej niż 999999');
        }
		
		return ! getMessages()->isError();
	}
	
	/** 
	 * Pobranie wartości, walidacja, obliczenie i wyświetlenie
	 */
	public function process(){

		$this->getParams();
		
		if ($this->validate()) {
				
			//konwersja parametrów na int
			$this->form->kwota = intval($this->form->kwota);
			$this->form->oprocentowanie = intval($this->form->oprocentowanie);
			$this->form->okres = intval($this->form->okres);
            getMessages()->addInfo('Parametry poprawne.');
			$this->result->result = number_format(
				floatval(
					$this->form->kwota + 
					($this->form->kwota * ($this->form->oprocentowanie * $this->form->okres / 100))
				) / (12 * $this->form->okres), 
				2
			);

            getMessages()->addInfo('Wykonano obliczenia.');
		}
		
		$this->generateView();
	}
	
	
	/**
	 * Wygenerowanie widoku
	 */
	public function generateView(){

        getSmarty()->assign('user',unserialize($_SESSION['user']));
        getSmarty()->assign('page_title','Kalkulator');
        getSmarty()->assign('page_description','Obiektowość. Funkcjonalność aplikacji zamknięta w metodach różnych obiektów. Pełen model MVC.');
        getSmarty()->assign('page_header','Obiekty w PHP');

        getSmarty()->assign('form',$this->form);
        getSmarty()->assign('res',$this->result);

        getSmarty()->display('CalcView.tpl');
	}
}
