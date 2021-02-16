<?php
/*
 * Contrôleur frontal
 */

/*
 * Lancement d'une session
 */
session_start();

/*
 * Config
 */
require_once "../config/config.php";

/*
 * Création d'un autoload personnel, si une classe est recherchée ou instanciée mais qu'elle n'est pas trouvée dans le coeur de PHP ni ses bibliothèques, on va automatiser la recherche de la classe dans notre dossier "model"
 */
spl_autoload_register(
    function($className){
        include "../model/".$className.".php";
    }
);



/*
 * Connexion à la DB
 */
try{
    $myConnect = new MyPDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT.";charset=".DB_CHARSET,DB_LOGIN,DB_PWD,ENV_DEV);
}catch(PDOException $e){
    die($e->getMessage());
}