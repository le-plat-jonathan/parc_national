<?php
require_once __DIR__ . '/../models/Trail.php';
require_once __DIR__ . '/../views/Trails/getAllTrail.php';
require_once __DIR__ . '/../views/Trails/getTrailById.php';
require_once '/../models/Database.php';


class TrailController {
  private $model;

  public function __construct ($pdo) {
    $this->model = new Trail($pdo);
  }

  public function getTrailById(){
    $response = $this->model->getTrailById($id);
    if (!$response) {
        $response = ['message' => 'Trail not found'];
    }
    $this->render('./views/Trails/getTrailById.php', $response);
}

public function getAllTrail(){
  $response = $this->model->getAllTrail();
  if (!$response){
    $response = ['message'=> 'Trails not found'];
  }
  $this->render('.views/Trails/getAllTrail.php', $response);
}

public function create(string $name, string $length, string $difficulty, string $longitude_A, string $latitude_A, string $longitude_B, string $latitude_B) {
  $response = $this->model->createTrail( $name,  $length,  $difficulty,  $longitude_A,  $latitude_A,  $longitude_B,  $latitude_B);
  $this->render('./views/Trails/createTrail.php', $response);
}

public function update(string $name, string $length, string $difficulty, string $longitude_A, string $latitude_A, string $longitude_B, string $latitude_B) {
  $response = $this->model->updateTrail($name,  $length,  $difficulty,  $longitude_A,  $latitude_A,  $longitude_B,  $latitude_B);
  $this->render('./views/Trails/updateTrail.php', $response);
}

public function delete( int $id) {
  $response = $this->model->deleteTrail($id);
  $this->render('./views/Trails/deleteTrail.php', $response);
}

public function render($view, $data) {
  include $view;
}

}