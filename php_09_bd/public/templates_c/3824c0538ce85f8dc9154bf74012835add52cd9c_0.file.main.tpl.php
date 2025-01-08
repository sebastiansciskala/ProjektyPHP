<?php
/* Smarty version 3.1.30, created on 2025-01-07 23:57:32
  from "C:\xampp\htdocs\php_09_bd\app\views\templates\main.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_677db15c7a39b7_24000005',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3824c0538ce85f8dc9154bf74012835add52cd9c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_09_bd\\app\\views\\templates\\main.tpl',
      1 => 1736290646,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_677db15c7a39b7_24000005 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
    <meta charset="utf-8" />
    <title>Aplikacja bazodanowa</title>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/css/main.css" />
</head>

<body>

<header id="header" class="alt">
    <nav>
        <ul style="display: flex; justify-content: flex-end; list-style: none; padding: 0; margin: 0;">
            <li style="margin-left: 20px;">
                <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
ticketList" class="icon solid fa-clipboard-list" style="color: #333; font-weight: bold; text-decoration: none;">Zgłoszenia</a>
            </li>
            <li style="margin-left: 20px;">
                <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
userList" class="icon solid fa-users" style="color: #333; font-weight: bold; text-decoration: none;">Lista użytkowników</a>
            </li>
            <?php if (count($_smarty_tpl->tpl_vars['conf']->value->roles) > 0) {?>
            <li style="margin-left: 20px;">
                <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
logout" class="icon solid fa-sign-out-alt" style="color: #333; font-weight: bold; text-decoration: none;">Wyloguj</a>
            </li>
            <?php } else { ?>
            <li style="margin-left: 20px;">
                <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
loginShow" class="icon solid fa-sign-in-alt" style="color: #333; font-weight: bold; text-decoration: none;">Zaloguj</a>
            </li>
            <?php }?>
        </ul>
    </nav>
</header>

<section id="main" class="wrapper">
    <div class="inner">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2092204706677db15c79c7a1_01343072', 'top');
?>

        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1005279309677db15c7a28d6_44292946', 'messages');
?>

        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_736636558677db15c7a2f06_78510470', 'bottom');
?>

    </div>
</section>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/js/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/js/main.js"><?php echo '</script'; ?>
>

</body>
</html>
<?php }
/* {block 'top'} */
class Block_2092204706677db15c79c7a1_01343072 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'top'} */
/* {block 'messages'} */
class Block_1005279309677db15c7a28d6_44292946 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage()) {?>
        <div class="box">
            <ul>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
?>
                <li class="<?php if ($_smarty_tpl->tpl_vars['msg']->value->isError()) {?>error<?php } elseif ($_smarty_tpl->tpl_vars['msg']->value->isWarning()) {?>warning<?php } else { ?>info<?php }?>">
                    <?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>

                </li>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </ul>
        </div>
        <?php }?>
        <?php
}
}
/* {/block 'messages'} */
/* {block 'bottom'} */
class Block_736636558677db15c7a2f06_78510470 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'bottom'} */
}
