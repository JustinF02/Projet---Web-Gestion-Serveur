<?php
/* Smarty version 3.1.34-dev-7, created on 2021-12-16 22:37:56
  from 'C:\laragon\M3104\PROJET_WEB\templates\success.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_61bbbfc4ba0aa2_96245890',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '00e024e7116942a97bcb194820ff017c89dccc7e' => 
    array (
      0 => 'C:\\laragon\\M3104\\PROJET_WEB\\templates\\success.tpl',
      1 => 1639694165,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61bbbfc4ba0aa2_96245890 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_63199063761bbbfc4b9eff7_17479832', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_100367137561bbbfc4ba01d6_20506541', 'body');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'layout.tpl');
}
/* {block 'title'} */
class Block_63199063761bbbfc4b9eff7_17479832 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_63199063761bbbfc4b9eff7_17479832',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Succès!<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_100367137561bbbfc4ba01d6_20506541 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_100367137561bbbfc4ba01d6_20506541',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div id='main'>
Bien enregistré, vous pouvez vous rendre sur la page de <a href='login'>connexion</a>
</div>
<?php
}
}
/* {/block 'body'} */
}
