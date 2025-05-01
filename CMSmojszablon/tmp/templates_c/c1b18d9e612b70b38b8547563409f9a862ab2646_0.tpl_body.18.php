<?php
/* Smarty version 3.1.31, created on 2025-05-01 17:30:24
  from "tpl_body:18" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_6813939075cca0_19039739',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c1b18d9e612b70b38b8547563409f9a862ab2646' => 
    array (
      0 => 'tpl_body:18',
      1 => '1746113420',
      2 => 'tpl_body',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6813939075cca0_19039739 (Smarty_Internal_Template $_smarty_tpl) {
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
                        </div>
                    </div>
                </div>
            </div>
        </header>

   
<?php CMS_Content_Block::smarty_internal_fetch_contentblock(array(),$_smarty_tpl); ?>

<?php echo smarty_function_global_content(array('name'=>"a_bottom"),$_smarty_tpl);
}
}
