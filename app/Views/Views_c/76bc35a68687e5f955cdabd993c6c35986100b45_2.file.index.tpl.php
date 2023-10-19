<?php
/* Smarty version 4.3.0, created on 2023-10-19 07:20:07
  from '/var/www/app/Views/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_6530d8a7a07140_28867208',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '76bc35a68687e5f955cdabd993c6c35986100b45' => 
    array (
      0 => '/var/www/app/Views/index.tpl',
      1 => 1697700005,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6530d8a7a07140_28867208 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE>
<html lang="ja">
<head>
</head>
<body class="d-flex flex-column h-100">
    <main role="main" class="flex-shrink-0">
        <div class="container">
            <h1>Sample Page!</h1>
            <p><?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['message']->value, ENT_QUOTES, 'UTF-8');?>
</p>
        </div>
        <form method="post" class="form-horizontal">
            <div class="form-group ml-5">
                <button name="delete" type="submit" class="btn btn-danger">delete</button>
            </div>
            <table class="table table-striped">
                <tr>
                    <th>delete</th>
                    <th>id</th>
                    <th>name</th>
                </tr>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                <tr>
                    <td>
                        <input type="checkbox" name="item[<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['item']->value['id'], ENT_QUOTES, 'UTF-8');?>
]" />
                    </td>
                    <td><?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['item']->value['id'], ENT_QUOTES, 'UTF-8');?>
</td>
                    <td><?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['item']->value['name'], ENT_QUOTES, 'UTF-8');?>
</td>
                </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </table>
        </form>
        <form class="form-inline" method="post">
            <label> Name </label><input type="text" name="name" class="form-control" placeholder="input new name">
            <button name="add" type="submit" class="btn btn-info">register</button>
        </form>
    </main>
</body>
</html><?php }
}
