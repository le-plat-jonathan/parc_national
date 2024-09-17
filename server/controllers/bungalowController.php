<?php

require_once __DIR__ . '/../models/Bungalow.php';
include_once __DIR__ . '/../views/getBungalow.php';

class BungalowController {
    private $model;

    public function __construct() {
        $this->model = new Bungalow();
    }

    public function searchBungalow($id) {
        $response = $this->model->searchBungalow($id);
        if (!$response) {
            $response = ['message' => 'User not found'];
        }
        $this->render('./views/getBungalow.php', $response);
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

$bungalowController = new BungalowCrontoller();
$bungalowController->searchBungalow(1);