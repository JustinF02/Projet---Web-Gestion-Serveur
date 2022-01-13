{extends file='layout.tpl'}
{block name=title}Login{/block}
{block name=body}
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="interface.css">
</head>
<div id='main'>
<h1>Login</h1>
<p>
<div class="container">
    <form action="login" method="post">
        <div>{$message.email_connexion|escape|default:""}</div><div>{$message.mdp_connexion|escape|default:""}</div>
        <br>
        <label for="exampleInputEmail1" class="form-label">Adresse mail</label>
        <input type="email" class="form-control" value='{$valeurs.email|escape|default:""}' id="email" name="email" aria-describedby="emailHelp" placeholder="Adresse mail">
        <div>{$message.email|escape|default:""}</div>
        <br>
        <br>
        <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" value='{$valeurs.mdp|escape|default:""}' id="mdp" name="mdp" placeholder="Mot de passe">
        <div>{$message.mdp|escape|default:""}</div>
        <br>
        <br>
        <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>
</div>
</p>
</div>
{/block}