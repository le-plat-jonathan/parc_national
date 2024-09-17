<?php

include '../cors.php';

class Database {
    
    protected $bdd;

    function __construct(){
        $dsn = "mysql:host=127.0.0.1;port=8889;dbname=parc_national";
        $dbuser = "root";
        $dbpass = "root";

        try {
            $this->bdd = new PDO($dsn, $dbuser, $dbpass);
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Échec de la connexion : ' . $e->getMessage();
            exit;
        }
    }
}
?>
