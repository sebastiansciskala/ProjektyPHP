<?php
/* Smarty version 3.1.30, created on 2025-01-18 08:47:09
  from "C:\xampp\htdocs\php_09_bd\app\views\templates\main.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_678b5c7d4e6425_90510899',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3824c0538ce85f8dc9154bf74012835add52cd9c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_09_bd\\app\\views\\templates\\main.tpl',
      1 => 1737186428,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_678b5c7d4e6425_90510899 (Smarty_Internal_Template $_smarty_tpl) {
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
            <?php if (count($_smarty_tpl->tpl_vars['conf']->value->roles) > 0) {?>
            <li style="margin-left: 20px;">
                <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
ticketList" class="icon solid fa-clipboard-list" style="color: #333; font-weight: bold; text-decoration: none;">Zgłoszenia</a>
            </li>
            <?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['conf']->value->roles['admin']) && $_smarty_tpl->tpl_vars['conf']->value->roles['admin']) {?>
            <li style="margin-left: 20px;">
                <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
userList" class="icon solid fa-users" style="color: #333; font-weight: bold; text-decoration: none;">Lista użytkowników</a>
            </li>
            <?php }?>
            <?php if (count($_smarty_tpl->tpl_vars['conf']->value->roles) > 0) {?>
            <li style="margin-left: 20px;">
                <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
logout" class="icon solid fa-sign-out-alt" style="color: #333; font-weight: bold; text-decoration: none;">Wyloguj</a>
            </li>

            <?php }?>
        </ul>
    </nav>
</header>

<section id="main" class="wrapper">
    <div class="inner">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_782081422678b5c7d4df414_32485973', 'top');
?>

        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_226717094678b5c7d4e5365_65132761', 'messages');
?>

        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1286483887678b5c7d4e5989_50979643', 'bottom');
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
class Block_782081422678b5c7d4df414_32485973 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'top'} */
/* {block 'messages'} */
class Block_226717094678b5c7d4e5365_65132761 extends Smarty_Internal_Block
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
class Block_1286483887678b5c7d4e5989_50979643 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'bottom'} */
}
