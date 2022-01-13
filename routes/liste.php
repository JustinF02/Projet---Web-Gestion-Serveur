<?php
    Flight::route('GET /liste', function(){
        $BDD = Flight::get('BDD');
        if(!empty($_SESSION)){
            // Récupération du type utilisateur à l'aide de l'email de connexion
            $email = $_SESSION['email'];
            $requeteTypeSession = $BDD->prepare("SELECT `type` FROM utilisateur WHERE email = ?");
            $requeteTypeSession->execute(array($email));
            $typeConnexion = $requeteTypeSession->fetchColumn();
            
            // Test si l'utilisateur connecté est bien membre du staff
            if(($typeConnexion == "responsable") || ($typeConnexion == "administrateur")){
                //Requête pour récupérer les données à afficher dans la liste
                $requeteNomCandidatures = $BDD->prepare("SELECT 
                id, nom, departement, style, annee, presentation, experience FROM candidature");
                $requeteNomCandidatures->execute();

                $ListeCandidature = $requeteNomCandidatures->fetchAll(PDO::FETCH_ASSOC);

                //Assignation du retour de la requête contenu dans ListeCandidature.
                Flight::view()->assign('ListeCandidature', $ListeCandidature);
                Flight::render('liste.tpl', array());
            }
            else{
                //Renvoie vers l'index -> la personne connectée n'est pas du staff
                Flight::render("index.tpl", array());
            }
        }
        else{
            //Renvoie vers la page de connexion lorsque la session est vide
            Flight::render("login.tpl", array());
        }
    });
?>