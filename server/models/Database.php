<?php
include './../cors.php';

class Database {
    protected $pdo;
 
public function __construct (){
    $host = 'localhost';
    $dbname = 'parc_national';
    $user = 'root';  
    $password = '';
    try {
        $this->pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Impossible de se connecter à la base de données : " . $e->getMessage());
    }
}
}