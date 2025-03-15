<?php
/* Smarty version 3.1.30, created on 2025-03-14 19:38:07
  from "C:\xampp\htdocs\ProjektyPHP\PSS\Stronicowanie\app\views\UserList.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_67d4778f2df3e6_92748768',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '725a6ddec4dee4a7421f2ecffb76d663496d0f80' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ProjektyPHP\\PSS\\Stronicowanie\\app\\views\\UserList.tpl',
      1 => 1737058404,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_67d4778f2df3e6_92748768 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_58623076467d4778f2d3bb1_73262207', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_123571629367d4778f2dee11_82474193', 'bottom');
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_58623076467d4778f2d3bb1_73262207 extends Smarty_Internal_Block
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
class Block_123571629367d4778f2dee11_82474193 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
    <a class="button small primary" style="font-size: 0.9rem;" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
userNew">Dodaj nowego użytkownika</a>
    <a class="button special large" style="font-size: 0.9rem;" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
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
</table>

<?php
}
}
/* {/block 'bottom'} */
}
