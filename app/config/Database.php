<?php

require_once 'dbConfig.php';

class Database {
    
    protected $pdo;

    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $name = DB_NAME;

    function __construct(){
        $dsn = "mysql:host=$this->host;dbname=$this->name";
        $user = "$this->user";
        $pass = "$this->pass";

        try {
            $this->pdo = new PDO($dsn, $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection failed : ' . $e->getMessage();
            exit;
        }
    }
}
?>