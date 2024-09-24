<?php
require_once __DIR__ . '/../models/Trail.php';

class NaturalRessourcesController{

  private $naturalRessourcesModel;

  public function __construct() {
      $this->naturalRessourcesModel = new NaturalRessources();
  }

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
public function getAllNaturalRessources() {
  $ressources = $this->naturalRessourcesModel->getAllNaturalRessources();
  
  require __DIR__ . '/../views/NaturalRessources/getAllNaturalRessources.php';
}

public function create() {

  $name= $_POST['name'] ?? null;
  $description= $_POST['description'] ?? null;
  $population= $_POST['population'] ?? null;
  $environment_id= $_POST['environment_id'] ?? null;
 
    $resources = $this->naturalRessourcesModel->createNaturalRessources($name, $description, $population, $environment_id);

    require __DIR__ . '/../views/NaturalRessources/createNaturalRessources.php';
}

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

public function delete(int $id) {
  $resources = $this->naturalRessourcesModel->deleteNaturalRessources($id);
 
  // require __DIR__ . '/../views/NaturalRessources/deleteNaturalRessources.php';
}

}