<?php
/* Smarty version 3.1.30, created on 2025-01-08 19:22:56
  from "C:\xampp\htdocs\php_09_bd\app\views\TicketList.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_677ec280e1e741_49934523',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '60cedd0ccb58838161aacdaea454b1d1e8f5832b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_09_bd\\app\\views\\TicketList.tpl',
      1 => 1736360575,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_677ec280e1e741_49934523 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_truncate')) require_once 'C:\\xampp\\htdocs\\php_09_bd\\lib\\smarty\\plugins\\modifier.truncate.php';
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_716903842677ec280e1e295_44026416', 'top');
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_716903842677ec280e1e295_44026416 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


            <h1 class="text-center" style="text-align: center; margin-top: 20px;">Lista zgłoszeń</h1>



<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <!-- Dodaj nowe zgłoszenie -->
    <div>
        <a class="button special large" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
ticketNew" style="font-size: 1.1rem;">Dodaj nowe zgłoszenie</a>
    </div>

    <!-- Formularz filtrujący -->
    <form class="form-inline" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
ticketList" method="post" style="display: flex; gap: 10px; align-items: center;">
        <input type="text" class="form-control form-control-sm" placeholder="Tytuł zgłoszenia" name="sf_title" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->title;?>
" style="max-width: 200px;" />
        <button type="submit" class="button small primary" style="font-size: 0.8rem;">Filtruj</button>
    </form>
</div>


    <!-- Tabela zgłoszeń -->
    <div class="table-wrapper">
        <table class="alt">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tytuł</th>
                    <th>Opis</th>
                    <th>Data utworzenia</th>
                    <th>Utworzone przez</th>
                    <th>Data modyfikacji</th>
                    <th>Zmodyfikowane przez</th>
                    <th>Status</th>
                    <th>Opcje</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tickets']->value, 't');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['t']->value) {
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['t']->value["idTicket"];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['t']->value["title"];?>
</td>
                    <td><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['t']->value["description"],50,"...",true);?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['t']->value["createdAt"];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['t']->value["createdBy"];?>
</td>
                    <td><?php if ($_smarty_tpl->tpl_vars['t']->value["modifiedAt"]) {
echo $_smarty_tpl->tpl_vars['t']->value["modifiedAt"];
} else { ?>Brak<?php }?></td>
                    <td><?php if ($_smarty_tpl->tpl_vars['t']->value["modifiedBy"]) {
echo $_smarty_tpl->tpl_vars['t']->value["modifiedBy"];
} else { ?>Brak<?php }?></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['t']->value["status"];?>
</td>
                    <td>
                        <a class="button small" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
ticketEdit/<?php echo $_smarty_tpl->tpl_vars['t']->value['idTicket'];?>
">Wyświetl</a>
                        <a class="button small" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
ticketDelete/<?php echo $_smarty_tpl->tpl_vars['t']->value['idTicket'];?>
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
    </div>
</div>

<?php
}
}
/* {/block 'top'} */
}
