<?php
/* Smarty version 3.1.34-dev-7, created on 2021-12-20 11:06:40
  from 'C:\laragon\M3104\PROJET_WEB\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_61c063c05edbd8_44040970',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd281235a7f7123f18d6cc7776390719089303e98' => 
    array (
      0 => 'C:\\laragon\\M3104\\PROJET_WEB\\templates\\login.tpl',
      1 => 1639997815,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61c063c05edbd8_44040970 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_44630927661c063c05d9d45_77301148', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_87477551461c063c05da7a0_74436511', 'body');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'layout.tpl');
}
/* {block 'title'} */
class Block_44630927661c063c05d9d45_77301148 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_44630927661c063c05d9d45_77301148',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Login<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_87477551461c063c05da7a0_74436511 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_87477551461c063c05da7a0_74436511',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"><?php echo '</script'; ?>
>
  <link rel="stylesheet" href="interface.css">
</head>
<div id='main'>
<h1>Login</h1>
<p>
<div class="container">
    <form action="login" method="post">
        <div><?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['message']->value['email_connexion'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
</div><div><?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['message']->value['mdp_connexion'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
</div>
        <br>
        <label for="exampleInputEmail1" class="form-label">Adresse mail</label>
        <input type="email" class="form-control" value='<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['valeurs']->value['email'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
' id="email" name="email" aria-describedby="emailHelp" placeholder="Adresse mail">
        <div><?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['message']->value['email'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
</div>
        <br>
        <br>
        <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" value='<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['valeurs']->value['mdp'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
' id="mdp" name="mdp" placeholder="Mot de passe">
        <div><?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['message']->value['mdp'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
</div>
        <br>
        <br>
        <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>
</div>
</p>
</div>
<?php
}
}
/* {/block 'body'} */
}
