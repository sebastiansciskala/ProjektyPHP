<?php
/* Smarty version 3.1.31, created on 2025-05-01 21:57:47
  from "module_file_tpl:Gallery;editimage.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_6813d23bb65044_74274964',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '327d4b040c47ea59356ecd0105c2a9bf7b74f1a6' => 
    array (
      0 => 'module_file_tpl:Gallery;editimage.tpl',
      1 => 1746124396,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6813d23bb65044_74274964 (Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="pageoverflow">
	<div style="float:left; border:2px solid #ccc; margin:0 50px; padding:1px;"><?php echo $_smarty_tpl->tpl_vars['image']->value->thumb;?>
</div>
  <p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['file']->value;?>
: #<?php echo $_smarty_tpl->tpl_vars['image']->value->fileid;?>
</p>
  <p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['image']->value->filename_input;?>
</p>
  <p class="pageinput"><br /><br /></p>
  <p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['rotateanticlockwise']->value;?>
 &nbsp; <?php echo $_smarty_tpl->tpl_vars['rotateclockwise']->value;?>
</p>
</div>


<?php echo $_smarty_tpl->tpl_vars['TabHeaders']->value;?>

<?php echo $_smarty_tpl->tpl_vars['StartTab_image']->value;?>


<?php echo $_smarty_tpl->tpl_vars['formstart']->value;
echo $_smarty_tpl->tpl_vars['hidden']->value;?>


<div class="pageoverflow">
  <p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
:</p>
  <p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['image']->value->title_input;?>
</p>
</div>

<div class="pageoverflow">
  <p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['comment']->value;?>
:</p>
  <p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['image']->value->comment_input;?>
</p>
</div>

<div class="pageoverflow">
  <p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['filedate']->value;?>
:</p>
  <p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['image']->value->filedate_input;?>
</p>
</div>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['image']->value->fields, 'field');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['field']->value) {
?>
<div class="pageoverflow">
  <p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['field']->value['name'];?>
:</p>
  <p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['field']->value['fieldhtml'];
echo $_smarty_tpl->tpl_vars['field']->value['publicfieldhtml'];?>
</p>
</div>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>


<div class="pageoverflow">
  <p class="pagetext">&nbsp;</p>
  <p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['submit']->value;
echo $_smarty_tpl->tpl_vars['apply']->value;
echo $_smarty_tpl->tpl_vars['cancel']->value;?>
</p>
	<p>&nbsp;</p>
</div>

<?php echo $_smarty_tpl->tpl_vars['formend']->value;?>


<?php echo $_smarty_tpl->tpl_vars['EndTab']->value;?>

<?php echo $_smarty_tpl->tpl_vars['StartTab_thumbs']->value;?>


<?php echo $_smarty_tpl->tpl_vars['formstart2']->value;
echo $_smarty_tpl->tpl_vars['hidden2']->value;?>


<div style="float:left; min-width:200px;">
	<?php echo $_smarty_tpl->tpl_vars['prompt_template']->value;?>
<br />
	<?php echo $_smarty_tpl->tpl_vars['template']->value;?>

	<br /><br />
	<?php echo $_smarty_tpl->tpl_vars['thumb_current']->value;?>
<br />
	<img src="<?php echo $_smarty_tpl->tpl_vars['image']->value->thumburl;?>
" id="currentthumb" alt="current thumbnail" style="border:2px solid #ccc; padding:1px;" />
	<br /><br />
	<?php echo $_smarty_tpl->tpl_vars['thumb_preview']->value;?>
<br />
	<div style="padding-right:40px; margin-right:20px; background: transparent url(../modules/Gallery/images/back.gif) no-repeat right center;">
		<div id="thumbpreviewcontainer" style="overflow:hidden; border:2px solid #ccc; padding:1px;">
			<img src="<?php echo $_smarty_tpl->tpl_vars['image']->value->file;?>
" id="thumbpreview" alt="thumbnail preview" />
		</div>
	</div>
	<br /><br />
	
</div>

<div style="float:left;">
	<?php echo $_smarty_tpl->tpl_vars['editthumb_help']->value;?>
<br />
  <img src="<?php echo $_smarty_tpl->tpl_vars['image']->value->file;?>
" id="cropbox" <?php echo $_smarty_tpl->tpl_vars['image']->value->filewidthheight;?>
 alt="" style="border:2px solid #ccc; padding:1px;" />
</div>

<div class="pageoverflow">
  <p class="pagetext">&nbsp;</p>
  <p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['submit2']->value;
echo $_smarty_tpl->tpl_vars['apply2']->value;
echo $_smarty_tpl->tpl_vars['cancel2']->value;?>
</p>
	<p>&nbsp;</p>
</div>

<?php echo $_smarty_tpl->tpl_vars['formend']->value;?>


<?php echo '<script'; ?>
 type="text/javascript">
	$(function() {
		$('#templateid').change( function() {
			location.href = "<?php echo $_smarty_tpl->tpl_vars['redirect_url']->value;?>
"+$(this).val();
		});
		ias = $('#cropbox').imgAreaSelect({
			instance: true,
			onSelectChange: preview,
			onSelectEnd: function (img, selection) {
				$('input[name="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
x1"]').val(selection.x1);
				$('input[name="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
y1"]').val(selection.y1);
				$('input[name="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
x2"]').val(selection.x2);
				$('input[name="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
y2"]').val(selection.y2);
			}
		});
		changethumb();
	});
<?php echo '</script'; ?>
>

<?php echo $_smarty_tpl->tpl_vars['EndTab']->value;?>

<?php echo $_smarty_tpl->tpl_vars['EndTabContent']->value;
}
}
