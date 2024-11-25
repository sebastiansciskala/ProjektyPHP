<?php
/* Smarty version 3.1.30, created on 2024-11-25 00:24:30
  from "C:\xampp\htdocs\php_07_ochrona_dostepu\app\views\CalcView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_6743b5ae01df02_27839477',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '86cc70c79df480c1a5015953ac98215fbb166939' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_07_ochrona_dostepu\\app\\views\\CalcView.tpl',
      1 => 1732490668,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_6743b5ae01df02_27839477 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10844364896743b5ae013842_28892241', 'footer');
?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6505957716743b5ae01dae5_89879393', 'content');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'footer'} */
class Block_10844364896743b5ae013842_28892241 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
użytkownik: <?php echo $_smarty_tpl->tpl_vars['user']->value->login;?>
<br> rola: <?php echo $_smarty_tpl->tpl_vars['user']->value->role;
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_6505957716743b5ae01dae5_89879393 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<section id="sidebar">
		<div class="inner">
			<nav>
				<ul>

					<li><a href="#intro">Strona startowa</a></li>
					<li><a href="#three">Kalkulator</a></li>
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
logout">Wyloguj</a></li>
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
				<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
calcCompute#three" method="post">
					<div class="fields">
						<div class="field half">
							<label for="id_kwota">Kwota kredytu: </label>
							<input id="id_kwota" type="text" name="kwota" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->kwota;?>
"/><br />
						</div>
						<div class="field half">
							<label for="id_oprocentowanie">Oprocentowanie roczne: </label>
							<input id="id_oprocentowanie" type="text" name="oprocentowanie" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->oprocentowanie;?>
"/><br />
						</div>
						<div class="field half">
							<label for="id_okres">Ilość lat: </label>
							<input id="id_okres" type="text" name="okres" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->okres;?>
"/><br />
							<ul class="actions">
								<button type="submit" class="button">Oblicz</button>
							</ul>
				</form>
			</section>

			<div class="messages">

				
				<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
					<h4>Wystąpiły błędy: </h4>
					<ol class="err">
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getErrors(), 'err');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['err']->value) {
?>
							<li><?php echo $_smarty_tpl->tpl_vars['err']->value;?>
</li>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

					</ol>
				<?php }?>

				
				<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
					<h4>Informacje: </h4>
					<ol class="inf">
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getInfos(), 'inf');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['inf']->value) {
?>
							<li><?php echo $_smarty_tpl->tpl_vars['inf']->value;?>
</li>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

					</ol>
				<?php }?>

				<?php if (isset($_smarty_tpl->tpl_vars['res']->value->result)) {?>
					<h4>Wynik</h4>
					<p class="res">
						<?php echo $_smarty_tpl->tpl_vars['res']->value->result;?>

					</p>
				<?php }?>

			</div>
		</div>
		</div>
	</section>
<?php
}
}
/* {/block 'content'} */
}