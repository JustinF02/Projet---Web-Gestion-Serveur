<?php
/* Smarty version 3.1.34-dev-7, created on 2021-12-20 10:58:26
  from 'C:\laragon\M3104\PROJET_WEB\templates\register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_61c061d2402d34_22226637',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c004f5f10f5799f5556f4cea5f5d8485a04ef223' => 
    array (
      0 => 'C:\\laragon\\M3104\\PROJET_WEB\\templates\\register.tpl',
      1 => 1639997817,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61c061d2402d34_22226637 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>
<html>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_87321054661c061d23cd781_79959290', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_131801395061c061d23cea42_27404748', 'body');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'layout.tpl');
}
/* {block 'title'} */
class Block_87321054661c061d23cd781_79959290 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_87321054661c061d23cd781_79959290',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Register<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_131801395061c061d23cea42_27404748 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_131801395061c061d23cea42_27404748',
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
</head>
<div class="container">
<h1>Register</h1>
<div id='main'>
    

    <form action="register" method="post">
        <label for="register">Nom</label>
        <input type="text" <?php if (empty($_smarty_tpl->tpl_vars['message']->value['nom'])) {?>class="form-control"<?php } else { ?> class="form-control is-invalid" <?php }?> value='<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['valeurs']->value['nom'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
' id="nom" name="nom" aria-describedby="emailHelp" placeholder="Nom">
        <div><?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['message']->value['nom'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
</div>
        <br>
        <br>
        <label for="register">Prénom</label>
        <input type="text" <?php if (empty($_smarty_tpl->tpl_vars['message']->value['prenom'])) {?>class="form-control"<?php } else { ?> class="form-control is-invalid" <?php }?> value='<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['valeurs']->value['prenom'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
' id="prenom" name="prenom" aria-describedby="emailHelp" placeholder="prenom">
        <div><?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['message']->value['prenom'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
</div>
        <br>
        <br>
        <label for="register">Adresse mail</label>
        <input type="email" <?php if (empty($_smarty_tpl->tpl_vars['message']->value['email_vide']) && empty($_smarty_tpl->tpl_vars['message']->value['email_existant']) && empty($_smarty_tpl->tpl_vars['message']->value['email_incorrect'])) {?>class="form-control"<?php } else { ?> class="form-control is-invalid" <?php }?> value='<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['valeurs']->value['email'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
' id="email" name="email" aria-describedby="passwordHelp" placeholder="Adresse mail">
        <div><?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['message']->value['email_vide'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
</div><div><?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['message']->value['email_existant'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
</div><div><?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['message']->value['email_incorrect'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
</div>
        <br>
        <br>
        <label for="register">Mot de passe</label>
        <input type="password" <?php if (empty($_smarty_tpl->tpl_vars['message']->value['mdp_vide']) && empty($_smarty_tpl->tpl_vars['message']->value['mdp_longueur'])) {?> class="form-control"<?php } else { ?> class="form-control is-invalid" <?php }?> value='<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['valeurs']->value['mdp'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
' id="mdp" name="mdp" placeholder="Mot de passe">
        <div><?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['message']->value['mdp_vide'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
</div><div><?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['message']->value['mdp_longueur'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
</div>
        <br>
        <br>
        <div class="row">
            <div class="col-4">
                <select class="form-select"  id="role" name="role" aria-label="Default select example">
                    <option value="candidat" <?php if ((isset($_smarty_tpl->tpl_vars['valeurs']->value['role'])) && ($_smarty_tpl->tpl_vars['valeurs']->value['role'] === "candidat")) {?> selected<?php }?>>Candidat</option>
                    <option value="responsable" <?php if ((isset($_smarty_tpl->tpl_vars['valeurs']->value['role'])) && ($_smarty_tpl->tpl_vars['valeurs']->value['role'] === "responsable")) {?> selected<?php }?>>Responsable</option>
                </select>
            </div>
            <div class="col-8">
                <?php if ((isset($_smarty_tpl->tpl_vars['role']->value))) {?>
                    <?php if (($_smarty_tpl->tpl_vars['role']->value === "responsable")) {?>
                        <input type="password" <?php if (empty($_smarty_tpl->tpl_vars['message']->value['mdp_res']) && empty($_smarty_tpl->tpl_vars['message']->value['erreur_mdp_res'])) {?> class="form-control"<?php } else { ?> class="form-control is-invalid" <?php }?> value='<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['valeurs']->value['mdp_res'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
' id="mdp_res" name="mdp_res" placeholder="Mot de passe responsable">
                        <div><?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['message']->value['mdp_res'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
</div><div><?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['message']->value['erreur_mdp_res'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
</div>
                   <?php }?>
                <?php }?>
            </div>
        </div>
        <br>
        <br>
        <label for="register">Adresse</label>
        <input type="text" <?php if (empty($_smarty_tpl->tpl_vars['message']->value['adresse'])) {?> class="form-control"<?php } else { ?> class="form-control is-invalid" <?php }?> value='<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['valeurs']->value['adresse'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
' id="adresse" name="adresse" aria-describedby="emailHelp" placeholder="Adresse">
        <div><?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['message']->value['adresse'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
</div>
        <br>
        <br>
        <label for="register">Code Postal</label>
        <input type="text" <?php if (empty($_smarty_tpl->tpl_vars['message']->value['code_postal']) && empty($_smarty_tpl->tpl_vars['message']->value['erreur_code_postal'])) {?> class="form-control"<?php } else { ?> class="form-control is-invalid" <?php }?> value='<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['valeurs']->value['code_postal'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
' id="code_postal" name="code_postal" aria-describedby="emailHelp" placeholder="Code Postal">
        <div><?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['message']->value['code_postal'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
</div><div><?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['message']->value['erreur_code_postal'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
</div>
        <br>
        <br>
        <div class="row">
            <div class="col-2">
                <label for="register">N° téléphone</label>
            </div>
            <div class="col-4">
                <input type="text" <?php if (empty($_smarty_tpl->tpl_vars['message']->value['telephone']) && empty($_smarty_tpl->tpl_vars['message']->value['erreur_telephone'])) {?> class="form-control" <?php } else { ?> class="form-control is-invalid" <?php }?> value='<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['valeurs']->value['telephone'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
' id="telephone" name="telephone" placeholder="n° telephone">
            </div>
        </div>
        <div><?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['message']->value['telephone'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
</div><div><?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['message']->value['erreur_telephone'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
</div>
        <br>
        <br>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
            <label class="form-check-label" for="invalidCheck">
                J'accepte les conditions
            </label>
            <div class="invalid-feedback">
                You must agree before submitting.
            </div>
        </div>
        <br>
        <br>
        </label>
        <button type="submit" class="btn btn-primary">S'inscrire</button>
    </form>
</div>
   
</html>
</div>
<?php
}
}
/* {/block 'body'} */
}
