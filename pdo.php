<?php
    /*
        on établie et attrbiut à $db une connection à la base données projet_web :
            -> utilisateur : rhuin
            -> mot de passe : Fire2002@
        sur l'IP 185.31.40.32 respectant la norme utf8
    */
    $db = new PDO('mysql:host=185.31.40.32;port=3306;dbname=rhuin_projet_festival;charset=utf8','rhuin','Fire2002@');
    
    /*
        configure un attribut du gestionnaire de base de données avec :
            -> ATTR_ERRMODE : rapport d'erreurs
            -> ERRMODE_EXECPTION : émet les exceptions
    */
    $db -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>