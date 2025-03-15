<?php
/* Smarty version 3.1.30, created on 2025-03-14 19:38:51
  from "C:\xampp\htdocs\ProjektyPHP\PSS\Stronicowanie\app\views\TicketList.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_67d477bbd45b23_70556898',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c4ad8e4e2350aaca0242ac2d130fde246449abbc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ProjektyPHP\\PSS\\Stronicowanie\\app\\views\\TicketList.tpl',
      1 => 1741975955,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_67d477bbd45b23_70556898 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_truncate')) require_once 'C:\\xampp\\htdocs\\ProjektyPHP\\PSS\\Stronicowanie\\lib\\smarty\\plugins\\modifier.truncate.php';
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_56648560067d477bbd45623_21366904', 'top');
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_56648560067d477bbd45623_21366904 extends Smarty_Internal_Block
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
                <td>
                    <?php if ($_smarty_tpl->tpl_vars['t']->value["createdAt"] == $_smarty_tpl->tpl_vars['t']->value["modifiedAt"]) {?>
                        Brak
                    <?php } elseif ($_smarty_tpl->tpl_vars['t']->value["modifiedAt"]) {?>
                        <?php echo $_smarty_tpl->tpl_vars['t']->value["modifiedAt"];?>

                    <?php } else { ?>
                        Brak
                    <?php }?>
                </td>
                <td>
                    <?php if ($_smarty_tpl->tpl_vars['t']->value["createdAt"] == $_smarty_tpl->tpl_vars['t']->value["modifiedAt"]) {?>
                        Brak
                    <?php } elseif ($_smarty_tpl->tpl_vars['t']->value["modifiedBy"]) {?>
                        <?php echo $_smarty_tpl->tpl_vars['t']->value["modifiedBy"];?>

                    <?php } else { ?>
                        Brak
                    <?php }?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['t']->value["status"];?>
</td>
                <td>
                    <a class="button small" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
ticketEdit/<?php echo $_smarty_tpl->tpl_vars['t']->value['idTicket'];?>
">Wyświetl</a>
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
<div align="center">
    <div class="pagination">
        <?php if ($_smarty_tpl->tpl_vars['currentPage']->value > 1) {?>
            <a href="?page=<?php echo $_smarty_tpl->tpl_vars['currentPage']->value-1;?>
">⟵ Poprzednia</a>
        <?php }?>
        <?php
$__section_pages_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_pages']) ? $_smarty_tpl->tpl_vars['__smarty_section_pages'] : false;
$__section_pages_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['totalPages']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_pages_0_total = $__section_pages_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_pages'] = new Smarty_Variable(array());
if ($__section_pages_0_total != 0) {
for ($__section_pages_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_pages']->value['index'] = 0; $__section_pages_0_iteration <= $__section_pages_0_total; $__section_pages_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_pages']->value['index']++){
?>
            <a href="?page=<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_pages']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_pages']->value['index'] : null)+1;?>
">
                <b <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_section_pages']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_pages']->value['index'] : null)+1 == $_smarty_tpl->tpl_vars['currentPage']->value) {?> style="text-decoration: underline;"<?php }?>>
                    <?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_pages']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_pages']->value['index'] : null)+1;?>

                </b>
            </a>
        <?php
}
}
if ($__section_pages_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_pages'] = $__section_pages_0_saved;
}
?>
        <?php if ($_smarty_tpl->tpl_vars['currentPage']->value < $_smarty_tpl->tpl_vars['totalPages']->value) {?>
            <a href="?page=<?php echo $_smarty_tpl->tpl_vars['currentPage']->value+1;?>
">Następna ⟶</a>
        <?php }?>
    </div>
</div>




<?php
}
}
/* {/block 'top'} */
}
