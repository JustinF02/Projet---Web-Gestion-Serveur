<?php
/* Smarty version 3.1.34-dev-7, created on 2021-12-20 11:14:25
  from 'C:\laragon\M3104\PROJET_WEB\templates\apply.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_61c0659171db05_94959215',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a2678c916944faf4ecfa857783da5361730d0778' => 
    array (
      0 => 'C:\\laragon\\M3104\\PROJET_WEB\\templates\\apply.tpl',
      1 => 1639998847,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61c0659171db05_94959215 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_74621125761c065916b9626_54902465', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_119434789561c065916bafd7_23210765', 'body');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'layout.tpl');
}
/* {block 'title'} */
class Block_74621125761c065916b9626_54902465 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_74621125761c065916b9626_54902465',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Candidater<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_119434789561c065916bafd7_23210765 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_119434789561c065916bafd7_23210765',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<?php $_smarty_tpl->_assignInScope('candidature', (($tmp = @$_smarty_tpl->tpl_vars['candidature']->value)===null||$tmp==='' ? array() : $tmp));
$_smarty_tpl->_assignInScope('erreurs', (($tmp = @$_smarty_tpl->tpl_vars['erreur']->value)===null||$tmp==='' ? array() : $tmp));
$_smarty_tpl->_assignInScope('compteur', (($tmp = @$_smarty_tpl->tpl_vars['compteur']->value)===null||$tmp==='' ? 0 : $tmp));?>

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

    <link rel="stylesheet" href="../css/apply.css">

    <h1><b>Candidature</b></h1>
    <hr>

    <form action="apply" method="post" enctype="multipart/form-data"> 
        <br>
        <label for="nom_groupe">
            <b>Nom du groupe :</b>
            <input type="text" placeholder="Renseignez le nom du groupe" name="nom_groupe" id="nom_groupe" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['candidature']->value['nom_groupe'])===null||$tmp==='' ? '' : $tmp);?>
" size="25">
            <span>
                <i><?php echo (($tmp = @$_smarty_tpl->tpl_vars['erreurs']->value['nom_groupe'])===null||$tmp==='' ? '' : $tmp);?>
</i>
            </span>
        </label>
    
        <br>
        <label for="representant_groupe">
            <b>Représentant du groupe :</b>
            <?php if ((isset($_smarty_tpl->tpl_vars['_SESSION']->value['nom']))) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['_SESSION']->value, 'value', false, 'key');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
                    <p><b><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
 :</b> <?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</p>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <?php } else { ?>
                se <a href="./login">connecter</a> ou <a href="./register">créer un compte</a>
            <?php }?>
            <span>
                <i><?php echo (($tmp = @$_smarty_tpl->tpl_vars['erreurs']->value['representant_groupe'])===null||$tmp==='' ? '' : $tmp);?>
</i>
            </span>
        </label>

        <br>
        <label for="membre_groupe">
            <b>Renseignez le ou les membres du groupe sans compter le représentant, 8 membres comptant le représentant maximum</b>
            <input type="number" min="0" max="7" name="nb_membre_groupe" id="nb_membre_groupe" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['candidature']->value['nb_membre_groupe'])===null||$tmp==='' ? 0 : $tmp);?>
