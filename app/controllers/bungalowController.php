<?php

require_once __DIR__ . '/../models/Bungalow.php';

/*
BungalowController: contrôleur responsable de la gestion des bungalows (SCRUD).

Méthodes:

- getBungalowById(id :int) : void -> récupère un bungalow spécifique par son id et le passe à la vue correspondante.

- getAllBungalow() : void -> récupère tous les bungalows et les passe à la vue correspondante.

- createBungalow() : void -> crée un nouveau bungalow à partir des données POST (name, description, price) et affiche un message de succès ou une erreur si les données sont invalides.

- updateBungalow() : void -> modifie le bungalow dont l'id est entré dans l'URI

- deleteungalow() : void -> supprime un bungalow à partir de l'ID
*/

class BungalowController {
    private $bungalowModel;

    public function __construct() {
        $this->bungalowModel = new Bungalow();
    }

    public function getBungalowById($id) {
        $data = $this->bungalowModel->getBungalowById($id);
        require __DIR__ . '/../views/getBungalow.php';
    }

    public function getAllBungalow() {
        $data = $this->bungalowModel->getAllBungalow();
        echo json_encode($data);
     }

    public function createBungalow() {
        $name = $_POST['name'] ?? null;
        $description = $_POST['description'] ?? null;
        $price = $_POST['price'] ?? null;

        if ($name && $description && $price) {
            // Appeler la méthode du modèle pour créer le bungalow
            $this->bungalowModel->createBungalow($name, $description, $price);
            echo "Bungalow créé avec succès!";
          } else {
            echo "Données invalides.";
          }
        }
    
    public function updateBungalow($id){
        $data = $this->bungalowModel->getBungalowById($id);

        $name = $_POST['name'] ?? null;
        $description = $_POST['description'] ?? null;
        $price = $_POST['price'] ?? null;

        if ($name && $description && $price) {
            $this->bungalowModel->updateBungalow($id,$name, $description, $price);
          } 

        require __DIR__ . '/../views/updateBungalow.php';

        }

    public function deleteBungalow($id) {
        if ($id) {
            $this->bungalowModel->deleteBungalow($id);
            echo "Bungalow supprimé avec succès!";
          } else {
            echo "Données invalides.";
          }
    }

}