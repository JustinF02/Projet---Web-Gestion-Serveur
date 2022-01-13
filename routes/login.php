<?php
    //route menant à la page login qui permet de se connecter
    // méthode GET
    Flight::route('GET /login', function(){
        Flight::render("login.tpl",array());
    });
    
    //route menant à la page login qui permet de se connecter
    // méthode POST
    Flight::route('POST /login', function(){
        $message = array(); //tableau de message d'erreur
        $data = Flight::request()->data;
        $email = $data -> email;
        $mdp = $data -> mdp;
        //stockage du tableau $_POST dans des variables
    
        //vérification que le champ email est rempli
        if(empty($email)){
            $message['email'] = "Veuillez remplir le champ email";
        }
    
        //vérification que le champ mot de passe est rempli
        if(empty($mdp)){
            $message['mdp'] = "Veuillez remplir le champ mot de passe";
        }
    
        // si les champs email et mot de passe sont rempli
        if(!empty($email) && !empty($mdp)){
            $BDD = Flight::get('BDD');
            $stmt = $BDD->prepare("select * from utilisateur where email = ?");
            $stmt->execute(array($email)); //récupération des données de l'utilisateur (s'il existe)
            $user = $stmt->fetch(); // données misent dans un tableau avec fetch
            if ($user) { //
                $hashed_pass = $BDD->prepare("select motdepasse from utilisateur where email = ?");
                $hashed_pass->execute(array($email));
                $hashed_mdp = $hashed_pass-> fetch(); //récupération du mot haché
                
                if(!password_verify($mdp, $hashed_mdp[0])){ //vérification que le mdp est égal au de passe haché
                    $message['mdp_connexion'] = "Le mot de passe est incorrect";
                }
            }else{
                $message['email_connexion'] = "L'email est incorrect";
            }  
        }
        
        if(empty($message)){ // si pas d'erreur
            $info = $BDD->prepare("select * from utilisateur where email = ?");
            $info->execute(array($email));
            $infoUtilisateur = $info->fetchAll();
            $_SESSION = array();
            // récupération des données  de l'utilisateur dans la bdd
                foreach($infoUtilisateur as $ligne){
                    $_SESSION['email'] = $ligne[0];
                    $_SESSION['role'] = $ligne[1];
                    $_SESSION['nom'] = $ligne[2];
                    $_SESSION['prenom'] = $ligne[3];
                    $_SESSION['adresse'] = $ligne[4];
                    $_SESSION['code_postal'] = $ligne[5];
                    $_SESSION['telephone'] = $ligne[6];
                }
                
                if (!empty($_SESSION['nom'])) Flight::redirect('/');
        }else{
            
            Flight::render("login.tpl",array('message'=>$message, 'valeurs'=>$_POST));
            //affichage du login avec les ventuelles erreurs
        }
    });
?>