<?php

include 'cors.php';

class Database {

    private $host = 'localhost';
    private $db = 'parc_national';
    private $user = 'root';
    private $pass = '';

    public function databaseConnect () {
        try {
            $pdo = new PDO("mysql:host={$this->host};dbname={$this->db};charset=utf8", $this->user, $this->pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
            exit();
        }
    }   
}
?>
