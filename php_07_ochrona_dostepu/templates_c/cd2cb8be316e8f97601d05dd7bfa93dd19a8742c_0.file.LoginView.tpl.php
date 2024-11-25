<?php
/* Smarty version 3.1.30, created on 2024-11-25 00:43:12
  from "C:\xampp\htdocs\php_07_ochrona_dostepu\app\views\LoginView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_6743ba10effe55_42246162',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cd2cb8be316e8f97601d05dd7bfa93dd19a8742c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_07_ochrona_dostepu\\app\\views\\LoginView.tpl',
      1 => 1732491786,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_6743ba10effe55_42246162 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21383805236743ba10eff7c3_99760431', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'} */
class Block_21383805236743ba10eff7c3_99760431 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<?php $_smarty_tpl->_subTemplateRender("file:messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<section id="log" class="wrapper style1 fade-up login-wrapper">

		<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
login" method="post" class="login-form">
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

<?php
}
}
/* {/block 'content'} */
}
