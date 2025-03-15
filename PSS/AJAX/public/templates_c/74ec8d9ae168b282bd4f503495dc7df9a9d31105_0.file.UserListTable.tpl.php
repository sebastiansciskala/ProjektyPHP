<?php
/* Smarty version 3.1.30, created on 2025-03-15 01:37:36
  from "C:\xampp\htdocs\ProjektyPHP\PSS\AJAX\app\views\UserListTable.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_67d4cbd096a526_27092921',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '74ec8d9ae168b282bd4f503495dc7df9a9d31105' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ProjektyPHP\\PSS\\AJAX\\app\\views\\UserListTable.tpl',
      1 => 1741998950,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67d4cbd096a526_27092921 (Smarty_Internal_Template $_smarty_tpl) {
?>
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
    <td><?php echo $_smarty_tpl->tpl_vars['p']->value["createdByUsername"];?>
</td>
    <td>
        <a class="button special large" style="font-size: 0.82rem;" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
userEdit/<?php echo $_smarty_tpl->tpl_vars['p']->value['idUser'];?>
">Edytuj</a>
        <?php if ($_smarty_tpl->tpl_vars['p']->value["isBlocked"] == 1) {?>
            <a class="button small primary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
userUnblock/<?php echo $_smarty_tpl->tpl_vars['p']->value['idUser'];?>
">Odblokuj</a>
        <?php } else { ?>
            <a class="button small primary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
userBlock/<?php echo $_smarty_tpl->tpl_vars['p']->value['idUser'];?>
">Zablokuj</a>
        <?php }?>
    </td>
</tr>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</tbody>
</table><?php }
}
