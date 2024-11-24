<?php
/* Smarty version 4.5.4, created on 2024-11-24 21:47:54
  from 'C:\xampp\htdocs\php_04_szablony_smarty\app\calc.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.4',
  'unifunc' => 'content_674390fa790019_78945029',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e7036f52075715b7228ee12f1a3be5cdf133dd97' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_04_szablony_smarty\\app\\calc.html',
      1 => 1732481250,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_674390fa790019_78945029 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_911321234674390fa7818d5_77802737', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1239183506674390fa782023_07000868', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/main.html");
}
/* {block 'footer'} */
class Block_911321234674390fa7818d5_77802737 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_911321234674390fa7818d5_77802737',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Mój własny kalkulator kredytowy<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_1239183506674390fa782023_07000868 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1239183506674390fa782023_07000868',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


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
			<form action="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/app/calc.php#three" method="post">
				<div class="fields">
					<div class="field half">
						<label for="id_kwota">Kwota kredytu: </label>
						<input id="id_kwota" type="text" name="kwota" value="<?php echo $_smarty_tpl->tpl_vars['form']->value['kwota'];?>
"/><br />
					</div>
					<div class="field half">
						<label for="id_oprocentowanie">Oprocentowanie roczne: </label>
						<input id="id_oprocentowanie" type="text" name="oprocentowanie" value="<?php echo $_smarty_tpl->tpl_vars['form']->value['oprocentowanie'];?>
"/><br />
					</div>
					<div class="field half">
						<label for="id_okres">Ilość lat: </label>
						<input id="id_okres" type="text" name="okres" value="<?php echo $_smarty_tpl->tpl_vars['form']->value['okres'];?>
"/><br />
					</div>
					<div class="field half">
						<label for="id_wynik">Miesięczna rata kredytu: </label>
						<input id="id_wynik" type="text" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['result']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" readonly style="background-color: #f0f0f0; border: 1px solid #ccc; color: #000;" /><br />
					</div>
						<ul class="actions">
							<button type="submit" class="button">Oblicz</button>
						</ul>
			</form>
		</section>


		<?php if ((isset($_smarty_tpl->tpl_vars['messages']->value))) {?>
	<?php if (count($_smarty_tpl->tpl_vars['messages']->value) > 0) {?>
		<h4>Wystąpiły błędy: </h4>
		<ol class="err">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['messages']->value, 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
		<li><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</li>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</ol>
	<?php }
}?>

<?php if ((isset($_smarty_tpl->tpl_vars['infos']->value))) {?>
	<?php if (count($_smarty_tpl->tpl_vars['infos']->value) > 0) {?>
		<h4>Informacje: </h4>
		<ol class="inf">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['infos']->value, 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
		<li><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</li>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</ol>
	<?php }
}?>


</div>
</section>

<?php
}
}
/* {/block 'content'} */
}
