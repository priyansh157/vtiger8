<?php
/* Smarty version 4.3.2, created on 2023-09-12 09:33:33
  from 'C:\xampp73\htdocs\vtiger8\layouts\v7\modules\Vtiger\DetailViewFullContents.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_6500306da7d301_78785536',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4ab5cc0217029894b02c60ab3afc32843fb401b0' => 
    array (
      0 => 'C:\\xampp73\\htdocs\\vtiger8\\layouts\\v7\\modules\\Vtiger\\DetailViewFullContents.tpl',
      1 => 1693558649,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6500306da7d301_78785536 (Smarty_Internal_Template $_smarty_tpl) {
?>
<form id="detailView" method="POST"><?php $_smarty_tpl->_subTemplateRender(vtemplate_path('DetailViewBlockView.tpl',$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('RECORD_STRUCTURE'=>$_smarty_tpl->tpl_vars['RECORD_STRUCTURE']->value,'MODULE_NAME'=>$_smarty_tpl->tpl_vars['MODULE_NAME']->value), 0, true);
?></form>
<?php }
}
