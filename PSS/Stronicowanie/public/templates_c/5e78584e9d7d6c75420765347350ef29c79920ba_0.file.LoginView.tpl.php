<?php
/* Smarty version 3.1.30, created on 2025-03-14 18:58:49
  from "C:\xampp\htdocs\ProjektyPHP\PSS\witryna_internetowa\app\views\LoginView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_67d46e595eb919_63488341',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5e78584e9d7d6c75420765347350ef29c79920ba' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ProjektyPHP\\PSS\\witryna_internetowa\\app\\views\\LoginView.tpl',
      1 => 1737068947,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_67d46e595eb919_63488341 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_56751681167d46e595eb0f1_50856463', 'top');
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_56751681167d46e595eb0f1_50856463 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div id="wrapper">
    <!-- Header -->
    <header id="header">
        <div class="inner">
            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
" class="logo">
                <span class="symbol"><img src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/images/logo.svg" alt="" /></span>
                <span class="title">Ticket Manager</span>
            </a>
        </div>
    </header>

    <!-- Main -->
    <div id="main" style="display: flex; justify-content: center; align-items: center; min-height: 80vh;">
        <div class="inner">
            <section>
                <h2 class="text-center">Logowanie</h2>
                <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
login" method="post" class="pure-form pure-form-aligned" 
                      style="border: 1px solid #ddd; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); background: #fff;">
                    <fieldset>
                        <div class="pure-control-group">
                            <label for="id_login">Login:</label>
                            <input id="id_login" type="text" name="login" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->login;?>
" style="width: 100%; padding: 10px;" />
                        </div>
                        <div class="pure-control-group">
                            <label for="id_pass">Hasło:</label>
                            <input id="id_pass" type="password" name="pass" style="width: 100%; padding: 10px;" />
                        </div>
                        <div class="pure-controls">
                            <input type="submit" value="Zaloguj" class="button primary" style="width: 100%;" />
                        </div>
                    </fieldset>
                </form>
            </section>
        </div>
    </div>
    

</div>
<?php
}
}
/* {/block 'top'} */
}
