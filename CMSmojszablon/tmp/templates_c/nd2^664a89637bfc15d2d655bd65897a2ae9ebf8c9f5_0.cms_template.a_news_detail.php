<?php
/* Smarty version 3.1.31, created on 2025-05-01 21:29:25
  from "cms_template:a_news_detail" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_6813cb958a1453_55589444',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '664a89637bfc15d2d655bd65897a2ae9ebf8c9f5' => 
    array (
      0 => 'cms_template:a_news_detail',
      1 => '1746127593',
      2 => 'cms_template',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6813cb958a1453_55589444 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_cms_date_format')) require_once 'C:\\xampp\\htdocs\\ProjektyPHP\\CMSmojszablon\\lib\\plugins\\modifier.cms_date_format.php';
if (!is_callable('smarty_modifier_cms_escape')) require_once 'C:\\xampp\\htdocs\\ProjektyPHP\\CMSmojszablon\\lib\\plugins\\modifier.cms_escape.php';
if (!is_callable('smarty_function_file_url')) require_once 'C:\\xampp\\htdocs\\ProjektyPHP\\CMSmojszablon\\lib\\plugins\\function.file_url.php';
if (!is_callable('smarty_function_root_url')) require_once 'C:\\xampp\\htdocs\\ProjektyPHP\\CMSmojszablon\\lib\\plugins\\function.root_url.php';
?>
<!-- Start News Detail Template -->

<style>
#NewsPostDetailWrapper {
  max-width: 800px;
  margin: 0 auto;
  padding: 30px 20px;
  font-family: sans-serif;
  line-height: 1.6;
  color: #333;
}

#NewsPostDetailTitle {
  font-size: 2rem;
  margin-bottom: 10px;
  color: #007BFF;
}

#NewsPostDetailDate {
  font-size: 0.9rem;
  color: #888;
  margin-bottom: 5px;
}

#NewsPostDetailSummary {
  font-size: 1.1rem;
  font-weight: 500;
  margin-bottom: 15px;
}

#NewsPostDetailAuthor {
  font-size: 0.85rem;
  color: #666;
  margin-bottom: 8px;
}

#NewsPostDetailContent {
  margin-top: 20px;
  font-size: 1rem;
}

#NewsPostDetailContent img {
  width: 100%;
  height: 300px;
  object-fit: cover;
  margin: 15px 0;
  border-radius: 6px;
}

#NewsPostDetailExtra {
  font-size: 0.85rem;
  margin-top: 20px;
  color: #777;
}

.NewsDetailField {
  margin-top: 20px;
  font-size: 0.9rem;
}

.NewsDetailField img {
  width: 100%;
  height: 300px;
  object-fit: cover;
  border-radius: 6px;
  margin-top: 10px;
}

#NewsPostDetailReturnLink {
  margin-top: 30px;
  text-align: center;
}
#NewsPostDetailReturnLink a {
  display: inline-block;
  padding: 10px 20px;
  background-color: #007BFF;
  color: #fff;
  text-decoration: none;
  border-radius: 5px;
  font-size: 0.95rem;
  transition: background-color 0.3s;
}
#NewsPostDetailReturnLink a:hover {
  background-color: #0056b3;
}
</style>

<div id="NewsPostDetailWrapper">

  <?php if (isset($_smarty_tpl->tpl_vars['entry']->value->canonical)) {?>
    <?php $_smarty_tpl->_assignInScope('canonical', $_smarty_tpl->tpl_vars['entry']->value->canonical ,false ,32);
?>
  <?php }?>

  <?php if ($_smarty_tpl->tpl_vars['entry']->value->postdate) {?>
    <div id="NewsPostDetailDate">
      <?php echo smarty_modifier_cms_date_format($_smarty_tpl->tpl_vars['entry']->value->postdate);?>

    </div>
  <?php }?>

  <h1 id="NewsPostDetailTitle"><?php echo smarty_modifier_cms_escape($_smarty_tpl->tpl_vars['entry']->value->title,'htmlall');?>
</h1>

  <hr />

  <?php if ($_smarty_tpl->tpl_vars['entry']->value->summary) {?>
    <div id="NewsPostDetailSummary">
      <?php echo $_smarty_tpl->tpl_vars['entry']->value->summary;?>

    </div>
  <?php }?>

  <?php if ($_smarty_tpl->tpl_vars['entry']->value->author) {?>
    <div id="NewsPostDetailAuthor">
      <?php echo $_smarty_tpl->tpl_vars['author_label']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['entry']->value->author;?>

    </div>
  <?php }?>

  <div id="NewsPostDetailContent">
    <?php echo $_smarty_tpl->tpl_vars['entry']->value->content;?>

  </div>

  <?php if ($_smarty_tpl->tpl_vars['entry']->value->extra) {?>
    <div id="NewsPostDetailExtra">
      <?php echo $_smarty_tpl->tpl_vars['extra_label']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['entry']->value->extra;?>

    </div>
  <?php }?>

  <?php if (isset($_smarty_tpl->tpl_vars['entry']->value->fields)) {?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['entry']->value->fields, 'field', false, 'fieldname');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['fieldname']->value => $_smarty_tpl->tpl_vars['field']->value) {
?>
      <div class="NewsDetailField">
        <?php if ($_smarty_tpl->tpl_vars['field']->value->type == 'file') {?>
          <?php if (isset($_smarty_tpl->tpl_vars['field']->value->value) && $_smarty_tpl->tpl_vars['field']->value->value) {?>
            <img src="<?php echo $_smarty_tpl->tpl_vars['entry']->value->file_location;?>
/<?php echo $_smarty_tpl->tpl_vars['field']->value->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['field']->value->value;?>
" />
          <?php }?>
        <?php } elseif ($_smarty_tpl->tpl_vars['field']->value->type == 'linkedfile') {?>
          <?php if (!empty($_smarty_tpl->tpl_vars['field']->value->value)) {?>
            <img src="<?php echo smarty_function_file_url(array('file'=>$_smarty_tpl->tpl_vars['field']->value->value),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['field']->value->value;?>
" />
          <?php }?>
        <?php } else { ?>
          <strong><?php echo $_smarty_tpl->tpl_vars['field']->value->name;?>
:</strong> <?php echo $_smarty_tpl->tpl_vars['field']->value->value;?>

        <?php }?>
      </div>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

  <?php }?>

  <div id="NewsPostDetailReturnLink">
    <a href="<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/index.php?page=aktualnosci">Powrót</a>
  </div>

</div>

<!-- End News Detail Template --><?php }
}
