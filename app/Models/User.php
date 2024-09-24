<?php

require_once './../config/Database.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class User extends Database {

    private $secretKey = 'your-secret-key';

    public function __construct() {
        parent::__construct();
    }

    public function createUser($email, $password, $username) {
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
    
    public function loginUser($email, $password) {
        $sql = "SELECT * FROM user WHERE email = :email LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $row['password'])) {
                $jwt = $this->generateJWT($row['id'], $row['username']);
                return ["id" => $row['id'], "username" => $row['username'], "email" => $row['email'], "role" => $row['role'], "token" => $jwt];
            } else {
                return ['message' => 'Invalid password'];
            }
        }
        return ['message' => 'Email not found'];
    }
    

    private function emailExists($email) {
        $sql = "SELECT COUNT(*) FROM user WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    private function generateJWT($userId, $username) {
        $payload = [
            'iss' => 'localhost',
            'aud' => 'localhost',
            'iat' => time(),
            'exp' => time() + (60 * 60),
            'user_id' => $userId,
            'username' => $username
        ];

        return JWT::encode($payload, $this->secretKey, 'HS256');
    }

    public function getUserById($id) {
        $sql = "SELECT * FROM user WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllUsers() {
        $sql = "SELECT * FROM user";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function updateUser($id, $email = null, $password = null, $username = null) {
        $user = $this->getUserById($id);
        if (!$user) {
            return ['message' => 'User not found'];
        }
        if ($email && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('Invalid email address');
        }
        if ($this->emailExists($email) && $email !== $user['email']) {
            return ['message' => 'Email already exists'];
        }

        $password = $password ? password_hash($password, PASSWORD_DEFAULT) : $user['password'];
        $username = $username ? htmlspecialchars($username, ENT_QUOTES, 'UTF-8') : $user['username'];

        $sql = "UPDATE user SET email = ?, password = ?, username = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email, $password, $username, $id]);

        return ['message' => 'User updated successfully'];
    }

    public function deleteUser($id) {
        $sql = "DELETE FROM user WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return ['message' => 'User deleted successfully'];
    }
}
