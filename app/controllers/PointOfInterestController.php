<?php

require_once __DIR__ . '/../models/PointOfInterest.php';

/*
PointOfInterestController: contrôleur responsable de la gestion des points d'intérêt (CRUD).

Méthodes:

- getPointOfInterestById(id :int) : void -> récupère un point d'intérêt spécifique par son id et le passe à la vue correspondante.

- getAllPointOfInterest() : void -> récupère tous les points d'intérêt et les renvoie au format JSON.

- createPointOfInterest() : void -> crée un nouveau point d'intérêt à partir des données POST (name, longitude, latitude) et affiche un message de succès ou une erreur si les données sont invalides.

- updatePointOfInterest(id :int) : void -> modifie un point d'intérêt existant en fonction de l'ID passé dans l'URI et des nouvelles données POST (name, longitude, latitude).

- deletePointOfInterest(id :int) : void -> supprime un point d'intérêt spécifique à partir de l'ID passé dans l'URI.
*/

class PointOfInterestController {
    private $pointOfInterestModel;

    public function __construct() {
        $this->pointOfInterestModel = new PointOfInterest();
    }

    public function getPointOfInterestById($id) {
        $data = $this->pointOfInterestModel->getPointOfInterestById($id);
        require __DIR__ . '/../views/getPointOfInterest.php';
    }

    public function getAllPointOfInterest() {
        $data = $this->pointOfInterestModel->getAllPointOfInterest();
        echo json_encode($data);
     }

    public function createPointOfInterest() {
      $name = $_POST['name'] ?? null;
      $longitude = $_POST['longitude'] ?? null;
      $latitude = $_POST['latitude'] ?? null;
      $description = $_POST['description'] ?? null;

        if ($name && $longitude && $latitude) {
            // Appeler la méthode du modèle pour créer le PointOfInterest
            $this->pointOfInterestModel->createPointOfInterest($name, $longitude, $latitude, $description);
            echo "PointOfInterest créé avec succès!";
          } else {
            echo "Données invalides.";
          }
        }
    
    public function updatePointOfInterest($id){
        $data = $this->pointOfInterestModel->getPointOfInterestById($id);

        $name = $_POST['name'] ?? null;
        $longitude = $_POST['longitude'] ?? null;
        $latitude = $_POST['latitude'] ?? null;
        $description = $_POST['description'] ?? null;

        if ($name && $longitude && $latitude) {
            $this->pointOfInterestModel->updatePointOfInterest($id,$name, $latitude, $longitude, $description);
          } 

        require __DIR__ . '/../views/updatePointOfInterest.php';

        }

    public function deletePointOfInterest($id) {
        if ($id) {
            $this->pointOfInterestModel->deletePointOfInterest($id);
            echo "PointOfInterest supprimé avec succès!";
          } else {
            echo "Données invalides.";
          }
    }

}