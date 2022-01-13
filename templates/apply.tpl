{extends file='layout.tpl'}
{block name=title}Candidater{/block}
{block name=body}

{assign var="candidature" value=$candidature|default:[]}
{assign var="erreurs" value=$erreur|default:[]}
{assign var="compteur" value=$compteur|default:0}

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../css/apply.css">

    <h1><b>Candidature</b></h1>
    <hr>

    <form action="apply" method="post" enctype="multipart/form-data"> 
        <br>
        <label for="nom_groupe">
            <b>Nom du groupe :</b>
            <input type="text" placeholder="Renseignez le nom du groupe" name="nom_groupe" id="nom_groupe" value="{$candidature.nom_groupe|default:""}" size="25">
            <span>
                <i>{$erreurs.nom_groupe|default:""}</i>
            </span>
        </label>
    
        <br>
        <label for="representant_groupe">
            <b>Représentant du groupe :</b>
            {if isset($_SESSION.nom)}
                {foreach from=$_SESSION key=$key item=$value}
                    <p><b>{$key} :</b> {$value}</p>
                {/foreach}
            {else}
                se <a href="./login">connecter</a> ou <a href="./register">créer un compte</a>
            {/if}
            <span>
                <i>{$erreurs.representant_groupe|default:""}</i>
            </span>
        </label>

        <br>
        <label for="membre_groupe">
            <b>Renseignez le ou les membres du groupe sans compter le représentant, 8 membres comptant le représentant maximum</b>
            <input type="number" min="0" max="7" name="nb_membre_groupe" id="nb_membre_groupe" value="{$candidature.nb_membre_groupe|default:0}">
            <button name="ok" id="submit" type="submit" class="registerbtn"><b>ok</b></button>
            {if (!empty($candidature.nb_membre_groupe)) && ($candidature.nb_membre_groupe > 0)}
                {for $indice = 1 to {$candidature.nb_membre_groupe}}
                    <br>
                    <b>Membre n°{$indice}</b>
                    <label for="membre_groupe" style="display: block">
                        <input type="text" placeholder="Nom" name="{"nom_membre[{$indice}]"}" id="{"nom_membre{$indice}"}" value="{$candidature.nom_membre[$indice]|default:""}" style="display: inline">
                            <span>
                                <i>{$erreurs.nom_membre[$indice]|default:""}</i>
                            </span>
                        <input type="text" placeholder="Prenom" name="{"prenom_membre[{$indice}]"}" id="{"prenom_membre{$indice}"}" value="{$candidature.prenom_membre[$indice]|default:""}" style="display: inline">
                            <span>
                                <i>{$erreurs.prenom_membre[$indice]|default:""}</i>
                            </span>
                        <input type="text" placeholder="Instrument" name="{"instrument_membre[{$indice}]"}" id="{"instrument_membre{$indice}"}" value="{$candidature.instrument_membre[$indice]|default:""}" style="display: inline">
                            <span>
                                <i>{$erreurs.instrument_membre[$indice]|default:""}</i>
                            </span>
                    </label>
                {/for}
            {/if}
        </label>

        <br>
        <label for="date_creation_groupe">
            <b>Année de création du groupe :</b>
            <input type="number" min="1900" max="{$utils['annee']}" name="date_creation_groupe" id="date_creation_groupe" value="{$candidature.date_creation_groupe|default:$utils['annee']}">
            <span>
                <i>{$erreurs.date_creation_groupe|default:""}</i>
            </span>
        </label>

        <br>
        <label for="type_scene">
            <b>Type de scene :</b>
            <select name="type_scene" id="type_scene">
                <option value="" selected disabled hidden>Sélectionnez votre type de scene</option>
                {foreach from=$utils['type_scene'] key=$numero item=$type}
                    {foreach from=$type item=$genre key=$key}
                        <option value="{$numero}" {if (!empty($candidature.type_scene)) && ($candidature.type_scene == "{$numero}")} selected {/if}>{$genre}</option>
                    {/foreach}
                {/foreach}
            </select>
            <span>
                <i>{$erreurs.type_scene|default:""}</i>
            </span>
        </label>
        
        <br>
        <label for="departement">
            <b>Département :</b>
            <select name="departement" id="departement">
                <option value="" selected disabled hidden>Sélectionnez un département</option>
                <option value="999" {if (!empty($candidature.departement)) && ($candidature.departement == "999")} selected {/if}>Autre</option>
                {foreach from=$utils['departement'] key=$numero item=$departement}
                    {foreach from=$departement['departement_nom'] item=$nom}
                        {foreach from=$departement['departement_code'] item=$code}
                            <option value="{$numero}" {if (!empty($candidature.departement)) && ($candidature.departement == "{$numero}")} selected {/if}>{$code} - {$nom}</option>
                        {/foreach}
                    {/foreach}
                {/foreach}
            </select>
            <span>
                <i>{$erreurs.departement|default:""}</i>
            </span>
        </label>

        <br>
        <label for="presentation">
            <b>Présentation du groupe :</b>
            <br>
            <textarea name="presentation" id="presentation" cols="100" rows="6" maxlength="500" placeholder="Présentez brievement votre groupe" value="{$candidature.presentation|default:""}">{$candidature.presentation|default:""}</textarea>
            <span>
                <i>{$erreurs.presentation|default:""}</i>
            </span>
        </label>

        <br>
        <label for="experience">
            <b>Expérience scenique du groupe :</b>
            <br>
            <textarea name="experience" id="experience" cols="100" rows="6" maxlength="500" placeholder="Présentez brievement votre groupe" value="{$candidature.experience|default:""}">{$candidature.experience|default:""}</textarea>
        </label>
        <span>
            <i>{$erreurs.experience|default:""}</i>
        </span>

        <br>
        <label for="style_musicaux">
            <b>Style musical du groupe :</b>
            <select name="style_musicaux" id="style_musicaux">
                <option value="" selected disabled hidden>Sélectionnez votre style musicale</option>
                {foreach from=$utils['style_musicaux'] key=$numero item=$style_musical}
                    {foreach from=$style_musical['nom_style'] item=$nom}
                        <option value="{$numero + 1}" {if (!empty($candidature.style_musicaux)) && ($candidature.style_musicaux == "{$numero + 1}")} selected {/if}>{$numero + 1} - {$nom}</option>
                    {/foreach}
                {/foreach}
            </select>
        </label>
        <span>
            <i>{$erreurs.style_musicaux|default:""}</i>
        </span>

        <br>
        <label for="site_web">
            <b>Site web du groupe :</b>
            <input type="text" placeholder="Renseignez l'url du site web" name="site_web" id="site_web" value="{$candidature.site_web|default:""}" size="80">
            <span>
                <i>{$erreurs.site_web|default:""}</i>
            </span>
        </label>

        <br>
        <label for="soundcloud">
            <b>Soundcloud du groupe :</b>
            <input type="text" placeholder="Renseignez l'url du soundcloud" name="soundcloud" id="soundcloud" value="{$candidature.soundcloud|default:""}" size="80">
            <span>
                <i>{$erreurs.soundcloud|default:""}</i>
            </span>
        </label>

        <br>
        <label for="youtube">
            <b>Chaine Youtube du groupe :</b>
            <input type="text" placeholder="Renseignez l'url de la chaine youtube" name="youtube" id="youtube" value="{$candidature.youtube|default:""}" size="80">
            <span>
                <i>{$erreurs.youtube|default:""}</i>
            </span>
        </label>

        <br>
        <label for="statut_assoc">
            <b>Statut associatif :</b>
            Oui <input type="radio" name="statut_assoc" id="statut_assoc" value="{"1"|default:""}" {if (!empty($candidature.statut_assoc)) && ($candidature.statut_assoc == "1")} checked {/if}>
            Non <input type="radio" name="statut_assoc" id="statut_assoc" value="{"0"|default:""}" {if (!empty($candidature.statut_assoc)) && ($candidature.statut_assoc == "0")} checked {/if}>
            <span>
                <i>{$erreurs.statut_assoc|default:""}</i>
            </span>
        </label>

        <script>
            function depotDocSACEM() {
                document.getElementById('depot_doc_sacem').style.display = 'block';
            }

            function retraitDepotDocSACEM() {
                document.getElementById('depot_doc_sacem').style.display = 'none';
            }
        </script>

        <br>
        <label for="inscrit_sacem">
            <b>Le groupe possède un document SACEM :</b>
            Oui <input type="radio" name="inscrit_sacem" id="inscrit_sacem" value="1" onchange="depotDocSACEM()" {if (!empty($candidature.inscrit_sacem)) && ($candidature.inscrit_sacem == "1")} checked {/if}> 
            Non <input type="radio" name="inscrit_sacem" id="inscrit_sacem" value="0" onchange="retraitDepotDocSACEM()" {if (!empty($candidature.inscrit_sacem)) && ($candidature.inscrit_sacem == "0")} checked {/if}>
            <span>
                <i>{$erreurs.inscrit_sacem|default:""}</i>
            </span>
            {if (!empty($candidature.inscrit_sacem)) && ($candidature.inscrit_sacem == "1")}
                <script> depotDocSACEM(); </script>
            {else}
                <script> retraitDepotDocSACEM(); </script>
            {/if}
            <div id = "depot_doc_sacem">
                <label for="depot_doc_sacem">
                    <b>Déposer votre document SACEM au format PDF :</b>
                    <input type="file" name="depot_doc_sacem" id="depot_doc_sacem" accept=".pdf">
                </label>
            </div>
            <span>
                <i>{$erreurs.depot_doc_sacem|default:""}</i>
            </span>
        </label>

        <br>
        <label for="producteur">
            <b>Le groupe est producteur :</b>
            Oui <input type="radio" name="producteur" id="producteur" value="1" {if (!empty($candidature.producteur)) && ($candidature.producteur == "1")} checked {/if}> 
            Non <input type="radio" name="producteur" id="producteur" value="0" {if (!empty($candidature.producteur)) && ($candidature.producteur == "0")} checked {/if}>
            <span>
                <i>{$erreurs.producteur|default:""}</i>
            </span>
        </label>

        <br>
        <label for="depot_dossier_presse">
            <b>Déposez votre dossier de presse au format PDF :</b>
            <input type="file" name="depot_dossier_presse" id="depot_dossier_presse" accept=".pdf">
            <span>
                <i>{$erreurs.depot_dossier_presse|default:""}</i>
            </span>
        </label>

        <br>
        <label for="depot_fiche_technique">
            <b>Déposez votre fiche technique au format PDF :</b>
            <input type="file" name="depot_fiche_technique" id="depot_fiche_technique" accept=".pdf">
            <span>
                <i>{$erreurs.depot_fiche_technique|default:""}</i>
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
                <i>{$erreurs.depot_fichier_audio|default:""}</i>
            </span>
        </label>

        <br>
        <label for="depot_photo">
            <b>Déposez successivement vos photos, une résolution > 300 dpi est demandée :</b>
            <br>
            <b>Photo n°1</b>
            <input type="file" name="depot_photo1" id="depot_photo1" accept="image/*" value="{$candidature.depot_photo1|default:""}">
            <br>
            <b>Photo n°2</b>
            <input type="file" name="depot_photo2" id="depot_photo2" accept="image/*" value="{$candidature.depot_photo2|default:""}">
            <span>
                <i>{$erreurs.depot_photo|default:""}</i>
            </span>
        </label>

        <br>
        <label for="submit">
            <button name="submit" id="submit" type="submit" class="registerbtn"><b>Candidater</b></button>
        </label>
    </form>
{/block}