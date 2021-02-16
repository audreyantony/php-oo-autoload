<?php


// ceci est la classe fille de la classe PDO
class MyPDO extends PDO
{

    // constructeur personnel
    public function __construct($dsn, $username = null, $password = null, $error = null)
    {
        // je récupère le fonctionnement normal du constructeur de PDO
        parent::__construct($dsn, $username, $password);

        // if $error vaut true (dev mode), on active les erreurs
        if($error===true){
            $this->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }

    }

}