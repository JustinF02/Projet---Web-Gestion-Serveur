<?php
/* Smarty version 3.1.34-dev-7, created on 2021-12-16 22:58:40
  from 'C:\laragon\M3104\PROJET_WEB\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_61bbc4a014cd46_74995553',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cb7ee1f9a9ab7c2ac96671974441f3cf49f312cc' => 
    array (
      0 => 'C:\\laragon\\M3104\\PROJET_WEB\\templates\\index.tpl',
      1 => 1639695497,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61bbc4a014cd46_74995553 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<html>
<head>
    <title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_152538063261bbc4a0143b05_88402075', 'title');
?>
</title>
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_42971535061bbc4a0145772_80489389', 'head');
?>

</head>
<body>
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_198150057161bbc4a0145fd8_18212396', 'menu');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_141728966061bbc4a014c6d7_26978383', 'body');
?>

</body>
</html><?php }
/* {block 'title'} */
class Block_152538063261bbc4a0143b05_88402075 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_152538063261bbc4a0143b05_88402075',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Default Page Title<?php
}
}
/* {/block 'title'} */
/* {block 'head'} */
class Block_42971535061bbc4a0145772_80489389 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_42971535061bbc4a0145772_80489389',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.3/build/pure-min.css" integrity="sha384-cg6SkqEOCV1NbJoCu11+bm0NvBRc8IYLRGXkmNrqUBfTjmMYwNKPWBTIKyw9mHNJ" crossorigin="anonymous">
    <style>
    #main,footer{ padding:1em }
    </style>
    <link rel="stylesheet" href="templates/style.css">
    <?php
}
}
/* {/block 'head'} */
/* {block 'menu'} */
class Block_198150057161bbc4a0145fd8_18212396 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'menu' => 
  array (
    0 => 'Block_198150057161bbc4a0145fd8_18212396',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <p>Menu de navigation générique défini dans layout.tpl</p>
    <a href="./">Accueil</a>
    <p>
        <?php if ((isset($_smarty_tpl->tpl_vars['_SESSION']->value['nom']))) {?>
            Bienvenue, <b><?php echo $_smarty_tpl->tpl_vars['_SESSION']->value['nom'];
echo $_smarty_tpl->tpl_vars['_SESSION']->value['prenom'];?>
</b> !<br>
            Voir <a href="./profil">mon profil</a> | <a href="./logout">Me déconnecter | <a href="./apply">Candidater</a></a>
        <?php } else { ?>
            Contenu du site <br>
            Se <a href="./login">connecter</a> ou <a href="./register">créer un compte</a>
        <?php }?>
    </p>
<?php
}
}
/* {/block 'menu'} */
/* {block 'body'} */
class Block_141728966061bbc4a014c6d7_26978383 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_141728966061bbc4a014c6d7_26978383',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Contenu générique<?php
}
}
/* {/block 'body'} */
}
