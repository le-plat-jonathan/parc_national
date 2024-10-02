<?php
require_once __DIR__ . '/../models/NaturalRessources.php';

class NaturalRessourcesController{
  private $naturalRessourcesModel;

  public function __construct() {
      $this->naturalRessourcesModel = new NaturalRessources();
  }

//récuperer une ressource naturelle par rapport à son id grâce à notre model
  public function getNaturalRessourcesById($id) {
    $ressource = $this->naturalRessourcesModel->getNaturalRessourcesById($id);

    if (!$ressource) {
        $error = "Ressource naturel introuvable.";
        require __DIR__ . '/../views/NaturalRessources/getNaturalRessourcesById.php';
    } else {
        $data = $ressource;
        require __DIR__ . '/../views/NaturalRessources/getNaturalRessourcesById.php';
    }
}

//récupérer plusieurs ressources naturelles par rapport à leur environnement_id (Faune terrestre,faune marine, flore terrestre)
public function getNaturalRessourcesByEnvironmentId($id) {
  $ressources = $this->naturalRessourcesModel->getNaturalRessourcesByEnvironmentId($id);

  if (!$ressources) {
      $error = "Ressource naturelle introuvable.";
      require __DIR__ . '/../views/NaturalRessources/getNaturalRessourcesByEnvironmentId.php';
  } else {
      $data = $ressources;
      require __DIR__ . '/../views/NaturalRessources/getNaturalRessourcesByEnvironmentId.php';
  }
}

//récupérer toutes les ressources naturelles de la table dans la Bdd
public function getAllNaturalRessources() {
  $ressources = $this->naturalRessourcesModel->getAllNaturalRessources();
  $data = $ressources;
  
  require __DIR__ . '/../views/NaturalRessources/getAllNaturalRessources.php';
}

//Ajouter une ressource naturelle dans la Bdd
public function create() {

  $name= $_POST['name'] ?? null;
  $description= $_POST['description'] ?? null;
  $population= $_POST['population'] ?? null;
  $environment_id= $_POST['environment_id'] ?? null;
 
    $resources = $this->naturalRessourcesModel->createNaturalRessources($name, $description, $population, $environment_id);

    require __DIR__ . '/../views/NaturalRessources/createNaturalRessources.php';
}

//Mettre à jour une ressource naturelle en fonction de l'id donné
public function update() {

  $id=$_POST['id'] ?? null;
  $name= $_POST['name'] ?? null;
  $description= $_POST['description'] ?? null;
  $population= $_POST['population'] ?? null;
  $environment_id= $_POST['environment_id'] ?? null;
 
  if ($id === null || empty($name) || empty($description) || empty($population) || empty($environment_id)) {
    ;} else {
      $ressources = $this->naturalRessourcesModel->updateNaturalRessources($id, $name, $description, $population, $environment_id);
    }
  
  require __DIR__ . '/../views/NaturalRessources/updateNaturalRessources.php';
}

//Supprimer une ressource naturelle de la Bdd par rapport à son id
public function delete(int $id) {
  $resource = $this->naturalRessourcesModel->deleteNaturalRessource($id);
 
}
}