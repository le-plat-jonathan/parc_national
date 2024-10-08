<?php

require_once './../Models/User.php';

class UserController {
    private $user;

    public function __construct() {
        $this->user = new User();
    }

    public function getUserById(int $id): void {
        $response = $this->user->getUserById($id);
        if (!$response) {
            $response = ['message' => 'User not found'];
        }
        $this->render('./../views/user/getUser.php', $response);
    }

    public function getAllUsers(){
        $response = $this->user->getAllUsers();
        if (!$response) {
            $response = ['message' => 'No user found'];
        } else {
            $response = ['users' => $response];
        }
        return $response;
    }
    
    public function register(string $email, string $password, string $confirmPassword, string $username): void {
        $response = $this->user->createUser($email, $password, $confirmPassword, $username);
    }

    public function login(string $email, string $password) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    
        if (empty($email) || empty($password)) {
            $response = ['message' => 'Email or password missing'];
        } else {
            $response = $this->user->loginUser($email, $password);
        }
        return $response;
    }

    public function update(int $id, string $username, string $email, string $password, string $confirmPassword): void {
        $response = $this->user->updateUser($id, $username, $email, $password, $confirmPassword);
        $this->render('./../views/user/updateUser.php', $response);
    }

    public function delete(int $id): void {
        $response = $this->user->deleteUser($id);
    }

    public function render(string $view, array $data): void {
        extract($data);
        include $view;
    }

}
