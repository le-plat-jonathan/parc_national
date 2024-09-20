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
        $this->render('./../views/getUser.php', $response);
    }
    
    public function register(string $email, string $password, string $username): void {
        $response = $this->user->createUser($email, $password, $username);
        $this->render('./../views/register.php', $response);
    }

    public function login(string $email, string $password): void {
        $response = $this->user->loginUser($email, $password);
        $this->render('./../views/login.php', $response);
    }

    public function update(int $id, string $email, string $password, string $username): void {
        $response = $this->user->updateUser($id, $email, $password, $username);
        $this->render('./../views/updateUser.php', $response);
    }

    public function delete(int $id): void {
        $response = $this->user->deleteUser($id);
        $this->render('./../views/deleteUser.php', $response);
    }

    public function render(string $view, array $data): void {
        include $view;
    }
}
