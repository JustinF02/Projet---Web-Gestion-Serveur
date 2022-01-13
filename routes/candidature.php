<?php
    Flight::route('/candidature-@id', function($id){
        if(!empty($_SESSION)){
            $BDD = Flight::get('BDD');
            $email = $_SESSION['email'];
            //Récupérarion de l'id de groupe de la personne connecté (dans le cas où elle est responsable de groupe)
            $requeteSessionCandidat = $BDD->prepare("SELECT id FROM candidature WHERE email = ?");
            $requeteSessionCandidat->execute(array($email));
            $IdDeConnexion = $requeteSessionCandidat->fetchColumn();

            // Récupération du type utilisateur de la personne connecté.
            $requeteTypeSession = $BDD->prepare("SELECT `type` FROM utilisateur WHERE email = ?");
            $requeteTypeSession->execute(array($email));
            $typeConnexion = $requeteTypeSession->fetchColumn();

            //L'ID de groupe correspond à l'id passé en paramètre OU la personne est responsable
            if(($IdDeConnexion == "{$id}") || ($typeConnexion == "responsable") || ($typeConnexion == "administrateur")){
                // Requête pour récupérer tous les champs qui ne sont pas des fichiers ou des booléens
                $requeteDetails = $BDD->prepare("SELECT
                id, nom, departement, email, style, annee, presentation,
                experience, urlgroupe, soundcloud FROM candidature WHERE id = ?");
                $requeteDetails->execute([$id]);
                $CandidatureDetails = $requeteDetails->fetchALL(PDO::FETCH_ASSOC);

                // Requête pour récupérer tous les champs en booléen (pour transformer 1 ou 0 par Oui ou non)
                $requeteBool = $BDD->prepare("SELECT association, sacem, producteur FROM candidature WHERE id = ?");
                $requeteBool->execute([$id]);
                $CandidatureBool = $requeteBool->fetchALL(PDO::FETCH_ASSOC);


                //Requête pour récupérer tous les champs de chemin de fichiers téléchargeables.
                $requeteFichiers = $BDD->prepare("SELECT 
                fichier1, fichier2, fichier3, dossier_presse, photo1, photo2, fiche_technique, doc_sacem 
                FROM candidature WHERE id = ?");
                $requeteFichiers->execute([$id]);
                $CandidatureFichiers = $requeteFichiers->fetchALL(PDO::FETCH_ASSOC);

                //Requête pour récupérer tous les champs de la table groupe (donc nom, prénom et instruments des membres)
                $requeteMembres = $BDD->prepare("SELECT id_membre, nom, prenom, instrument
                FROM groupe WHERE id_groupe = ?");
                $requeteMembres->execute([$id]);
                $Membres = $requeteMembres->fetchALL(PDO::FETCH_ASSOC);


                //Assignation de tous les résultats de requête sql dans les 4 parties du tableau.
                Flight::view()->assign('BoolCandidatureGroupe', $CandidatureBool);
                Flight::view()->assign('InfosCandidatureGroupe', $CandidatureDetails);
                Flight::view()->assign('FichiersCandidatureGroupe', $CandidatureFichiers);
                Flight::view()->assign('MembresGroupe', $Membres);
                
                //Envoie vers la page de candidature détaillée
                Flight::render('details.tpl', array());
            } else {
                Flight::render('index.tpl', array());
            }
        }
        else{
            Flight::render('login.tpl', array());
        }
    });
?>