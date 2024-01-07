<?php
/* Smarty version 4.3.2, created on 2023-09-12 09:25:40
  from 'C:\xampp73\htdocs\vtiger8\layouts\v7\modules\Vtiger\Footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_65002e946f6b15_18107564',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8b418d6639e846cfc386fc2e12bcdc399f0cbd4e' => 
    array (
      0 => 'C:\\xampp73\\htdocs\\vtiger8\\layouts\\v7\\modules\\Vtiger\\Footer.tpl',
      1 => 1694510736,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65002e946f6b15_18107564 (Smarty_Internal_Template $_smarty_tpl) {
?>
<footer class="app-footer">
	<p>
		Designed &amp; Maintained By - CBSL &copy; <?php echo date('Y');?>
&nbsp;&nbsp;
		<a href="https://conneqtcorp.com" target="_blank">Conneqt Business Solutions Ltd.</a>
	</p>
</footer>
</div>
<div id='overlayPage'>
	<!-- arrow is added to point arrow to the clicked element (Ex:- TaskManagement), 
	any one can use this by adding "show" class to it -->
	<div class='arrow'></div>
	<div class='data'>
	</div>
</div>
<div id='helpPageOverlay'></div>
<div id="js_strings" class="hide noprint"><?php echo Zend_Json::encode($_smarty_tpl->tpl_vars['LANGUAGE_STRINGS']->value);?>
</div>
<div id="maxListFieldsSelectionSize" class="hide noprint"><?php echo $_smarty_tpl->tpl_vars['MAX_LISTFIELDS_SELECTION_SIZE']->value;?>
</div>
<div class="modal myModal fade"></div>
<?php $_smarty_tpl->_subTemplateRender(vtemplate_path('JSResources.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
</body>

</html>
<?php }
}
