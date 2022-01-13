<?php
    Flight::route('GET /', function() {
        Flight::render("index.tpl", array());
    });

    Flight::route('GET /logout', function(){
        session_unset();
        session_destroy();
        Flight::redirect('/');
    });

    Flight::route('GET /profil', function(){
        if(empty($_SESSION)){ // si utilisateur non connecté
            Flight::render("login.tpl", array());
        }
        else{
            $BDD = Flight::get('BDD');
            $email = $_SESSION['email'];
            //Récupérarion de l'id de groupe de la personne connecté (dans le cas où elle est responsable de groupe)
            $requeteIdCandidat = $BDD->prepare("SELECT id FROM candidature WHERE email = ?");
            $requeteIdCandidat->execute(array($email));
            $IdDeConnexion = $requeteIdCandidat->fetchColumn();

            Flight::view()->assign('IdMembre', $IdDeConnexion);
            Flight::render("profil.tpl",array());
        }

    });

    Flight::route('/success', function(){
        Flight::render("success.tpl", array());
    });
?>