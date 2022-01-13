<?php
/* Smarty version 3.1.34-dev-7, created on 2021-12-17 08:00:44
  from 'C:\laragon\M3104\PROJET_WEB\templates\layout.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_61bc43ac1c8a13_69253400',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '90779d65c64e31db7e0fcf4cbffe17172e6422ac' => 
    array (
      0 => 'C:\\laragon\\M3104\\PROJET_WEB\\templates\\layout.tpl',
      1 => 1639728042,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61bc43ac1c8a13_69253400 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<html>
<head>
    <title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_117473012261bc43ac1bf522_04324663', 'title');
?>
</title>
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_107214161561bc43ac1c0ee9_24566947', 'head');
?>

</head>
<body>
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_126001406761bc43ac1c1a86_03404962', 'menu');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_23053924461bc43ac1c83d7_64717446', 'body');
?>

</body>
</html><?php }
/* {block 'title'} */
class Block_117473012261bc43ac1bf522_04324663 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_117473012261bc43ac1bf522_04324663',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Default Page Title<?php
}
}
/* {/block 'title'} */
/* {block 'head'} */
class Block_107214161561bc43ac1c0ee9_24566947 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_107214161561bc43ac1c0ee9_24566947',
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
class Block_126001406761bc43ac1c1a86_03404962 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'menu' => 
  array (
    0 => 'Block_126001406761bc43ac1c1a86_03404962',
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
</b><br>
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
class Block_23053924461bc43ac1c83d7_64717446 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_23053924461bc43ac1c83d7_64717446',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Contenu générique<?php
}
}
/* {/block 'body'} */
}