">
            <button name="ok" id="submit" type="submit" class="registerbtn"><b>ok</b></button>
            <?php if ((!empty($_smarty_tpl->tpl_vars['candidature']->value['nb_membre_groupe'])) && ($_smarty_tpl->tpl_vars['candidature']->value['nb_membre_groupe'] > 0)) {?>
                <?php ob_start();
echo $_smarty_tpl->tpl_vars['candidature']->value['nb_membre_groupe'];
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->tpl_vars['indice'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['indice']->step = 1;$_smarty_tpl->tpl_vars['indice']->total = (int) ceil(($_smarty_tpl->tpl_vars['indice']->step > 0 ? $_prefixVariable1+1 - (1) : 1-($_prefixVariable1)+1)/abs($_smarty_tpl->tpl_vars['indice']->step));
if ($_smarty_tpl->tpl_vars['indice']->total > 0) {
for ($_smarty_tpl->tpl_vars['indice']->value = 1, $_smarty_tpl->tpl_vars['indice']->iteration = 1;$_smarty_tpl->tpl_vars['indice']->iteration <= $_smarty_tpl->tpl_vars['indice']->total;$_smarty_tpl->tpl_vars['indice']->value += $_smarty_tpl->tpl_vars['indice']->step, $_smarty_tpl->tpl_vars['indice']->iteration++) {
$_smarty_tpl->tpl_vars['indice']->first = $_smarty_tpl->tpl_vars['indice']->iteration === 1;$_smarty_tpl->tpl_vars['indice']->last = $_smarty_tpl->tpl_vars['indice']->iteration === $_smarty_tpl->tpl_vars['indice']->total;?>
                    <br>
                    <b>Membre n°<?php echo $_smarty_tpl->tpl_vars['indice']->value;?>
</b>
                    <label for="membre_groupe" style="display: block">
                        <input type="text" placeholder="Nom" name="<?php echo "nom_membre[".((string)$_smarty_tpl->tpl_vars['indice']->value)."]";?>
" id="<?php echo "nom_membre".((string)$_smarty_tpl->tpl_vars['indice']->value);?>
" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['candidature']->value['nom_membre'][$_smarty_tpl->tpl_vars['indice']->value])===null||$tmp==='' ? '' : $tmp);?>
" style="display: inline">
                            <span>
                                <i><?php echo (($tmp = @$_smarty_tpl->tpl_vars['erreurs']->value['nom_membre'][$_smarty_tpl->tpl_vars['indice']->value])===null||$tmp==='' ? '' : $tmp);?>
</i>
                            </span>
                        <input type="text" placeholder="Prenom" name="<?php echo "prenom_membre[".((string)$_smarty_tpl->tpl_vars['indice']->value)."]";?>
" id="<?php echo "prenom_membre".((string)$_smarty_tpl->tpl_vars['indice']->value);?>
" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['candidature']->value['prenom_membre'][$_smarty_tpl->tpl_vars['indice']->value])===null||$tmp==='' ? '' : $tmp);?>
" style="display: inline">
                            <span>
                                <i><?php echo (($tmp = @$_smarty_tpl->tpl_vars['erreurs']->value['prenom_membre'][$_smarty_tpl->tpl_vars['indice']->value])===null||$tmp==='' ? '' : $tmp);?>
</i>
                            </span>
                        <input type="text" placeholder="Instrument" name="<?php echo "instrument_membre[".((string)$_smarty_tpl->tpl_vars['indice']->value)."]";?>
" id="<?php echo "instrument_membre".((string)$_smarty_tpl->tpl_vars['indice']->value);?>
" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['candidature']->value['instrument_membre'][$_smarty_tpl->tpl_vars['indice']->value])===null||$tmp==='' ? '' : $tmp);?>
" style="display: inline">
                            <span>
                                <i><?php echo (($tmp = @$_smarty_tpl->tpl_vars['erreurs']->value['instrument_membre'][$_smarty_tpl->tpl_vars['indice']->value])===null||$tmp==='' ? '' : $tmp);?>
</i>
                            </span>
                    </label>
                <?php }
}
?>
            <?php }?>
        </label>

        <br>
        <label for="date_creation_groupe">
            <b>Année de création du groupe :</b>
            <input type="number" min="1900" max="<?php echo $_smarty_tpl->tpl_vars['utils']->value['annee'];?>
" name="date_creation_groupe" id="date_creation_groupe" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['candidature']->value['date_creation_groupe'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['utils']->value['annee'] : $tmp);?>
">
            <span>
                <i><?php echo (($tmp = @$_smarty_tpl->tpl_vars['erreurs']->value['date_creation_groupe'])===null||$tmp==='' ? '' : $tmp);?>
</i>
            </span>
        </label>

        <br>
        <label for="type_scene">
            <b>Type de scene :</b>
            <select name="type_scene" id="type_scene">
                <option value="" selected disabled hidden>Sélectionnez votre type de scene</option>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['utils']->value['type_scene'], 'type', false, 'numero');
