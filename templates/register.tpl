<html>
{extends file='layout.tpl'}
{block name=title}Register{/block}
{block name=body}
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>
<div class="container">
<h1>Register</h1>
<div id='main'>
    

    <form action="register" method="post">
        <label for="register">Nom</label>
        <input type="text" {if empty($message.nom)}class="form-control"{else} class="form-control is-invalid" {/if} value='{$valeurs.nom|escape|default:""}' id="nom" name="nom" aria-describedby="emailHelp" placeholder="Nom">
        <div>{$message.nom|escape|default:""}</div>
        <br>
        <br>
        <label for="register">Prénom</label>
        <input type="text" {if empty($message.prenom)}class="form-control"{else} class="form-control is-invalid" {/if} value='{$valeurs.prenom|escape|default:""}' id="prenom" name="prenom" aria-describedby="emailHelp" placeholder="prenom">
        <div>{$message.prenom|escape|default:""}</div>
        <br>
        <br>
        <label for="register">Adresse mail</label>
        <input type="email" {if empty($message.email_vide) && empty($message.email_existant) && empty($message.email_incorrect)}class="form-control"{else} class="form-control is-invalid" {/if} value='{$valeurs.email|escape|default:""}' id="email" name="email" aria-describedby="passwordHelp" placeholder="Adresse mail">
        <div>{$message.email_vide|escape|default:""}</div><div>{$message.email_existant|escape|default:""}</div><div>{$message.email_incorrect|escape|default:""}</div>
        <br>
        <br>
        <label for="register">Mot de passe</label>
        <input type="password" {if empty($message.mdp_vide) && empty($message.mdp_longueur)} class="form-control"{else} class="form-control is-invalid" {/if} value='{$valeurs.mdp|escape|default:""}' id="mdp" name="mdp" placeholder="Mot de passe">
        <div>{$message.mdp_vide|escape|default:""}</div><div>{$message.mdp_longueur|escape|default:""}</div>
        <br>
        <br>
        <div class="row">
            <div class="col-4">
                <select class="form-select"  id="role" name="role" aria-label="Default select example">
                    <option value="candidat" {if isset($valeurs.role) && ($valeurs.role === "candidat")} selected{/if}>Candidat</option>
                    <option value="responsable" {if isset($valeurs.role) && ($valeurs.role === "responsable")} selected{/if}>Responsable</option>
                </select>
            </div>
            <div class="col-8">
                {if isset($role)}
                    {if ($role === "responsable")}
                        <input type="password" {if empty($message.mdp_res) && empty($message.erreur_mdp_res)} class="form-control"{else} class="form-control is-invalid" {/if} value='{$valeurs.mdp_res|escape|default:""}' id="mdp_res" name="mdp_res" placeholder="Mot de passe responsable">
                        <div>{$message.mdp_res|escape|default:""}</div><div>{$message.erreur_mdp_res|escape|default:""}</div>
                   {/if}
                {/if}
            </div>
        </div>
        <br>
        <br>
        <label for="register">Adresse</label>
        <input type="text" {if empty($message.adresse)} class="form-control"{else} class="form-control is-invalid" {/if} value='{$valeurs.adresse|escape|default:""}' id="adresse" name="adresse" aria-describedby="emailHelp" placeholder="Adresse">
        <div>{$message.adresse|escape|default:""}</div>
        <br>
        <br>
        <label for="register">Code Postal</label>
        <input type="number" {if empty($message.code_postal) && empty($message.erreur_code_postal)} class="form-control"{else} class="form-control is-invalid" {/if} value='{$valeurs.code_postal|escape|default:""}' id="code_postal" name="code_postal" aria-describedby="emailHelp" placeholder="Code Postal">
        <div>{$message.code_postal|escape|default:""}</div><div>{$message.erreur_code_postal|escape|default:""}</div>
        <br>
        <br>
        <div class="row">
            <div class="col-2">
                <label for="register">N° téléphone</label>
            </div>
            <div class="col-4">
                <input type="number" {if empty($message.telephone) && empty($message.erreur_telephone)} class="form-control" {else} class="form-control is-invalid" {/if} value='{$valeurs.telephone|escape|default:""}' id="telephone" name="telephone" placeholder="n° telephone">
            </div>
        </div>
        <div>{$message.telephone|escape|default:""}</div><div>{$message.erreur_telephone|escape|default:""}</div>
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
{/block}