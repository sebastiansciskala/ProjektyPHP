<?php
/* Smarty version 3.1.30, created on 2025-01-08 19:23:35
  from "C:\xampp\htdocs\php_09_bd\app\views\UserList.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_677ec2a75a82e7_76314637',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4bdb0d46417d7e7b465b4386c9fcf47e70fc5ff9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_09_bd\\app\\views\\UserList.tpl',
      1 => 1736360610,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_677ec2a75a82e7_76314637 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1207292320677ec2a759dac8_14587466', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_378899977677ec2a75a7f28_85433706', 'bottom');
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_1207292320677ec2a759dac8_14587466 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div style="display: flex; justify-content: flex-end; align-items: center; margin-bottom: 20px;">
    <!-- Formularz wyszukiwania -->
    <form class="form-inline" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
userList" method="post" style="display: flex; gap: 10px; align-items: center;">
        <input type="text" class="form-control form-control-sm" placeholder="  Nazwa użytkownika" name="sf_username" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->username;?>
" style="max-width: 200px;">
        <button type="submit" class="button small primary" style="font-size: 0.9rem; text-transform: uppercase;">Filtruj</button>
    </form>
</div>



<?php
}
}
/* {/block 'top'} */
/* {block 'bottom'} */
class Block_378899977677ec2a75a7f28_85433706 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
    <a class="button special large" style="font-size: 0.9rem;"  href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
userNew">Dodaj nowego użytkownika</a>
    <a class="button small primary" style="font-size: 0.9rem;" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
roleList">Aktywność ról</a>
</div>


<table id="tab_people" class="pure-table pure-table-bordered">
<thead>
    <tr>
        <th>ID</th>
        <th>Nazwa użytkownika</th>
        <th>Email</th>
        <th>Rola</th>
        <th>Utworzone przez</th>
        <th>Opcje</th>
    </tr>
</thead>
<tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['people']->value, 'p');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
?>
<tr>
    <td><?php echo $_smarty_tpl->tpl_vars['p']->value["idUser"];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['p']->value["username"];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['p']->value["email"];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['p']->value["roleName"];?>
</td>
    <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['p']->value["createdByUsername"])===null||$tmp==='' ? "Nieznany" : $tmp);?>
</td> <!-- Wyświetlanie nazwy użytkownika, który utworzył -->
    <td>
        <a class="pure-button pure-button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
userEdit/<?php echo $_smarty_tpl->tpl_vars['p']->value['idUser'];?>
">Edytuj</a>
        <a class="pure-button pure-button-warning" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
userDelete/<?php echo $_smarty_tpl->tpl_vars['p']->value['idUser'];?>
">Usuń</a>
    </td>
</tr>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</tbody>
</table>

<?php
}
}
/* {/block 'bottom'} */
}
