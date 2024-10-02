<?php
require_once __DIR__ . '/../models/Trail.php';
require_once __DIR__ . '/../models/PointOfInterest.php';

  class TrailController {
    private $trailModel;
    private $pointOfInterestModel;

    public function __construct() {
        $this->trailModel = new Trail();
        $this-> pointOfInterestModel = new PointOfInterest();
    }
  

//récupérer un Trail par rapport à son id
    public function getTrailById($id) {
      $trail = $this->trailModel->getTrailById($id);

      if (!$trail) {
          $error = "Sentier introuvable.";
          require __DIR__ . '/../views/Trails/getTrailById.php';
      } else {
          $data = $trail;
          require __DIR__ . '/../views/Trails/getTrailById.php';
      }
  }

    // Récupérer tous les sentiers
    public function getAllTrail() {
        $trails = $this->trailModel->getAllTrail();
        $points = $this->pointOfInterestModel->getAllPointOfInterest();
        
        require __DIR__ . '/../views/Trails/getAllTrail.php';
    }

    // Créer un sentier
    public function create() {

      $name= $_POST['name'] ?? null;
      $length= $_POST['length'] ?? null;
      $difficulty= $_POST['difficulty'] ?? null;
      $longitude_A= $_POST['longitude_A'] ?? null;
      $latitude_A= $_POST['latitude_A'] ?? null;
      $longitude_B= $_POST['longitude_B'] ?? null;
      $latitude_B= $_POST['latitude_B'] ?? null;

        $trails = $this->trailModel->createTrail($name, $length, $difficulty, $longitude_A, $latitude_A, $longitude_B, $latitude_B);

        require __DIR__ . '/../views/Trails/createTrail.php';
    }

    // Mettre à jour un sentier
    public function update() {

      $id=$_POST['id'] ?? null;
      $name= $_POST['name'] ?? null;
      $length= $_POST['length'] ?? null;
      $difficulty= $_POST['difficulty'] ?? null;
      $longitude_A= $_POST['longitude_A'] ?? null;
      $latitude_A= $_POST['latitude_A'] ?? null;
      $longitude_B= $_POST['longitude_B'] ?? null;
      $latitude_B= $_POST['latitude_B'] ?? null;

      if ($id === null || empty($name) || empty($length) || empty($difficulty) || empty($longitude_A) || empty($latitude_A) || empty($longitude_B) || empty($latitude_B)) {
        ;} else {
          $trails = $this->trailModel->updateTrail($id, $name, $length, $difficulty, $longitude_A, $latitude_A, $longitude_B, $latitude_B);
        }
      
      require __DIR__ . '/../views/Trails/updateTrail.php';

  }
  
    // Supprimer un sentier
    public function delete(int $id) {
        $trails = $this->trailModel->deleteTrail($id);
       
      
    }

}






