<?php
//Tutaj nie ładujemy konfiguracji - sam widok nie jest już punktem wejścia do aplikacji.
//Wszystkie żądania trafiają do kontrolera, który wywołuje ten skrypt widoku.
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Kalkulator kredytowy</title>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
</head>
<body>

<div style="width:90%; margin: 2em auto;">
    <a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="pure-button pure-button-active">Wyloguj</a>
</div>

<div style="width:90%; margin: 2em auto;">

<h1>Kalkulator kredytowy</h1>
<form action="<?php print(_APP_URL);?>/app/calc.php" method="post">
    <label for="id_kwota">Kwota kredytu: </label>
    <input id="id_kwota" type="text" name="kwota" value="<?php if (isset($kwota)) print($kwota); ?>" /><br />
    
    <label for="id_oprocentowanie">Oprocentowanie roczne: </label>
    <input id="id_oprocentowanie" type="text" name="oprocentowanie" value="<?php if (isset($oprocentowanie)) print($oprocentowanie); ?>" /><br />
    
    <label for="id_okres">Ilość lat: </label>
    <input id="id_okres" type="text" name="okres" value="<?php if (isset($okres)) print($okres); ?>" /><br />
    
    <input type="submit" value="Oblicz" />
</form>  

<?php
// Wyświetlenie listy błędów, jeśli istnieją
if (isset($messages)) {
    if (count($messages) > 0) {
        echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
        foreach ($messages as $klucz => $wiadomosc) {
            echo '<li>'.$wiadomosc.'</li>';
        }
        echo '</ol>';
    }
}
?>

<?php if (isset($wynik)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
<?php echo "Miesięczna rata kredytu wynosi: ".$wynik." złotych "; ?>
</div>
<?php } ?>

</div>

</body>
</html>
