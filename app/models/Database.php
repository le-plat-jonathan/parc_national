<?php

class Database {
    
    protected $pdo;

    function __construct(){
        $dsn = "mysql:host=localhost;dbname=parc_national";
        $dbuser = "root";
        $dbpass = "";

        try {
            $this->pdo = new PDO($dsn, $dbuser, $dbpass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Échec de la connexion : ' . $e->getMessage();
            exit;
        }
    }
}
?>
