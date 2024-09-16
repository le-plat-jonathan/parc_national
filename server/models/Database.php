<?php

include '../cors.php';

class Database {

    protected $pdo;

    function __construct(){
        $dsn = "mysql:host=localhost;dbname=parc_national";
        $user = "root";
        $pass = "";

        try {
            $this->pdo = new PDO($dsn, $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Échec de la connexion : ' . $e->getMessage();
            exit;
        }
    }

}