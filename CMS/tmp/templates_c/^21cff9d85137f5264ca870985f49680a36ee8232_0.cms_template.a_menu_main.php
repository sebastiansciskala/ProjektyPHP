<?php
/* Smarty version 3.1.31, created on 2025-05-01 14:54:36
  from "cms_template:a_menu_main" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_68136f0c5ce5d6_85635090',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '21cff9d85137f5264ca870985f49680a36ee8232' => 
    array (
      0 => 'cms_template:a_menu_main',
      1 => '1746104072',
      2 => 'cms_template',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68136f0c5ce5d6_85635090 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'Nav_menu_flat' => 
  array (
    'compiled_filepath' => 'C:\\xampp\\htdocs\\ProjektyPHP\\CMS\\tmp\\templates_c\\^21cff9d85137f5264ca870985f49680a36ee8232_0.cms_template.a_menu_main.php',
    'uid' => '21cff9d85137f5264ca870985f49680a36ee8232',
    'call_name' => 'smarty_template_function_Nav_menu_flat_133309543868136f0c5872f7_91736319',
  ),
));
?>


<?php if (isset($_smarty_tpl->tpl_vars['nodes']->value)) {?>
  <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'Nav_menu_flat', array('data'=>$_smarty_tpl->tpl_vars['nodes']->value), true);?>

<?php }
}
/* smarty_template_function_Nav_menu_flat_133309543868136f0c5872f7_91736319 */
if (!function_exists('smarty_template_function_Nav_menu_flat_133309543868136f0c5872f7_91736319')) {
function smarty_template_function_Nav_menu_flat_133309543868136f0c5872f7_91736319($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?><ul style="list-style:none; margin:0; padding:0; display:flex; gap:10px;"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'node');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['node']->value) {
?><li style="display:block;"><a href="<?php echo $_smarty_tpl->tpl_vars['node']->value->url;?>
"<?php if ($_smarty_tpl->tpl_vars['node']->value->target != '') {?> target="<?php echo $_smarty_tpl->tpl_vars['node']->value->target;?>
"<?php }?>style="display:inline-block; padding:10px 15px; background:#007BFF; color:white; text-decoration:none; border-radius:4px;"><?php echo $_smarty_tpl->tpl_vars['node']->value->menutext;?>
</a></li><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
</ul><?php
}}
/*/ smarty_template_function_Nav_menu_flat_133309543868136f0c5872f7_91736319 */
}
