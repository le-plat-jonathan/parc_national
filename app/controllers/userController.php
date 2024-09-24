<?php

require_once __DIR__ . '/../models/User.php';
include_once __DIR__ . '/../views/getUser.php';
include_once __DIR__ . '/../views/register.php';

class UserController {
    private $model;

    public function __construct($pdo) {
        $this->model = new User($pdo);
    }

    public function getUserById($id) {
        $response = $this->model->getUserById($id);
        if (!$response) {
            $response = ['message' => 'User not found'];
        }
        $this->render('./views/getUser.php', $response);
    }
    
    public function register($email, $password, $username) {
        $response = $this->model->createUser($email, $password, $username);
        $this->render('./views/register.php', $response);
    }

    public function login($email, $password) {
        $response = $this->model->loginUser($email, $password);
        $this->render('./views/login.php', $response);
    }

    public function update($id, $email, $password, $username) {
        $response = $this->model->updateUser($id, $email, $password, $username);
        $this->render('./views/update.php', $response);
    }

    public function delete($id) {
        $response = $this->model->deleteUser($id);
        $this->render('./views/delete.php', $response);
    }

    public function render($view, $data) {
        include $view;
    }

}