$_smarty_tpl->tpl_vars['type']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['numero']->value => $_smarty_tpl->tpl_vars['type']->value) {
$_smarty_tpl->tpl_vars['type']->do_else = false;
?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['type']->value, 'genre', false, 'key');
$_smarty_tpl->tpl_vars['genre']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['genre']->value) {
$_smarty_tpl->tpl_vars['genre']->do_else = false;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['numero']->value;?>
" <?php if ((!empty($_smarty_tpl->tpl_vars['candidature']->value['type_scene'])) && ($_smarty_tpl->tpl_vars['candidature']->value['type_scene'] == ((string)$_smarty_tpl->tpl_vars['numero']->value))) {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['genre']->value;?>
</option>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </select>
            <span>
                <i><?php echo (($tmp = @$_smarty_tpl->tpl_vars['erreurs']->value['type_scene'])===null||$tmp==='' ? '' : $tmp);?>
</i>
            </span>
        </label>
        
        <br>
        <label for="departement">
            <b>Département :</b>
            <select name="departement" id="departement">
                <option value="" selected disabled hidden>Sélectionnez un département</option>
                <option value="999" <?php if ((!empty($_smarty_tpl->tpl_vars['candidature']->value['departement'])) && ($_smarty_tpl->tpl_vars['candidature']->value['departement'] == "999")) {?> selected <?php }?>>Autre</option>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['utils']->value['departement'], 'departement', false, 'numero');
$_smarty_tpl->tpl_vars['departement']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['numero']->value => $_smarty_tpl->tpl_vars['departement']->value) {
$_smarty_tpl->tpl_vars['departement']->do_else = false;
?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['departement']->value['departement_nom'], 'nom');
$_smarty_tpl->tpl_vars['nom']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['nom']->value) {
$_smarty_tpl->tpl_vars['nom']->do_else = false;
?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['departement']->value['departement_code'], 'code');
$_smarty_tpl->tpl_vars['code']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['code']->value) {
$_smarty_tpl->tpl_vars['code']->do_else = false;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['numero']->value;?>
" <?php if ((!empty($_smarty_tpl->tpl_vars['candidature']->value['departement'])) && ($_smarty_tpl->tpl_vars['candidature']->value['departement'] == ((string)$_smarty_tpl->tpl_vars['numero']->value))) {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['code']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['nom']->value;?>
</option>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </select>
            <span>
                <i><?php echo (($tmp = @$_smarty_tpl->tpl_vars['erreurs']->value['departement'])===null||$tmp==='' ? '' : $tmp);?>
</i>
            </span>
        </label>

        <br>
        <label for="presentation">
            <b>Présentation du groupe :</b>
            <br>
            <textarea name="presentation" id="presentation" cols="100" rows="6" maxlength="500" placeholder="Présentez brievement votre groupe" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['candidature']->value['presentation'])===null||$tmp==='' ? '' : $tmp);?>
"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['candidature']->value['presentation'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>
            <span>
                <i><?php echo (($tmp = @$_smarty_tpl->tpl_vars['erreurs']->value['presentation'])===null||$tmp==='' ? '' : $tmp);?>
</i>
            </span>
        </label>

        <br>
        <label for="experience">
            <b>Expérience scenique du groupe :</b>
            <br>
            <textarea name="experience" id="experience" cols="100" rows="6" maxlength="500" placeholder="Présentez brievement votre groupe" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['candidature']->value['experience'])===null||$tmp==='' ? '' : $tmp);?>
"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['candidature']->value['experience'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>
        </label>
        <span>
            <i><?php echo (($tmp = @$_smarty_tpl->tpl_vars['erreurs']->value['experience'])===null||$tmp==='' ? '' : $tmp);?>
</i>
        </span>

        <br>
        <label for="style_musicaux">
            <b>Style musical du groupe :</b>
            <select name="style_musicaux" id="style_musicaux">
                <option value="" selected disabled hidden>Sélectionnez votre style musicale</option>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['utils']->value['style_musicaux'], 'style_musical', false, 'numero');
$_smarty_tpl->tpl_vars['style_musical']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['numero']->value => $_smarty_tpl->tpl_vars['style_musical']->value) {
$_smarty_tpl->tpl_vars['style_musical']->do_else = false;
?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['style_musical']->value['nom_style'], 'nom');
$_smarty_tpl->tpl_vars['nom']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['nom']->value) {
$_smarty_tpl->tpl_vars['nom']->do_else = false;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['numero']->value+1;?>
" <?php if ((!empty($_smarty_tpl->tpl_vars['candidature']->value['style_musicaux'])) && ($_smarty_tpl->tpl_vars['candidature']->value['style_musicaux'] == ((string)($_smarty_tpl->tpl_vars['numero']->value+1)))) {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['numero']->value+1;?>
 - <?php echo $_smarty_tpl->tpl_vars['nom']->value;?>
</option>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </select>
        </label>
        <span>
            <i><?php echo (($tmp = @$_smarty_tpl->tpl_vars['erreurs']->value['style_musicaux'])===null||$tmp==='' ? '' : $tmp);?>
</i>
        </span>

        <br>
        <label for="site_web">
            <b>Site web du groupe :</b>
            <input type="text" placeholder="Renseignez l'url du site web" name="site_web" id="site_web" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['candidature']->value['site_web'])===null||$tmp==='' ? '' : $tmp);?>
