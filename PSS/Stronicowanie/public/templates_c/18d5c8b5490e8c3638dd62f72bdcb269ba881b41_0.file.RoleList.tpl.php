<?php
/* Smarty version 3.1.30, created on 2025-03-14 19:16:12
  from "C:\xampp\htdocs\ProjektyPHP\PSS\witryna_internetowa\app\views\RoleList.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_67d4726c75e7b2_22576377',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '18d5c8b5490e8c3638dd62f72bdcb269ba881b41' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ProjektyPHP\\PSS\\witryna_internetowa\\app\\views\\RoleList.tpl',
      1 => 1736292918,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_67d4726c75e7b2_22576377 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_59435289267d4726c75e347_58956805', 'top');
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_59435289267d4726c75e347_58956805 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="bottom-margin">
    <a class="button special large" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
userList">Powrót do listy użytkowników</a>
</div>

<table class="pure-table pure-table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nazwa roli</th>
            <th>Aktywna</th>
            <th>Opcje</th>
        </tr>
    </thead>
    <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['roles']->value, 'role');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['role']->value) {
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['role']->value['idRole'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['role']->value['roleName'];?>
</td>
            <td><?php if ($_smarty_tpl->tpl_vars['role']->value['isActive'] == 1) {?>Tak<?php } else { ?>Nie<?php }?></td>
            <td>
                <a class="button small primary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
roleToggle/<?php echo $_smarty_tpl->tpl_vars['role']->value['idRole'];?>
">
                    <?php if ($_smarty_tpl->tpl_vars['role']->value['isActive'] == 1) {?>Dezaktywuj<?php } else { ?>Aktywuj<?php }?>
                </a>
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
/* {/block 'top'} */
}
