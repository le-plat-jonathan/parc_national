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
        

    //     if (!$trail) {
    //         // Gérer le cas où le sentier n'est pas trouvé
    //         $error = "Sentier introuvable.";
    //         $this->render('../views/Trails/getTrailById.php', ['error' => $error]);
    //         return;
    //     }

    //     $this->render('../views/Trails/getTrailById.php', $trail);
    // }

    // Récupérer tous les sentiers
    public function getAllTrail() {
        $trails = $this->trailModel->getAllTrail();
        require __DIR__ . '/../views/Trails/getAllTrail.php';
    }

    // // Créer un sentier
    // public function create(string $name, string $length, string $difficulty, string $longitude_A, string $latitude_A, string $longitude_B, string $latitude_B) {
    //     $response = $this->trailModel->createTrail($name, $length, $difficulty, $longitude_A, $latitude_A, $longitude_B, $latitude_B);
    //     if ($response) {
    //         $message = "Sentier créé avec succès.";
    //     } else {
    //         $message = "Erreur lors de la création du sentier.";
    //     }
    //     $this->render('./views/Trails/createTrail.php', ['message' => $message]);
    // }

    // // Mettre à jour un sentier
    // public function update(int $id, string $name, string $length, string $difficulty, string $longitude_A, string $latitude_A, string $longitude_B, string $latitude_B) {
    //     $response = $this->trailModel->updateTrail($name, $length, $difficulty, $longitude_A, $latitude_A, $longitude_B, $latitude_B, $id);
    //     if ($response) {
    //         $message = "Sentier mis à jour avec succès.";
    //     } else {
    //         $message = "Erreur lors de la mise à jour du sentier.";
    //     }
    //     $this->render('./views/Trails/updateTrail.php', ['message' => $message]);
    // }

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