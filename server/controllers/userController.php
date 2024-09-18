<?php

require_once __DIR__ . '/../models/User.php';

class UserController {
    private $model;

    public function __construct(\PDO $pdo) {
        $this->model = new User($pdo);
    }

    public function getUserById(int $id): void {
        $response = $this->model->getUserById($id);
        if (!$response) {
            $response = ['message' => 'User not found'];
        }
        $this->render('./views/getUser.php', $response);
    }
    
    public function register(string $email, string $password, string $username): void {
        $response = $this->model->createUser($email, $password, $username);
        $this->render('./views/register.php', $response);
    }

    public function login(string $email, string $password): void {
        $response = $this->model->loginUser($email, $password);
        $this->render('./views/login.php', $response);
    }

    public function update(int $id, string $email, string $password, string $username): void {
        $response = $this->model->updateUser($id, $email, $password, $username);
        $this->render('./views/update.php', $response);
    }

    public function delete(int $id): void {
        $response = $this->model->deleteUser($id);
        $this->render('./views/delete.php', $response);
    }

    public function render(string $view, array $data): void {
        include $view;
    }
}

