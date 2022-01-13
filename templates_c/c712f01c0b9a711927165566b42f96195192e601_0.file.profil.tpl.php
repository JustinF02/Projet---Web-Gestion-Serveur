<?php
/* Smarty version 3.1.34-dev-7, created on 2021-12-16 22:58:41
  from 'C:\laragon\M3104\PROJET_WEB\templates\profil.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_61bbc4a1ee2257_08674948',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c712f01c0b9a711927165566b42f96195192e601' => 
    array (
      0 => 'C:\\laragon\\M3104\\PROJET_WEB\\templates\\profil.tpl',
      1 => 1639694174,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61bbc4a1ee2257_08674948 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_171178072261bbc4a1ed5054_57707136', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_38924160761bbc4a1ed5a14_64075019', 'body');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'layout.tpl');
}
/* {block 'title'} */
class Block_171178072261bbc4a1ed5054_57707136 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_171178072261bbc4a1ed5054_57707136',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Profil<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_38924160761bbc4a1ed5a14_64075019 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_38924160761bbc4a1ed5a14_64075019',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div id='main'>
<h1>Mon profil</h1>
<br>
<?php if (((isset($_SESSION['nom'])) && (isset($_SESSION['nom'])))) {?>
    <h3>Bonjour <?php echo $_SESSION['prenom'];?>
 <?php echo $_SESSION['nom'];?>
</h3>
<?php }?>
<br>
<?php if (((isset($_SESSION['role'])))) {?>
    <div>Role : <?php echo $_SESSION['role'];?>
</div>
<?php }?>
<br>
<?php if (((isset($_SESSION['adresse'])))) {?>
    <div>Adresse : <?php echo $_SESSION['adresse'];?>
</div>
<?php }?>
<br>
<?php if (((isset($_SESSION['code_postal'])))) {?>
    <div>Code Postal : <?php echo $_SESSION['code_postal'];?>
</div>
<?php }?>
<br>
<?php if (((isset($_SESSION['telephone'])))) {?>
    <div>Telephone : <?php echo $_SESSION['telephone'];?>
</div>
<?php }
}
}
/* {/block 'body'} */
}
