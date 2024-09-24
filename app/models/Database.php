<?php

include '../cors.php';

class Database {
    
    protected $pdo;

    function __construct(){
        $dsn = "mysql:host=127.0.0.1;port=8889;dbname=parc_national";
        $dbuser = "root";
        $dbpass = "root";

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
