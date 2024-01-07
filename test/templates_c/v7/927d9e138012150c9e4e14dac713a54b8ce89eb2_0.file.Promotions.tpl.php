<?php
/* Smarty version 4.3.2, created on 2024-01-02 08:59:50
  from 'C:\xampp_7_4\htdocs\vtiger8\layouts\v7\modules\ExtensionStore\Promotions.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_6593d086a67950_94102282',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '927d9e138012150c9e4e14dac713a54b8ce89eb2' => 
    array (
      0 => 'C:\\xampp_7_4\\htdocs\\vtiger8\\layouts\\v7\\modules\\ExtensionStore\\Promotions.tpl',
      1 => 1704184939,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6593d086a67950_94102282 (Smarty_Internal_Template $_smarty_tpl) {
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
