<?php

require_once './../config/Database.php';

class NaturalRessources extends Database{

  protected $pdo;

  public function __construct() {
     parent::__construct();
  }

  public function createNaturalRessources(int $id, string $name, string $description, string $population, int $environment_id){

    try {
      $stmt = $this->pdo->prepare("INSERT INTO natural_ressource (name, description, population, environment_id)
              VALUES (:name, :description, :population, :environment_id)");
      $stmt->bindValue(':name', $name, PDO::PARAM_STR);
      $stmt->bindValue(':description', $description, PDO::PARAM_STR);
      $stmt->bindValue(':population', $population, PDO::PARAM_STR);
      $stmt->bindValue(':environment_id', $environment_id, PDO::PARAM_STR);
      
      return $stmt->execute();
  } catch (PDOException $e) {
      // Log ou afficher une erreur
      error_log("Erreur lors de la création de la ressource naturel : " . $e->getMessage());
      return false;
  }
  }

  public function getNaturalRessourcesById(int $id) {
    try {
        $stmt = $this->pdo->prepare("SELECT * FROM natural_ressource WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Erreur lors de la récupération de la ressource naturel : " . $e->getMessage());
        return null;
    }
}

public function getAllNaturalRessources(): array {
  try {
      $stmt = $this->pdo->prepare("SELECT * FROM natural_ressource");
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
      error_log("Erreur lors de la récupération des ressources naturel : " . $e->getMessage());
      return [];
  }
}

public function updateNaturalRessources( int $id, string $name, string $description, string $population, int $environment_id ): bool {
  try {
      $stmt = $this->pdo->prepare("UPDATE natural_ressource 
              SET name = :name, description = :description, population = :population, environment_id = :environment_id 
              WHERE id = :id");
      $stmt->bindValue(':id', $id, PDO::PARAM_INT);
      $stmt->bindValue(':name', $name, PDO::PARAM_STR);
      $stmt->bindValue(':description', $description, PDO::PARAM_STR);
      $stmt->bindValue(':population', $population, PDO::PARAM_STR);
      $stmt->bindValue(':environment_id', $environment_id, PDO::PARAM_STR);
      
      return $stmt->execute();
  } catch (PDOException $e) {
      error_log("Erreur lors de la mise à jour de la ressource naturel : " . $e->getMessage());
      return false;
  }
}

public function deleteNaturalRessource(int $id): bool {
  try {
      $stmt = $this->pdo->prepare("DELETE FROM natural_ressource WHERE id = :id");
      $stmt->bindValue(':id', $id, PDO::PARAM_INT);
      return $stmt->execute();
  } catch (PDOException $e) {
      error_log("Erreur lors de la suppression de la ressource naturel : " . $e->getMessage());
      return false;
  }
}



}