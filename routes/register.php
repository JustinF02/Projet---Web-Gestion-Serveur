<?php
    Flight::route('GET /register', function(){
        Flight::render("register.tpl",array());
    });

    Flight::route('POST /register', function(){
        $message = array(); //tableau message d'erreur
        $data = Flight::request()->data;
        $nom = $data -> nom;
        $prenom = $data -> prenom;
        $email = $data -> email;
        $mdp = $data -> mdp;
        $role = $data -> role;
        $mdp_res = $data -> mdp_res;
        $adresse = $data -> adresse;
        $code_postal = $data -> code_postal;
        $telephone = $data -> telephone;
        // récupération des données du tableau $_POST dans des variables

        if (empty($nom)){
            $message['nom'] = "Veuillez remplir le champs nom";
        } // vérification que le nom est rempli

        if (empty($prenom)){
            $message['prenom'] = "Veuillez remplir le champs prenom";
        } // vérification que le nom est rempli
    
        if(empty($email)){
            $message['email_vide'] = "Veuillez remplir le champ email";
        } // vérification que l'email est bien rempli
        else{
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){ //vérification de la validité de l'email
                $BDD = Flight::get('BDD'); //récupérationde la variable db enregistrer dans l'index.php
                $stmt = $BDD->prepare("select * from utilisateur where email = ?"); //vérification de l'adresse mail dans la base de donnée 
                $stmt -> execute(array($email));
                $user = $stmt->fetch();
                if ($user) {
                    $message['email_existant'] = "Cet email existe déjà"; //message d'erreur
                }
            }
            else{
                $message['email_incorrect'] = "L'email n'est pas correct";     
            }
        }
    
        // vérification que le champ mot de passe soit bien rempli ($POST_mdp)
        if(empty($mdp)){
            $message['mdp_vide'] = "Veuillez remplir le champ mot de passe";
        }else{
            $majuscule = preg_match('@[A-Z]@', $mdp);
	        $minuscule = preg_match('@[a-z]@', $mdp);
	        $chiffre = preg_match('@[0-9]@', $mdp);
            
	        if(!$majuscule || !$minuscule || !$chiffre || strlen($mdp) < 8){ //vérification que le mot de passe soit plus long que 8 charactères
                $message['mdp_longueur'] = "Le mot de passe doit être de 8 caractères au minumum contenir au moins un chiffre, une majuscule et une minuscule";
            }
            else{
                $hashed_password = password_hash($mdp, PASSWORD_DEFAULT); //hachage du mot de passe pour le sécuriser
            }
        }
    
        if(empty($role)){
            $message['role'] = "Veuillez choisir un rôle";
        }   

        if(empty($mdp_res) && $role === "responsable"){
            $message['mdp_res'] = "Veuillez saisir le champ mot de passe responsable";
        }
        else{
            if($role === "responsable" && $mdp_res != 1234567890){
                $message['erreur_mdp_res'] = "Le mot de passe est incorrect";
            }
        }

        // vérification que le champ ville soit bien rempli
        if(empty($adresse)){
            $message['adresse'] = "Veuillez remplir le champ adresse";
        }

    
        // vérification que le champ pays soit bien rempli
        if(empty($code_postal)){
            $message['code_postal'] = "Veuillez remplir le champ code postal";
        }
        else {
            if(strlen($code_postal) != 5 && strlen($code_postal) != 6){
                $message['erreur_code_postal'] = "Le code postal est incorrect";
            }
        }

        if(empty($telephone)){
            $message['telephone'] = "Veuillez remplir le champ n° téléphone";
        }
        else {
            if(strlen($telephone) != 10){
                $message['erreur_telephone'] = "Le numéro de téléphone est incorrect";
            }
        }
    
        // si le tableau d'erreur message est vide (donc pas d'erreur)
        if(empty($message)){
            $BDD = Flight::get('BDD');
            $stmt = $BDD->prepare("INSERT INTO utilisateur VALUES (:email,:type,:nom,:prenom,:adresse,:code_postal,:telephone,:motdepasse)"); 
            $stmt->execute(array(':email'=>$email,':type'=>$role,':nom'=>$nom,':prenom'=>$prenom,':adresse'=>$adresse,'code_postal'=>$code_postal,':telephone'=>$telephone,':motdepasse'=>$hashed_password));
            Flight::render("success.tpl", array());
            //insertion de tout les champs dans la bdd
        }
        else{
            Flight::render("register.tpl",array('message'=>$message, 'valeurs'=>$_POST, 'role'=>$role));
            // affichage de la page d'inscription avec affichage des erreurs
            // les champs correct seront gardé pour ne pas être recopié ('valeurs'=>$_POST)
        }
        
    });
?>