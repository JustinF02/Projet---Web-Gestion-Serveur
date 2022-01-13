{extends file='layout.tpl'}
{block name=title}Profil{/block}
{block name=body}
{assign var="id" value=$IdMembre|default:[]}
<div id='main'>
<h1>Mon profil</h1>
<br>
{if (isset($smarty.session.prenom) && isset($smarty.session.nom))}
    <h3>Bonjour {$smarty.session.prenom} {$smarty.session.nom}</h3>
{/if}
<br>
{if (isset($smarty.session.role))}
    <div>Role : {$smarty.session.role}</div>
{/if}
<br>
{if (isset($smarty.session.adresse))}
    <div>Adresse : {$smarty.session.adresse}</div>
{/if}
<br>
{if (isset($smarty.session.code_postal))}
    <div>Code Postal : {$smarty.session.code_postal}</div>
{/if}
<br>
{if (isset($smarty.session.telephone))}
    <div>Telephone : {$smarty.session.telephone}</div>
{/if}
{if (isset($smarty.session.nom))}
    <div><a href="./candidature-{$id}">Ma candidature</a></div>
{/if} 

{/block}