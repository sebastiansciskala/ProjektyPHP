<?php 
require_once dirname(__FILE__) .'/../config.php';?>

<?php // strony z szablonu 
include _ROOT_PATH.'/templates/top.php';
?>
	</head>
	<body class="is-preload">

		<!-- Sidebar -->
			<section id="sidebar">
				<div class="inner">
					<nav>
						<ul>
							<li><a href="#intro">Strona startowa</a></li>
							<li><a href="#three">Kalkulator</a></li>
						
						</ul>
					</nav>
				</div>
			</section>
			<div id="wrapper">

				<!-- Intro -->
					<section id="intro" class="wrapper style1 fullscreen fade-up">
						<div class="inner">
							<h1>Kalkulator kredytowy</h1>

							<ul class="actions">
								<li><a href="#three" class="button scrolly">Przejdźmy dalej</a></li>
							</ul>
						</div>
					</section>

					<section id="three" class="wrapper style1 fade-up">
    <div class="inner">
        <h2>Obliczanie raty</h2>
        <section>
            <form action="<?php print(_APP_ROOT);?>/app/calc.php#three" method="post">
                <div class="fields">
                    <div class="field half">
                        <label for="id_kwota">Kwota kredytu: </label>
                        <input id="id_kwota" type="text" name="kwota" value="<?php if (isset($kwota)) print($kwota); ?>" /><br />
                    </div>
                    <div class="field half">
                        <label for="id_oprocentowanie">Oprocentowanie roczne: </label>
                        <input id="id_oprocentowanie" type="text" name="oprocentowanie" value="<?php if (isset($oprocentowanie)) print($oprocentowanie); ?>" /><br />
                    </div>
                    <div class="field half">
                        <label for="id_okres">Ilość lat: </label>
                        <input id="id_okres" type="text" name="okres" value="<?php if (isset($okres)) print($okres); ?>" /><br />
                    </div>
                    <div class="field half">
                        <label for="id_wynik">Miesięczna rata kredytu: </label>
                        <input id="id_wynik" type="text" name="wynik" value="<?php if (isset($wynik)) print($wynik); ?>" readonly style="background-color: #222; border: 1px solid #ccc;" /><br />
                    </div>
                </div>
                <ul class="actions">
                    <button type="submit" class="button">Oblicz</button>
                </ul>
            </form>
        </section>
        
        <?php
        // Wyświetlenie listy błędów, jeśli istnieją
        if (isset($messages)) {
            if (count($messages) > 0) {
                echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:500px;">';
                foreach ($messages as $klucz => $wiadomosc) {
                    echo '<li>'.$wiadomosc.'</li>';
                }
                echo '</ol>';
            }
        }
        ?>
    </div>
</section>
						
					

			</div>

			<?php //dół strony z szablonu 
include _ROOT_PATH.'/templates/bottom.php';
?>