<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;


function verify_token () {
    
    $dotenv = Dotenv\Dotenv::createImmutable($_SERVER['DOCUMENT_ROOT']);
    $dotenv->load();
    $secretKey = $_ENV['JWT_SECRET_KEY'];

    if (isset($_COOKIE['auth_token'])) {
        try {
            // Décodage du token JWT
            $decoded = JWT::decode($_COOKIE['auth_token'], new Key($secretKey, 'HS256'));
        } catch (Exception $e) {
            // Gestion des erreurs liées au décodage du JWT
            error_log("Erreur lors du décodage du JWT : " . $e->getMessage());
            // Vous pouvez également rediriger ou afficher un message d'erreur si nécessaire
        }
    } else {
        return false;
        die;
    }

    if ($decoded->role === "admin"){
        return true;
    } else if ($decoded->role === "user") {
        return false;
    } else {
        echo "Problème avec le token";
    }
}

