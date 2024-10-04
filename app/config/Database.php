<?php

require_once './../vendor/autoload.php';

class Database {

    protected $pdo;

    function __construct(){
        
        $dotenv = Dotenv\Dotenv::createImmutable($_SERVER['DOCUMENT_ROOT']);
        $dotenv->load();

        $dns = $_ENV['DB_DNS'];
        $user = $_ENV['DB_USER'];
        $pass = $_ENV['DB_PASS'];

        try {
            $this->pdo = new PDO($dns, $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
            exit;
        }
    }

    // Méthode pour vérifier la connexion
    public function checkConnection() {
        // Effectuer une simple requête pour vérifier la connexion
        try {
            $this->pdo->query('SELECT 1'); // Requête simple
            echo 'Connexion à la base de données réussie !</br>';
        } catch (PDOException $e) {
            echo 'Échec de la connexion à la base de données : ' . $e->getMessage();
            exit;
        }
    }
}