{extends file='layout.tpl'}
{block name=title}Liste candidature{/block}
{block name=body}

    <table class="tableauListe" id="table_even" style="width: 100%">
        <thead>
            <link rel="stylesheet" href="../css/styleListe.css">
            <tr>
                <th span="2">
                    Candidatures
                </th>
            </tr>
            {* Première ligne du tableau, avec l'entête du champ en haut de colonne *}
            <tr>
                <th>Numéro</th>
                <th>Détails</th>
                <th>Nom</th>
                <th>Département</th>
                <th>Style</th>
                <th>Année</th>
                <th>Présentation</th>
            </tr>
        </thead>
        <tbody>
        {* Affichage des contenus des champs de chaque candidature dans les colonnes *}
            {foreach from=$ListeCandidature item=$candidature}
                        {$id = $candidature['id']}
                        <tr>
                            <td class = "col">
                                {$candidature['id']}
                            </td>
                            <td class = "col">
                                <a href="./candidature-{$id}">détails</a>
                            </td>
                            <td class = "col">
                                {$candidature['nom']}
                            </td>
                            <td class = "col">
                                {$candidature['departement']}
                            </td>
                            <td class = "col">
                                {$candidature['style']}
                            </td>
                            <td class = "col">
                                {$candidature['annee']}
                            </td>
                            <td class = "col">
                                {$candidature['presentation']}
                            </td>
                        </tr>
            {/foreach}
        </tbody>
    </table>
{/block}