<?php
/* Smarty version 4.3.0, created on 2023-10-19 07:42:50
  from '/var/www/app/Views/template/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_6530ddfaae93e0_65766109',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '131851154d0fe6608335ac308584f240068a9cde' => 
    array (
      0 => '/var/www/app/Views/template/header.tpl',
      1 => 1697701141,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6530ddfaae93e0_65766109 (Smarty_Internal_Template $_smarty_tpl) {
?>    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="<?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['url']->value ?? ""), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['title']->value ?? ""), ENT_QUOTES, 'UTF-8');?>
</a>
        </nav>
    </header>
<?php }
}
