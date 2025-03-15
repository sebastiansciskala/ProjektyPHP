<?php
/* Smarty version 3.1.30, created on 2025-01-08 00:28:59
  from "C:\xampp\htdocs\php_09_bd\app\views\TicketEdit.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_677db8bb9b1cf9_18597337',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2a69e89afed0e4f6008e9f12a742e6a9fecc74fa' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_09_bd\\app\\views\\TicketEdit.tpl',
      1 => 1736292538,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_677db8bb9b1cf9_18597337 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1275532378677db8bb9b18c9_26715838', 'top');
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_1275532378677db8bb9b18c9_26715838 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="bottom-margin" style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; background-color: #f9f9f9;">
    <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
ticketSave" method="post" style="display: flex; flex-direction: column; gap: 15px;">
        <fieldset style="border: none; padding: 0; margin: 0;">
            <legend style="font-size: 1.5rem; font-weight: bold; margin-bottom: 20px;">Dodaj/Edytuj zgłoszenie</legend>

            <!-- Pole tytułu -->
            <div style="display: flex; flex-direction: column; gap: 5px;">
                <label for="title" style="font-weight: bold;">Tytuł</label>
                <input id="title" type="text" placeholder="Tytuł zgłoszenia" name="title" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->title;?>
" style="padding: 10px; border: 1px solid #ccc; border-radius: 4px; width: 100%;">
            </div>

            <!-- Pole opisu -->
            <div style="display: flex; flex-direction: column; gap: 5px;">
                <label for="description" style="font-weight: bold;">Opis</label>
                <textarea id="description" placeholder="Opis zgłoszenia" name="description" rows="5" style="padding: 10px; border: 1px solid #ccc; border-radius: 4px; width: 100%;"><?php echo $_smarty_tpl->tpl_vars['form']->value->description;?>
</textarea>
            </div>

            <!-- Pole statusu -->
            <?php if ($_smarty_tpl->tpl_vars['form']->value->id) {?>
            <div style="display: flex; flex-direction: column; gap: 5px;">
                <label for="idStatus" style="font-weight: bold;">Status zgłoszenia</label>
                <select id="idStatus" name="idStatus" style="padding: 10px; border: 1px solid #ccc; border-radius: 4px; width: 100%;">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['statuses']->value, 'status');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['status']->value) {
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['status']->value['idStatus'];?>
" <?php if ($_smarty_tpl->tpl_vars['form']->value->idStatus == $_smarty_tpl->tpl_vars['status']->value['idStatus']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['status']->value['statusName'];?>
</option>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                </select>
            </div>
            <?php }?>

            <!-- Przycisk zapisu i powrotu -->
            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
                <button type="submit" class="button small primary" style="font-size: 1rem;">Zapisz</button>
                <a class="button special large"href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
ticketList" style="font-size: 1rem;">Powrót</a>
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
