{extends file="main.tpl"}

{block name=footer}użytkownik: {$user->login}<br> rola: {$user->role}{/block}



{block name=content}
	<section id="sidebar">
		<div class="inner">
			<nav>
				<ul>

					<li><a href="#intro">Strona startowa</a></li>
					<li><a href="#three">Kalkulator</a></li>
					<li><a href="{$conf->action_url}logout">Wyloguj</a></li>
				</ul>
			</nav>
		</div>
	</section>
	<div id="wrapper">
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
				<form action="{$conf->action_url}calcCompute#three" method="post">
					<div class="fields">
						<div class="field half">
							<label for="id_kwota">Kwota kredytu: </label>
							<input id="id_kwota" type="text" name="kwota" value="{$form->kwota}"/><br />
						</div>
						<div class="field half">
							<label for="id_oprocentowanie">Oprocentowanie roczne: </label>
							<input id="id_oprocentowanie" type="text" name="oprocentowanie" value="{$form->oprocentowanie}"/><br />
						</div>
						<div class="field half">
							<label for="id_okres">Ilość lat: </label>
							<input id="id_okres" type="text" name="okres" value="{$form->okres}"/><br />
							<ul class="actions">
								<button type="submit" class="button">Oblicz</button>
							</ul>
				</form>
			</section>

			<div class="messages">

				{include file='messages.tpl'}

				{if isset($res->result)}
					<h4>Wynik</h4>
					<p class="res">
						{$res->result}
					</p>
				{/if}

			</div>
		</div>
		</div>
	</section>
{/block}