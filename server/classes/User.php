<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class User {
    private $pdo;
    private $secretKey = 'your-secret-key';

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // inscription d'un utilisateur
    public function create($email, $password, $username) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('Invalid email address');
        }
    
        if ($this->emailExists($email)) {
            return ['message' => 'Email already exists'];
        }
    
        $sql = "INSERT INTO user (email, password, username, role, created_at) 
                VALUES (:email, :password, :username, 'user', NOW())";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':email' => $email,
            ':password' => password_hash($password, PASSWORD_DEFAULT),
            ':username' => htmlspecialchars($username, ENT_QUOTES, 'UTF-8'),
        ]);

        $userId = $this->pdo->lastInsertId();
        $jwt = $this->generateJWT($userId, $username);

        return ['message' => 'User created successfully', 'token' => $jwt];
    }

    // fonction pour vérifier à l'inscription ou à la modification des infos si le mail existe déjà dans la BDD
    private function emailExists($email) {
        $sql = "SELECT COUNT(*) FROM user WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

      // génération d'un JWT pour un utilisateur
      private function generateJWT($userId, $username) {
        $payload = [
            'iss' => 'localhost',    // Émetteur du token
            'aud' => 'localhost',    // Audience
            'iat' => time(),         // Heure de création
            'exp' => time() + (60 * 60), // Expiration dans 1 heure
            'user_id' => $userId,     // Informations supplémentaires
            'username' => $username
        ];

        return JWT::encode($payload, $this->secretKey, 'HS256');
    }

    // récupération des données d'un utilisateur par son id
    public function getById($id) {
        if (!ctype_digit($id)) {
            throw new InvalidArgumentException('Invalid ID');
        }

        $sql = "SELECT * FROM user WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // mise à jour des données d'un utilisateur
    public function update($id, $email = null, $password = null, $username = null) {
        if (!ctype_digit($id)) {
            throw new InvalidArgumentException('Invalid ID');
        }

        // Récupérer l'utilisateur existant
        $user = $this->getById($id);
        if (!$user) {
            return ['message' => 'User not found'];
        }

        // Si un email est fourni, on vérifie sa validité et sa disponibilité
        if ($email !== null) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new InvalidArgumentException('Invalid email address');
            }
            if ($this->emailExists($email) && $email !== $user['email']) {
                return ['message' => 'Email already exists'];
            }
        } else {
            $email = $user['email'];
        }

        // Si un mot de passe est fourni, on le hash, sinon on garde l'ancien
        if ($password !== null) {
            $password = password_hash($password, PASSWORD_DEFAULT);
        } else {
            $password = $user['password'];
        }

        // Si un nom d'utilisateur est fourni, sinon on garde l'ancien
        if ($username !== null) {
            $username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
        } else {
            $username = $user['username'];
        }

        // Mise à jour des informations
        $sql = "UPDATE user SET email = ?, password = ?, username = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email, $password, $username, $id]);

        return ['message' => 'User updated successfully'];
    }

    
    // suppression d'un compte utilisateur
    public function delete($id) {
        if (!ctype_digit($id)) {
            throw new InvalidArgumentException('Invalid ID');
        }

        $sql = "DELETE FROM user WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return ['message' => 'User deleted successfully'];
    }

    // connexion d'un utilisateur
   public function login($email, $password) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('Invalid email address');
        }

        $sql = "SELECT id, username, password FROM user WHERE email = :email LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $row['password'])) {
                $jwt = $this->generateJWT($row['id'], $row['username']);
                return ["id" => $row['id'], "username" => $row['username'], "token" => $jwt];
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
