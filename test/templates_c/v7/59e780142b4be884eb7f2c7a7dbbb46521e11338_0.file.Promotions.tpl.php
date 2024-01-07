<?php
/* Smarty version 4.3.2, created on 2023-09-12 09:21:40
  from 'C:\xampp73\htdocs\vtiger8\layouts\v7\modules\ExtensionStore\Promotions.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_65002da41f3cc3_95732593',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '59e780142b4be884eb7f2c7a7dbbb46521e11338' => 
    array (
      0 => 'C:\\xampp73\\htdocs\\vtiger8\\layouts\\v7\\modules\\ExtensionStore\\Promotions.tpl',
      1 => 1694510495,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65002da41f3cc3_95732593 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['HEADER_SCRIPTS']->value, 'SCRIPT');
$_smarty_tpl->tpl_vars['SCRIPT']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['SCRIPT']->value) {
$_smarty_tpl->tpl_vars['SCRIPT']->do_else = false;
echo '<script'; ?>
 type="<?php echo $_smarty_tpl->tpl_vars['SCRIPT']->value->getType();?>
" src="<?php echo $_smarty_tpl->tpl_vars['SCRIPT']->value->getSrc();?>
" /><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
