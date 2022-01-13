<?php
    /*
        Route donnant des données de bases nécessaire au formulaire
            -> affiche le formulaire de départ
    */
    Flight::route('GET /apply', function() {
        $BDD = Flight::get('BDD');

        $departement = $BDD->prepare("SELECT departement_code, departement_nom FROM departement");
        $departement->execute();
        $listDepartements = $departement->fetchAll(PDO::FETCH_ASSOC);
    
        $Tablo = array();
        $Tablo['departement'] = $listDepartements;
        $Tablo['annee'] = date("Y");
    
        $requete_type_scene = $BDD->prepare("SELECT genre FROM scene");
        $requete_type_scene->execute();
        $type_scene = $requete_type_scene->fetchAll(PDO::FETCH_ASSOC);
    
        $Tablo['type_scene'] = $type_scene;
    
        $requete_style_musical = $BDD->prepare("SELECT nom_style FROM style_musicaux");
        $requete_style_musical->execute();
        $style_musicaux = $requete_style_musical->fetchAll(PDO::FETCH_ASSOC);
    
        $Tablo['style_musicaux'] = $style_musicaux;
    
        Flight::view()->assign('utils', $Tablo);
        Flight::render("apply.tpl", array());
    });
    
    /*
        Route récupérant les données de candidature avant de les inscrire dans la base
            - récupération
            - vérification
            - inscription dans la BDD
            - enregistrement en local des fichiers déposés
    */
    Flight::route('POST /apply', function() {
        // On récupère les données saisies du formulaire après validation
        $BDD = Flight::get('BDD');
        $candidature = Flight::request()->data;

        $erreurs = array(); // tableau contenant les erreurs

        // On récupère le dernier id de groupe que l'on incrémente pour l'attribuer au nouveau
        $requeteID = $BDD->prepare("SELECT COUNT(DISTINCT id) FROM candidature"); 
        $requeteID->execute();
        $id = $requeteID->fetch()[0] + 1;

        $pathCandidatureGroupe = "candidatures/groupe_" . $id . "_" . $candidature["nom_groupe"] . "/"; // chemin du dossier du  groupe

        $candidatureAInsert = array();

        // Nom du groupe
        $requeteVerifNom = $BDD->prepare("SELECT * FROM candidature WHERE nom = ?");
        $requeteVerifNom->execute([$candidature["nom_groupe"]]);
        $dejaPresent = $requeteVerifNom->fetchColumn(); // On vérifie si le nom de groupe est présent dans la base

        if (!$dejaPresent) { // On effectue ensuite les verifications
            if (empty($candidature["nom_groupe"])) $erreurs["nom_groupe"] = "Veuillez renseigner le nom du groupe";
        } else $erreurs["nom_groupe"] = "Nom de groupe existe déjà";

        // Représantant
        if (!isset($_SESSION["nom"])) $erreurs["representant_groupe"] = "Veuillez vous connecter pour candidater"; 
        else $candidatureAInsert["representant_groupe"] = $_SESSION['email'];
        
        // Membre du groupe
        for ($i = 0; $i < 8; $i++) { // pour chaque membre éventuel on vérifie la véracité des conditions
            if (isset($candidature["nom_membre"][$i])) {
                if (empty($candidature["nom_membre"][$i])) $erreurs["nom_membre"][$i]= "Nom obligatoire";
                if (empty($candidature["prenom_membre"][$i])) $erreurs["prenom_membre"][$i] = "Prénom obligatoire";;
                if (empty($candidature["instrument_membre"][$i])) $erreurs["instrument_membre"][$i] = "Instrument obligatoire";
            }
        }

        // Année de création du groupe
        if ($candidature["date_creation_groupe"] > date("Y")) $erreurs["date_creation_groupe"] = "Saississez une année valide"; // date("Y") récupère l'année actuelle
    
        // Type de scene
        if (empty($candidature["type_scene"])) $erreurs["type_scene"] = "Veuillez sélectionner un type de scene parmis la liste";
        else {
            $stmtType = $BDD->prepare("SELECT genre FROM scene WHERE numero=?");
            $stmtType->execute([is_int($candidature["type_scene"]) + 1]);
            $candidatureAInsert["type_scene"] = $stmtType->fetchColumn(); // On cherche dans la base le type de scene sélectionné
        }

        // Département
        if (empty($candidature["departement"])) $erreurs["departement"] = "Veuillez sélectionner un département parmis la liste";
        else {
            if ($candidature["departement"] == "999") $candidatureAInsert["departement"] = "Autre";
            else {
                $stmtDep = $BDD->prepare("SELECT departement_nom FROM departement WHERE departement_id=?");
                $stmtDep->execute([($candidature["departement"] + 1)]);
                $candidatureAInsert["departement"] = $stmtDep->fetchColumn(); // On cherche dans la base le département sélectionné
            }
        }

        // Présentation du groupe
        if (empty($candidature["presentation"])) $erreurs["presentation"] = "Présentez votre groupe";
        else
            if(strlen($candidature["presentation"]) > 500) $erreurs["presentation"] = "Saissisez au maximum 500 caratères"; // On vérifie si la présentation fait moins de 500 lignes

        // Expèrience scénique
        if (empty($candidature["experience"])) $erreurs["experience"] = "Renseignez votre expérience scénique";
        else
            if(strlen($candidature["experience"]) > 500) $erreurs["experience"] = "Saissisez au maximum 500 caratères"; // De même ici

        // Style Musicale
        if (empty($candidature["style_musicaux"])) $erreurs["style_musicaux"] = "Veuillez sélectionner un style musical parmis la liste";
        else {
            $stmtStyle = $BDD->prepare("SELECT nom_style FROM style_musicaux WHERE numero=?");
            $stmtStyle->execute([is_int($candidature["style_musicaux"]) + 1]);
            $candidatureAInsert["style_musicaux"] = $stmtStyle->fetchColumn(); // On cherche le style musicale sélectionné dans la base
        }

        // Site webs
        if(empty(trim($candidature["site_web"]))) $erreurs["site_web"] = "Veuillez renseigner l'url de votre site web ou page Facebook"; // On vérifie si l'url a bien été inscrit (obligatoire)
        else
            if (!filter_var($candidature["site_web"], FILTER_VALIDATE_URL) === true) $erreurs["site_web"] = "URL invalide"; // On vérifie la validité de l'url

        // Souncloud
        if (!empty($candidature["soundcloud"]))
            if (!filter_var($candidature["soundcloud"], FILTER_VALIDATE_URL) === true) $erreurs["soundcloud"] = "URL invalide"; // De même

        // Chaine Youtube
        if (!empty($candidature["youtube"]))
            if (!filter_var($candidature["youtube"], FILTER_VALIDATE_URL) === true) $erreurs["youtube"] = "URL invalide"; // De même

        // Statut associatif
        if (($candidature["statut_assoc"] != "1") && ($candidature["statut_assoc"] != "0")) $erreurs["statut_assoc"] = "Merci de cocher une case"; // On vérifie si une case a été coché

        //Producteur
        if (($candidature["producteur"] != "1") && ($candidature["producteur"] != "0")) $erreurs["producteur"] = "Veuillez cocher une case"; // De même ici

        // SACEM
        if (($candidature["inscrit_sacem"] == "1") || ($candidature["inscrit_sacem"] == "0")) { // De même ici
            if ($candidature["inscrit_sacem"] == "1") { // Si on coche oui on conditionne le depot du document SACEM
                $candidatureAInsert["inscrit_sacem"] = 1;
                if (!empty($_FILES["depot_doc_sacem"]["name"])) { // On vérifie si un fichier a été déposé
                    $pathCheminDocSACEM = $pathCandidatureGroupe . "docSACEM" . "_" . $id . "_" . $candidature["nom_groupe"] . "." . explode("/", $_FILES["depot_doc_sacem"]["type"])[1];
                    if (explode("/", $_FILES["depot_doc_sacem"]["type"])[1] == "pdf") {
                        if (!file_exists($pathCheminDocSACEM)) { // On vérifie si le fichier n'existe pas déjà
                            $candidatureAInsert["depot_doc_sacem"] = "docSACEM" . "_" . $id . "_" . $candidature["nom_groupe"] . "." . explode("/", $_FILES["depot_doc_sacem"]["type"])[1];
                        }
                    } else $erreurs["depot_fichier_audio"] = "Veuillez déposer le document SACEM au format pdf";
                } else $erreurs["depot_fichier_audio"] = "Veuillez déposer le document SACEM faisant suite à votre oui";    
            } else $candidatureAInsert["inscrit_sacem"] = 0;
        } else $erreurs["inscrit_sacem"] = "Veuillez cocher une case";

        // Dépôts Fiche technique
        if (!empty($_FILES["depot_fiche_technique"]["name"])) { // On vérifie si un fichier a été déposé
            $pathCheminFicheTechnique = $pathCandidatureGroupe . "fichetechnique" . "_" . $id . "_" . $candidature["nom_groupe"] . "." . explode("/", $_FILES["depot_fiche_technique"]["type"])[1];
            if (explode("/", $_FILES["depot_fiche_technique"]["type"])[1] == "pdf") {
                if (!file_exists($pathCheminFicheTechnique)) { // On vérifie si le fichier n'existe pas déjà
                    $candidatureAInsert["depot_fiche_technique"] = "fichetechnique" . "_" . $id . "_" . $candidature["nom_groupe"] . "." . explode("/", $_FILES["depot_fiche_technique"]["type"])[1];
                }
            } else $erreurs["depot_fiche_technique"] = "Veuillez déposer la fiche technique au format pdf";
        } else $erreurs["depot_fiche_technique"] = "Veuillez déposer la fiche technique demandée";

        // Dépôts Dossier de presse
        if (!empty($_FILES["depot_dossier_presse"]["name"])) { // On a les mêmes conditions qu'au dessus
            $pathCheminDossierPresse = $pathCandidatureGroupe . "dossierpresse" . "_" . $id . "_" . $candidature["nom_groupe"] . "." . explode("/", $_FILES["depot_dossier_presse"]["type"])[1];
            if (explode("/", $_FILES["depot_dossier_presse"]["type"])[1] == "pdf") {
                if (!file_exists($pathCheminDossierPresse)) {
                    $candidatureAInsert["depot_dossier_presse"] = "dossierpresse" . "_" . $id . "_" . $candidature["nom_groupe"] . "." . explode("/", $_FILES["depot_dossier_presse"]["type"])[1];
                }
            } else $erreurs["depot_dossier_presse"] = "Veuillez déposer la fiche technique au format pdf";
        } else $erreurs["depot_dossier_presse"] = "Veuillez déposer la fiche technique demandée";

        // Dépôts des audios
        for ($i = 1; $i <= 3; $i++) {
            if (!empty($_FILES["depot_fichier_audio$i"]["name"])) { // De même ici
                $pathCheminAudio = $pathCandidatureGroupe . "audio$i" . "_" . $id . "_" . $candidature["nom_groupe"] . "." . explode("/", $_FILES["depot_fichier_audio$i"]["type"])[1];
                if (explode("/", $_FILES["depot_fichier_audio$i"]["type"])[1] == ("mp3" || "mpeg")) { // On vérifie si le dépot est bien un .mp3
                    if (!file_exists($pathCheminAudio)) {
                        $candidatureAInsert["depot_fichier_audio$i"] = "audio$i" . "_" . $id . "_" . $candidature["nom_groupe"] . "." . explode("/", $_FILES["depot_fichier_audio$i"]["type"])[1];
                    }
                } else $erreurs["depot_fichier_audio"] = "Veuillez déposer les 3 audios au format mp3";
            } else $erreurs["depot_fichier_audio"] = "Veuillez déposer les 3 audios qui vous sont demandées";
        }

        // Dépôts des photos
        for ($i = 1; $i <= 2; $i++) {
            if (!empty($_FILES["depot_photo$i"]["name"])) { // De même ici
                $pathCheminPhoto = $pathCandidatureGroupe . "photo$i" . "_" . $id . "_" . $candidature["nom_groupe"] . "." . explode("/", $_FILES["depot_photo$i"]["type"])[1];
                if (getimagesize($_FILES["depot_photo$i"]["tmp_name"]) > 300) { // On vérifie si la résolution est > 300 dpi
                    if (!file_exists($pathCheminPhoto)) {
                        $candidatureAInsert["depot_photo$i"] = "photo$i" . "_" . $id . "_" . $candidature["nom_groupe"] . "." . explode("/", $_FILES["depot_photo$i"]["type"])[1];
                    }
                } else $erreurs["depot_photo"] = "Veuillez déposer les 2 photos avec une résolution de plus de 300 dpi";
            } else $erreurs["depot_photo"] = "Veuillez déposer les 2 photos qui vous sont demandées";
        }

        // La suite de requêtes ci-dessous va chercher dans la base le contenu des champs de sélection du formulaire
        $BDD = Flight::get('BDD');

        $departement = $BDD->prepare("SELECT departement_code, departement_nom FROM departement");
        $departement->execute();
        $listDepartements = $departement->fetchAll(PDO::FETCH_ASSOC);
    
        $Tablo = array();
        $Tablo['departement'] = $listDepartements;
        $Tablo['annee'] = date("Y");
    
        $requete_type_scene = $BDD->prepare("SELECT genre FROM scene");
        $requete_type_scene->execute();
        $type_scene = $requete_type_scene->fetchAll(PDO::FETCH_ASSOC);
    
        $Tablo['type_scene'] = $type_scene;
    
        $requete_style_musical = $BDD->prepare("SELECT nom_style FROM style_musicaux");
        $requete_style_musical->execute();
        $style_musicaux = $requete_style_musical->fetchAll(PDO::FETCH_ASSOC);
    
        $Tablo['style_musicaux'] = $style_musicaux;
    
        Flight::view()->assign('utils', $Tablo); // On assigne à une variable utils ses données extraites
    
        /*
            Si on observe aucune erreur, on inscrit dans la base :
                -> les données de candidature dans candidature
                -> les membres du groupe dans groupe
                -> on enregistre dans le dossier candidatures, dans le sous-dossier du groupe, les fichiers déposés
        */
        if (empty($erreurs)) {
            Flight::redirect("/success"); // On redirige vers une page pour confirmer la candidature
            //On insert toutes les données de candidatures
            $stmt = $BDD -> prepare("INSERT INTO candidature VALUES(:id, :nom, :departement, :email, :style, :annee, :presentation, :experience, :urlgroupe, :soundcloud, :youtube, :association, :sacem, :producteur, :fichier1, :fichier2, :fichier3, :dossier_presse, :photo1, :photo2, :fiche_technique, :doc_sacem)");
            
            $stmt->execute(array(
                ':id' => $id,
                ':nom' => $candidature['nom_groupe'],
                ':departement' => $candidatureAInsert['departement'],
                ':email' => $candidatureAInsert['representant_groupe'],
                ':style' => $candidatureAInsert['style_musicaux'],
                ':annee' => $candidature['date_creation_groupe'],
                ':presentation' => $candidature['presentation'],
                ':experience' => $candidature['experience'],
                ':urlgroupe' => $candidature['site_web'],
                ':soundcloud' => $candidature['soundcloud'],
                ':youtube' => $candidature['youtube'],
                ':association' => ($candidature['statut_assoc'] == 1) ? "Oui" : "Non",
                ':sacem' => ($candidature['inscrit_sacem'] == 1) ? "Oui" : "Non",
                ':producteur' => ($candidature['producteur'] == 1) ? "Oui" : "Non",
                ':fichier1' => $candidatureAInsert['depot_fichier_audio1'],
                ':fichier2' => $candidatureAInsert['depot_fichier_audio2'],
                ':fichier3' => $candidatureAInsert['depot_fichier_audio3'],
                ':dossier_presse' => $candidatureAInsert['depot_dossier_presse'],
                ':photo1' => $candidatureAInsert['depot_photo1'],
                ':photo2' => $candidatureAInsert['depot_photo2'],
                ':fiche_technique' => $candidatureAInsert['depot_fiche_technique'],
                ':doc_sacem' => (isset($candidatureAInsert['depot_doc_sacem'])) ? $candidatureAInsert['depot_doc_sacem'] : "Aucun document SACEM"
            ));

            // On insert toutes les données des membres du groupe
            $requeteIDMembre = $BDD->prepare("SELECT COUNT(DISTINCT id_membre) FROM groupe"); 
            $requeteIDMembre->execute();
            $idMembre = ($requeteIDMembre->fetch()[0]) + 1;

            $requeteRepresentant = $BDD->prepare("INSERT INTO groupe VALUES(:id_membre, :id_groupe, :nom, :prenom, :instrument)");
            $requeteRepresentant->execute( array(
                ':id_membre' => $idMembre,
                ':id_groupe' => $id,
                ':nom' => $_SESSION["nom"],
                ':prenom' => $_SESSION["prenom"],
                ':instrument' => "" 
            ));

            for ($i = 0; $i < 8; $i++) {
                $requeteIDMembre = $BDD->prepare("SELECT COUNT(DISTINCT id_membre) FROM groupe"); 
                $requeteIDMembre->execute();
                $idMembre = ($requeteIDMembre->fetch()[0]) + 1;

                if (!empty($candidature["nom_membre"][$i])) {
                    $nom = $candidature["nom_membre"][$i];
                    $prenom = $candidature["prenom_membre"][$i];
                    $instrument = $candidature["instrument_membre"][$i];

                    $requeteMembre = $BDD->prepare("INSERT INTO groupe VALUES(:id_membre, :id_groupe, :nom, :prenom, :instrument)");
                    $requeteMembre->execute( array(
                        ':id_membre' => $idMembre,
                        ':id_groupe' => $id,
                        ':nom' => $nom,
                        ':prenom' => $prenom,
                        ':instrument' => $instrument 
                    ));
                }
            }

            // On enregistre les différents fichiers déposés
            if (empty($erreurs)) {
                if (!file_exists($pathCandidatureGroupe)) mkdir($pathCandidatureGroupe);

                if ($candidature["inscrit_sacem"] == "1") move_uploaded_file($_FILES["depot_doc_sacem"]["tmp_name"], $pathCheminDocSACEM);

                move_uploaded_file($_FILES["depot_fiche_technique"]["tmp_name"], $pathCheminFicheTechnique);

                move_uploaded_file($_FILES["depot_dossier_presse"]["tmp_name"], $pathCheminDossierPresse);

                for ($i = 1; $i <= 3; $i++) { 
                    $pathCheminAudio = $pathCandidatureGroupe . "audio$i" . "_" . $id . "_" . $candidature["nom_groupe"] . "." . explode("/", $_FILES["depot_fichier_audio$i"]["type"])[1];
                    move_uploaded_file($_FILES["depot_fichier_audio$i"]["tmp_name"], $pathCheminAudio); 
                }

                for ($i = 1; $i <= 2; $i++) { 
                    $pathCheminPhoto = $pathCandidatureGroupe . "photo$i" . "_" . $id . "_" . $candidature["nom_groupe"] . "." . explode("/", $_FILES["depot_photo$i"]["type"])[1];
                    move_uploaded_file($_FILES["depot_photo$i"]["tmp_name"], $pathCheminPhoto); 
                }
            }

        } else {
            /* 
                S'il y a des erreurs on revoie le formulaire :
                    -> Les données non erronées reste inscrite sauf pour les dépots par question de sécurité les input de type file n'enregistre pas après rafraichissment
                    -> Les données erronées ont leur message correspondant d'indiqué
            */
            Flight::render('apply.tpl', array('erreur'=>$erreurs, 'candidature'=>$candidature));
        }
    });
?>