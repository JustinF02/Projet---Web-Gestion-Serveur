{extends file='layout.tpl'}
{block name=title}Candidature détaillée{/block}
{block name=body}

{* Assignation des résultats de requêtes dans des variables, par défaut vide *}
{assign var="Candidature" value=$InfosCandidatureGroupe|default:[]}
{assign var="BoolCandidature" value=$BoolCandidatureGroupe|default:[]}
{assign var="FichiersCandidature" value=$FichiersCandidatureGroupe|default:[]}
{assign var="Membres" value=$MembresGroupe|default:[]}
<html>
<link rel="stylesheet" href="../css/styleListe.css">
<div id='main'>
<hr>
<h1> Candidature du groupe {$Candidature[0].nom}</h1>

{* Affichage de la photo1 du groupe, de taille 300 DPI maximum -> styleListe.css *}
<div class="ImageGroupe">
    <img src="./candidatures/groupe_{$Candidature[0].id}_{$Candidature[0].nom}/{$FichiersCandidature[0].photo1}"/>
</div>

<br>
<h3><p>Informations :</p></h3>
<table class="tableauDetails" id="table_even" style="width: 100%">
    {* Affichage du contenu des informations sur le groupe *}
    {foreach from=$Candidature key=$key item=$value}
        {foreach from=$value key=$entete item=$infoProfil}
            <tr>
                <th class ="entete">
                    <p><b>{$entete} :</b></p>
                </th>
                <th class="info">
                    {$infoProfil}
                </th>
            </tr>
        {/foreach}
    {/foreach}
    {* Affichage sous condition des champs booléens *}
    {foreach from=$BoolCandidature key=$keyBool item=$valueBool}
        {foreach from=$valueBool key=$enteteBool item=$infoProfilBool}
            <tr>
                <th class ="entete">
                    <p><b>{$enteteBool} :</b></p>
                </th>
                <th class="info">
                    {$infoProfilBool}
                </th>
            </tr>
        {/foreach}
    {/foreach}
</table>
<h3><p>Fichiers :</p></h3>
<table class="tableauDetails" id="table_even" style="width: 100%">
    {* Affichage des fichiers téléchargeables *}
    {foreach from=$FichiersCandidature key=$keyFichier item=$valueFichier}
        {foreach from=$valueFichier key=$enteteFichier item=$infoProfilFichier}
            <tr>
                <th class ="entete">
                    <p><b>{$enteteFichier} :</b></p>
                </th>
                <th class="info">
                    {* l'attribut : download="Candidature : {$infoProfilFichier}" permet de mettre un lien de téléchargement *}
                    <a href="./candidatures/groupe_{$Candidature[0].id}_{$Candidature[0].nom}/{$infoProfilFichier}" target="_blank"> {$enteteFichier} </a>
                </th>
            </tr>
        {/foreach}
    {/foreach}
</table>
<h3><p>Membres :</p></h3>
<table class="tableauDetails" id="table_even" style="width: 100%">
    <tr>
        <th>Numéro</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Instrument</th>
    </tr>
    {foreach from=$Membres item=$infoMembre}
        {$id = $infoMembre['id_membre']}
        <tr>
            <td class = "col">
                {$infoMembre['id_membre']}
            </td>
            <td class = "col">
                {$infoMembre['nom']}
            </td>
            <td class = "col">
                {$infoMembre['prenom']}
            </td>
            <td class = "col">
                {$infoMembre['instrument']}
            </td>
        </tr>
    {/foreach}
</table>
</div>
</html>
{/block}