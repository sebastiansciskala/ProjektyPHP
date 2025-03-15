<?php
/* Smarty version 3.1.30, created on 2025-03-15 01:25:35
  from "C:\xampp\htdocs\ProjektyPHP\PSS\AJAX\app\views\templates\main.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_67d4c8ffba3ca8_95461832',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd10eb27d973bba756568f67a9d193d7030f3d719' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ProjektyPHP\\PSS\\AJAX\\app\\views\\templates\\main.tpl',
      1 => 1741998303,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67d4c8ffba3ca8_95461832 (Smarty_Internal_Template $_smarty_tpl) {
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
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/js/functions.js"><?php echo '</script'; ?>
>
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_125170756267d4c8ffb9b2a3_50180993', 'top');
?>

        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_133527707667d4c8ffba2b25_05233838', 'messages');
?>

        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_136865039067d4c8ffba3140_03703256', 'bottom');
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
class Block_125170756267d4c8ffb9b2a3_50180993 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'top'} */
/* {block 'messages'} */
class Block_133527707667d4c8ffba2b25_05233838 extends Smarty_Internal_Block
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
        <?php if (trim(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['msg']->value->text))) {?>
            <li class="<?php if ($_smarty_tpl->tpl_vars['msg']->value->isError()) {?>error<?php } elseif ($_smarty_tpl->tpl_vars['msg']->value->isWarning()) {?>warning<?php } else { ?>info<?php }?>">
                <?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>

            </li>
        <?php }?>
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
class Block_136865039067d4c8ffba3140_03703256 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'bottom'} */
}
