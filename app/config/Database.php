<?php

require_once './../vendor/autoload.php';

class Database {

    protected $pdo;

    // Le constructeur accepte un paramètre PDO, qui est facultatif
    public function __construct($pdo = null) {
        // Si aucun PDO n'est passé, on crée une nouvelle connexion (cas réel)
        if ($pdo === null) {
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
        } else {
            // Si un PDO est fourni (cas de test), on l'utilise
            $this->pdo = $pdo;
        }
    }

    // Méthode pour vérifier la connexion
    public function checkConnection() {
        try {
            $this->pdo->query('SELECT 1');
            echo 'Connexion à la base de données réussie !</br>';
        } catch (PDOException $e) {
            echo 'Échec de la connexion à la base de données : ' . $e->getMessage();
            exit;
        }
    }
}