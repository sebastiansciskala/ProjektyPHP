<?php
/* Smarty version 3.1.31, created on 2025-05-01 17:22:12
  from "cms_template:18" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_681391a4ef3454_82687885',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '498f7129ef0b128a8a858e211d35398c152a5808' => 
    array (
      0 => 'cms_template:18',
      1 => '1746112919',
      2 => 'cms_template',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_681391a4ef3454_82687885 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_global_content')) require_once 'C:\\xampp\\htdocs\\ProjektyPHP\\CMSmojszablon\\lib\\plugins\\function.global_content.php';
if (!is_callable('smarty_function_root_url')) require_once 'C:\\xampp\\htdocs\\ProjektyPHP\\CMSmojszablon\\lib\\plugins\\function.root_url.php';
echo smarty_function_global_content(array('name'=>"a_top"),$_smarty_tpl);?>
  
        <header class="masthead" style="background-image: url('<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/template/assets/img/contact-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="page-heading">
                            <h1>Contact Me</h1>
                            <span class="subheading">Have questions? I have answers.</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

<?php echo smarty_function_global_content(array('name'=>"a_bottom"),$_smarty_tpl);
}
}