" size="80">
            <span>
                <i><?php echo (($tmp = @$_smarty_tpl->tpl_vars['erreurs']->value['site_web'])===null||$tmp==='' ? '' : $tmp);?>
</i>
            </span>
        </label>

        <br>
        <label for="soundcloud">
            <b>Soundcloud du groupe :</b>
            <input type="text" placeholder="Renseignez l'url du soundcloud" name="soundcloud" id="soundcloud" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['candidature']->value['soundcloud'])===null||$tmp==='' ? '' : $tmp);?>
" size="80">
            <span>
                <i><?php echo (($tmp = @$_smarty_tpl->tpl_vars['erreurs']->value['soundcloud'])===null||$tmp==='' ? '' : $tmp);?>
</i>
            </span>
        </label>

        <br>
        <label for="youtube">
            <b>Chaine Youtube du groupe :</b>
            <input type="text" placeholder="Renseignez l'url de la chaine youtube" name="youtube" id="youtube" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['candidature']->value['youtube'])===null||$tmp==='' ? '' : $tmp);?>
" size="80">
            <span>
                <i><?php echo (($tmp = @$_smarty_tpl->tpl_vars['erreurs']->value['youtube'])===null||$tmp==='' ? '' : $tmp);?>
</i>
            </span>
        </label>

        <br>
        <label for="statut_assoc">
            <b>Statut associatif :</b>
            Oui <input type="radio" name="statut_assoc" id="statut_assoc" value="<?php echo (($tmp = @"1")===null||$tmp==='' ? '' : $tmp);?>
" <?php if ((!empty($_smarty_tpl->tpl_vars['candidature']->value['statut_assoc'])) && ($_smarty_tpl->tpl_vars['candidature']->value['statut_assoc'] == "1")) {?> checked <?php }?>>
            Non <input type="radio" name="statut_assoc" id="statut_assoc" value="<?php echo (($tmp = @"0")===null||$tmp==='' ? '' : $tmp);?>
" <?php if ((!empty($_smarty_tpl->tpl_vars['candidature']->value['statut_assoc'])) && ($_smarty_tpl->tpl_vars['candidature']->value['statut_assoc'] == "0")) {?> checked <?php }?>>
            <span>
                <i><?php echo (($tmp = @$_smarty_tpl->tpl_vars['erreurs']->value['statut_assoc'])===null||$tmp==='' ? '' : $tmp);?>
</i>
            </span>
        </label>

        <?php echo '<script'; ?>
>
            function depotDocSACEM() {
                document.getElementById('depot_doc_sacem').style.display = 'block';
            }

            function retraitDepotDocSACEM() {
                document.getElementById('depot_doc_sacem').style.display = 'none';
            }
        <?php echo '</script'; ?>
>

        <br>
        <label for="inscrit_sacem">
            <b>Le groupe possède un document SACEM :</b>
            Oui <input type="radio" name="inscrit_sacem" id="inscrit_sacem" value="1" onchange="depotDocSACEM()" <?php if ((!empty($_smarty_tpl->tpl_vars['candidature']->value['inscrit_sacem'])) && ($_smarty_tpl->tpl_vars['candidature']->value['inscrit_sacem'] == "1")) {?> checked <?php }?>> 
            Non <input type="radio" name="inscrit_sacem" id="inscrit_sacem" value="0" onchange="retraitDepotDocSACEM()" <?php if ((!empty($_smarty_tpl->tpl_vars['candidature']->value['inscrit_sacem'])) && ($_smarty_tpl->tpl_vars['candidature']->value['inscrit_sacem'] == "0")) {?> checked <?php }?>>
            <span>
                <i><?php echo (($tmp = @$_smarty_tpl->tpl_vars['erreurs']->value['inscrit_sacem'])===null||$tmp==='' ? '' : $tmp);?>
