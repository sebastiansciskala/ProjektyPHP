<?php
/* Smarty version 3.1.30, created on 2025-03-15 01:56:54
  from "C:\xampp\htdocs\ProjektyPHP\PSS\AJAX\app\views\UserEdit.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_67d4d056c39343_62287129',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b47f34e99d3a287ad7a0dbf472c55fc6ced2d6a1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ProjektyPHP\\PSS\\AJAX\\app\\views\\UserEdit.tpl',
      1 => 1736293570,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_67d4d056c39343_62287129 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_144407146967d4d056c38d90_20271543', 'top');
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_144407146967d4d056c38d90_20271543 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="bottom-margin" style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; background-color: #f9f9f9;">
    <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
userSave" method="post" style="display: flex; flex-direction: column; gap: 15px;">
        <fieldset style="border: none; padding: 0; margin: 0;">
            <legend style="font-size: 1.5rem; font-weight: bold; margin-bottom: 20px;">Dane użytkownika</legend>

            <!-- Pole nazwy użytkownika -->
            <div style="display: flex; flex-direction: column; gap: 5px;">
                <label for="username" style="font-weight: bold;">Nazwa użytkownika</label>
                <input id="username" type="text" placeholder="Nazwa użytkownika" name="username" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->username;?>
" style="padding: 10px; border: 1px solid #ccc; border-radius: 4px; width: 100%;">
            </div>

            <!-- Pole email -->
            <div style="display: flex; flex-direction: column; gap: 5px;">
                <label for="email" style="font-weight: bold;">Email</label>
                <input id="email" type="email" placeholder="Email" name="email" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->email;?>
" style="padding: 10px; border: 1px solid #ccc; border-radius: 4px; width: 100%;">
            </div>

            <!-- Pole roli -->
            <div style="display: flex; flex-direction: column; gap: 5px;">
                <label for="idRole" style="font-weight: bold;">Rola</label>
                <select id="idRole" name="idRole" style="padding: 10px; border: 1px solid #ccc; border-radius: 4px; width: 100%;">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['roles']->value, 'role');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['role']->value) {
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['role']->value['idRole'];?>
" <?php if ($_smarty_tpl->tpl_vars['form']->value->idRole == $_smarty_tpl->tpl_vars['role']->value['idRole']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['role']->value['roleName'];?>
</option>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                </select>
            </div>

            <!-- Pole hasła -->
            <div style="display: flex; flex-direction: column; gap: 5px;">
                <label for="password" style="font-weight: bold;">Hasło</label>
                <input id="password" type="password" placeholder="Wprowadź hasło" name="password" style="padding: 10px; border: 1px solid #ccc; border-radius: 4px; width: 100%;">
            </div>

            <!-- Przycisk zapisu i powrotu -->
            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
                <button type="submit" class="button small primary" style="font-size: 1rem;">Zapisz</button>
                <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
userList" class="button special large" style="font-size: 1rem;">Powrót</a>
            </div>
        </fieldset>
        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->id;?>
">
    </form>
</div>
<?php
}
}
/* {/block 'top'} */
}
