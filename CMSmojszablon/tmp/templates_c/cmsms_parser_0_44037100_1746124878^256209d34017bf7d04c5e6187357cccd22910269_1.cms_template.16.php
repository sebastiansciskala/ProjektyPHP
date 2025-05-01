<?php
/* Smarty version 3.1.31, created on 2025-05-01 20:41:18
  from "cms_template:16" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_6813c04e6ff4b8_11987211',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '256209d34017bf7d04c5e6187357cccd22910269' => 
    array (
      0 => 'cms_template:16',
      1 => 1746112808,
      2 => 'cms_template',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6813c04e6ff4b8_11987211 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_root_url')) require_once 'C:\\xampp\\htdocs\\ProjektyPHP\\CMSmojszablon\\lib\\plugins\\function.root_url.php';
if (!is_callable('smarty_function_global_content')) require_once 'C:\\xampp\\htdocs\\ProjektyPHP\\CMSmojszablon\\lib\\plugins\\function.global_content.php';
?>
<header class="masthead" style="background-image: url('<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/template/assets/img/home-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>Blog o Cybersecurity</h1>
                            <span class="subheading">Nowinki i nie tylko..</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
<?php echo smarty_function_global_content(array('name'=>"a_top"),$_smarty_tpl);?>
        


<?php echo smarty_function_global_content(array('name'=>"a_bottom"),$_smarty_tpl);
}
}