</i>
            </span>
            <?php if ((!empty($_smarty_tpl->tpl_vars['candidature']->value['inscrit_sacem'])) && ($_smarty_tpl->tpl_vars['candidature']->value['inscrit_sacem'] == "1")) {?>
                <?php echo '<script'; ?>
> depotDocSACEM(); <?php echo '</script'; ?>
>
            <?php } else { ?>
                <?php echo '<script'; ?>
> retraitDepotDocSACEM(); <?php echo '</script'; ?>
>
            <?php }?>
            <div id = "depot_doc_sacem">
                <label for="depot_doc_sacem">
                    <b>Déposer votre document SACEM au format PDF :</b>
                    <input type="file" name="depot_doc_sacem" id="depot_doc_sacem" accept=".pdf">
                </label>
            </div>
            <span>
                <i><?php echo (($tmp = @$_smarty_tpl->tpl_vars['erreurs']->value['depot_doc_sacem'])===null||$tmp==='' ? '' : $tmp);?>
</i>
            </span>
        </label>

        <br>
        <label for="producteur">
            <b>Le groupe est producteur :</b>
            Oui <input type="radio" name="producteur" id="producteur" value="1" <?php if ((!empty($_smarty_tpl->tpl_vars['candidature']->value['producteur'])) && ($_smarty_tpl->tpl_vars['candidature']->value['producteur'] == "1")) {?> checked <?php }?>> 
            Non <input type="radio" name="producteur" id="producteur" value="0" <?php if ((!empty($_smarty_tpl->tpl_vars['candidature']->value['producteur'])) && ($_smarty_tpl->tpl_vars['candidature']->value['producteur'] == "0")) {?> checked <?php }?>>
            <span>
                <i><?php echo (($tmp = @$_smarty_tpl->tpl_vars['erreurs']->value['producteur'])===null||$tmp==='' ? '' : $tmp);?>
</i>
            </span>
        </label>

        <br>
        <label for="depot_dossier_presse">
            <b>Déposez votre dossier de presse au format PDF :</b>
            <input type="file" name="depot_dossier_presse" id="depot_dossier_presse" accept=".pdf">
            <span>
                <i><?php echo (($tmp = @$_smarty_tpl->tpl_vars['erreurs']->value['depot_dossier_presse'])===null||$tmp==='' ? '' : $tmp);?>
</i>
            </span>
        </label>

        <br>
        <label for="depot_fiche_technique">
            <b>Déposez votre fiche technique au format PDF :</b>
            <input type="file" name="depot_fiche_technique" id="depot_fiche_technique" accept=".pdf">
            <span>
                <i><?php echo (($tmp = @$_smarty_tpl->tpl_vars['erreurs']->value['depot_fiche_technique'])===null||$tmp==='' ? '' : $tmp);?>
</i>
            </span>
        </label>

        <br>
        <label for="depot_fichier_audio">
            <b>Déposez successivement vos 3 fichiers audios au format MP3 :</b>
            <br>
            <label for="depot_fichier_audio1">
                <b>Audio n°1</b>
                <input type="file" name="depot_fichier_audio1" id="depot_fichier_audio1" accept=".mp3">
            </label>
            <br>
            <label for="depot_fichier_audio2">
                <b>Audio n°2</b>
                <input type="file" name="depot_fichier_audio2" id="depot_fichier_audio2" accept=".mp3">
            </label>
            <br>
            <label for="depot_fichier_audio3">
                <b>Audio n°3</b>
                <input type="file" name="depot_fichier_audio3" id="depot_fichier_audio3" accept=".mp3">
            </label>
            <span>
                <i><?php echo (($tmp = @$_smarty_tpl->tpl_vars['erreurs']->value['depot_fichier_audio'])===null||$tmp==='' ? '' : $tmp);?>
</i>
            </span>
        </label>

        <br>
        <label for="depot_photo">
            <b>Déposez successivement vos photos, une résolution > 300 dpi est demandée :</b>
            <br>
            <b>Photo n°1</b>
            <input type="file" name="depot_photo1" id="depot_photo1" accept="image/*" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['candidature']->value['depot_photo1'])===null||$tmp==='' ? '' : $tmp);?>
">
            <br>
            <b>Photo n°2</b>
            <input type="file" name="depot_photo2" id="depot_photo2" accept="image/*" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['candidature']->value['depot_photo2'])===null||$tmp==='' ? '' : $tmp);?>
">
            <span>
                <i><?php echo (($tmp = @$_smarty_tpl->tpl_vars['erreurs']->value['depot_photo'])===null||$tmp==='' ? '' : $tmp);?>
</i>
            </span>
        </label>

        <br>
        <label for="submit">
            <button name="submit" id="submit" type="submit" class="registerbtn"><b>Candidater</b></button>
        </label>
    </form>
<?php
}
}
/* {/block 'body'} */
}
