{extends file="main.tpl"}

{block name=content}
	{include file='messages.tpl'}
	<section id="log" class="wrapper style1 fade-up login-wrapper">

		<form action="{$conf->action_url}login" method="post" class="login-form">
			<h2>Logowanie do systemu</h2>
			<div class="fields">
				<div class="field">
					<label for="id_login">Login:</label>
					<input id="id_login" type="text" name="login" placeholder="Wprowadź login" required />
				</div>
				<div class="field">
					<label for="id_pass">Hasło:</label>
					<input id="id_pass" type="password" name="pass" placeholder="Wprowadź hasło" required />
				</div>
				<div class="field">
					<input type="submit" value="Zaloguj" class="button primary" />
				</div>
			</div>
		</form>
	</section>

{/block}
