<?php
/* Smarty version 3.1.30, created on 2025-03-15 01:56:36
  from "C:\xampp\htdocs\ProjektyPHP\PSS\AJAX\app\views\UserList.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_67d4d044ca3190_19015294',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fe294a57bc27e57b24d7e245ea0b49a1199eb697' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ProjektyPHP\\PSS\\AJAX\\app\\views\\UserList.tpl',
      1 => 1742000194,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
    'file:UserListTable.tpl' => 1,
  ),
),false)) {
function content_67d4d044ca3190_19015294 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_61174505767d4d044ca1ad7_73727003', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_130346841067d4d044ca2e83_19779309', 'bottom');
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_61174505767d4d044ca1ad7_73727003 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<form id="search-form" class="pure-form pure-form-stacked" onsubmit="ajaxPostForm('search-form','<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
userListPart','table'); return false;" style="display: flex; justify-content: flex-end;">

    <fieldset>
        <input type="text" placeholder="Nazwa użytkownika" name="sf_username" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->username;?>
" style="max-width: 300px;" /><br />
        <button type="submit" class="pure-button pure-button-primary">Filtruj</button>
    </fieldset>
</form>
    <button class="pure-button pure-button-primary" onclick="ajaxPostForm('search-form','<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
userListPart','table')">Filtruj</button>

<?php
}
}
/* {/block 'top'} */
/* {block 'bottom'} */
class Block_130346841067d4d044ca2e83_19779309 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
    <a class="button small primary" style="font-size: 0.9rem;" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
userNew">Dodaj nowego użytkownika</a>
    <a class="button special large" style="font-size: 0.9rem;" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
roleList">Aktywność ról</a>
</div>
<div id="table">
<?php $_smarty_tpl->_subTemplateRender("file:UserListTable.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</div>


<?php
}
}
/* {/block 'bottom'} */
}
