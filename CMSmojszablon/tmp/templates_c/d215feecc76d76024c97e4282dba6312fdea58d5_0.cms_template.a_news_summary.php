<?php
/* Smarty version 3.1.31, created on 2025-05-01 21:18:38
  from "cms_template:a_news_summary" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_6813c90e3da413_80917377',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd215feecc76d76024c97e4282dba6312fdea58d5' => 
    array (
      0 => 'cms_template:a_news_summary',
      1 => '1746127115',
      2 => 'cms_template',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6813c90e3da413_80917377 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_cms_date_format')) require_once 'C:\\xampp\\htdocs\\ProjektyPHP\\CMSmojszablon\\lib\\plugins\\modifier.cms_date_format.php';
if (!is_callable('smarty_modifier_cms_escape')) require_once 'C:\\xampp\\htdocs\\ProjektyPHP\\CMSmojszablon\\lib\\plugins\\modifier.cms_escape.php';
?>
<!-- Start News Display Template -->

<style>
.NewsSummarySummary img {
  width: 100%;
  height: 200px;
  object-fit: cover;
  border-radius: 6px;
  display: block;
  margin-bottom: 10px;
}
</style>

<?php if ($_smarty_tpl->tpl_vars['category_name']->value) {?>
  <h1><?php echo $_smarty_tpl->tpl_vars['category_name']->value;?>
</h1>
<?php }?>

<div class="news-grid" style="display: flex; flex-wrap: wrap; gap: 30px; justify-content: center;">

  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['items']->value, 'entry');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['entry']->value) {
?>
  <div class="NewsSummary" style="width: 300px; border: 1px solid #ddd; border-radius: 8px; padding: 15px; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">

    <?php if ($_smarty_tpl->tpl_vars['entry']->value->postdate) {?>
      <div class="NewsSummaryPostdate" style="font-size: 0.85rem; color: #888;">
        <?php echo smarty_modifier_cms_date_format($_smarty_tpl->tpl_vars['entry']->value->postdate);?>

      </div>
    <?php }?>

    <div class="NewsSummaryLink" style="margin: 10px 0;">
      <a href="<?php echo $_smarty_tpl->tpl_vars['entry']->value->moreurl;?>
" title="<?php echo smarty_modifier_cms_escape($_smarty_tpl->tpl_vars['entry']->value->title,'htmlall');?>
" style="text-decoration: none; font-weight: bold; font-size: 1.1rem; color: #007BFF;">
        <?php echo smarty_modifier_cms_escape($_smarty_tpl->tpl_vars['entry']->value->title);?>

      </a>
    </div>


    <?php if ($_smarty_tpl->tpl_vars['entry']->value->summary) {?>
      <div class="NewsSummarySummary" style="font-size: 0.95rem; line-height: 1.5;">
        <?php echo $_smarty_tpl->tpl_vars['entry']->value->summary;?>

      </div>


    <?php } elseif ($_smarty_tpl->tpl_vars['entry']->value->content) {?>
      <div class="NewsSummaryContent" style="font-size: 0.95rem; line-height: 1.5;">
        <?php echo $_smarty_tpl->tpl_vars['entry']->value->content;?>

      </div>
    <?php }?>

  </div>
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>


</div>

<?php if ($_smarty_tpl->tpl_vars['pagecount']->value > 1) {?>
  <div class="news-pagination" style="margin-top: 30px; text-align: center; font-size: 0.95rem;">
    <?php if ($_smarty_tpl->tpl_vars['pagenumber']->value > 1) {?>
      <?php echo $_smarty_tpl->tpl_vars['firstpage']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['prevpage']->value;?>
&nbsp;
    <?php }?>
    <?php echo $_smarty_tpl->tpl_vars['pagetext']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['pagenumber']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['oftext']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['pagecount']->value;?>

    <?php if ($_smarty_tpl->tpl_vars['pagenumber']->value < $_smarty_tpl->tpl_vars['pagecount']->value) {?>
      &nbsp;<?php echo $_smarty_tpl->tpl_vars['nextpage']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['lastpage']->value;?>

    <?php }?>
  </div>
<?php }?>

<!-- End News Display Template --><?php }
}
