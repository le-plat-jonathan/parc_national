<?php
require_once __DIR__ . '/../models/Trail.php';
// require_once __DIR__ . '/../models/Database.php';

class TrailController  {
    private $trailModel;

    public function __construct() {
        $this->trailModel = new Trail();
    }


    // // Récupérer un sentier par son ID
    // public function getTrailById($id) {
    //     $trail = $this->trailModel->getTrailById($id);
    //     require __DIR__ . '/../views/Trails/getTrailById';
       
    // }
    public function getTrailById($id) {
      
      // Appeler la méthode du modèle pour obtenir le sentier
      $trail = $this->trailModel->getTrailById($id);

      if (!$trail) {
          // Si aucun sentier trouvé, on passe un message d'erreur à la vue
          $error = "Sentier introuvable.";
          require __DIR__ . '/../views/Trails/getTrailById.php';
      } else {
          // Sinon, on passe les données du sentier à la vue
          $data = $trail;
          require __DIR__ . '/../views/Trails/getTrailById.php';
      }
  }
  

    // Récupérer tous les sentiers
    public function getAllTrail() {
        $trails = $this->trailModel->getAllTrail();
        
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

      $name= $_PUT['name'] ?? null;
      $length= $_PUT['length'] ?? null;
      $difficulty= $_PUT['difficulty'] ?? null;
      $longitude_A= $_PUT['longitude_A'] ?? null;
      $latitude_A= $_PUT['latitude_A'] ?? null;
      $longitude_B= $_PUT['longitude_B'] ?? null;
      $latitude_B= $_PUT['latitude_B'] ?? null;


        $trails = $this->trailModel->updateTrail($name, $length, $difficulty, $longitude_A, $latitude_A, $longitude_B, $latitude_B, $id);
       
      require __DIR__ . '/../views/Trails/updateTrail.php';
    }

    // // Supprimer un sentier
    // public function delete(int $id) {
    //     $response = $this->trailModel->deleteTrail($id);
    //     if ($response) {
    //         $message = "Sentier supprimé avec succès.";
    //     } else {
    //         $message = "Erreur lors de la suppression du sentier.";
    //     }
    //     $this->render('./views/Trails/deleteTrail.php', ['message' => $message]);
    // }

    // // Méthode pour afficher les vues avec les données
    // public function render($view, $data = []) {
    //     extract($data);
    //     include $view;
    // }
}
// $trail_test = new trailController();
// $trail_test->getAllTrail();