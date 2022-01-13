<?php
    require './includes/flight-master/flight/Flight.php';
    require './includes/smarty-3.1.35/libs/Smarty.class.php';
    
    require './routes/apply.php'; // Routes pour le formulaire de candidature
    require './routes/register.php'; // Routes pour le formulaire d'inscription
    require './routes/login.php'; // Routes pour le formulaire de connexion
    require './routes/liste.php'; // Routes pour la liste des candidatures
    require './routes/candidature.php'; // Routes pour pour une candidature précise 
    require './routes/main.php'; // Routes de bases -> ( / ) ( /logout ) ( /profil ) ...
    
    require './pdo.php'; // Instrutions d'accès à la base de données

    session_start();

    Flight::set('BDD', $db);

    Flight::register('view', 'Smarty', array(), function($smarty){
        $smarty->template_dir = './templates/';
        $smarty->compile_dir = './templates_c/';
        $smarty->config_dir = './config/';
        $smarty->cache_dir = './cache/';    
    });

    Flight::map('render', function($template, $data){
        Flight::view()->assign($data);
        Flight::view()->display($template);
    });

    if (isset($_SESSION['nom'])){
        Flight::view()->assign('_SESSION', $_SESSION);
    }

    Flight::start();
?>