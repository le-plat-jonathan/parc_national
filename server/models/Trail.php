<?php

include_once 'Database.php';

class Trail extends Database {

  private $pdo;

  public function __construct($pdo) {
    $this->pdo = $pdo;
}

  // Créer un sentier
  public function createTrail(string $name, string $length, string $difficulty, string $longitude_A, string $latitude_A, string $longitude_B, string $latitude_B): bool {
      $sql = "INSERT INTO trail (name, length, difficulty, longitude_A, latitude_A, longitude_B, latitude_B)
              VALUES (:name, :length, :difficulty, :longitude_A, :latitude_A, :longitude_B, :latitude_B)";
      
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':name', $name, PDO::PARAM_STR);
      $stmt->bindValue(':length', $length, PDO::PARAM_STR);
      $stmt->bindValue(':difficulty', $difficulty, PDO::PARAM_STR);
      $stmt->bindValue(':longitude_A', $longitude_A, PDO::PARAM_STR);
      $stmt->bindValue(':latitude_A', $latitude_A, PDO::PARAM_STR);
      $stmt->bindValue(':longitude_B', $longitude_B, PDO::PARAM_STR);
      $stmt->bindValue(':latitude_B', $latitude_B, PDO::PARAM_STR);
      
      return $stmt->execute();
  }

  // Récupérer un sentier par ID
  public function getTrailById(int $id): ?array {
      $sql = "SELECT * FROM trail WHERE id = :id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
      $trail = $stmt->fetch(PDO::FETCH_ASSOC);
      
      return $trail ?: null; 
  }

  // Récupérer tous les sentiers
  public function getAllTrail(): array {
      $sql = "SELECT * FROM trail";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  // Mettre à jour un sentier
  public function updateTrail(string $name, string $length, string $difficulty, string $longitude_A, string $latitude_A, string $longitude_B, string $latitude_B, int $id): bool {
      $sql = "UPDATE trail 
              SET name = :name, length = :length, difficulty = :difficulty, longitude_A = :longitude_A, latitude_A = :latitude_A, longitude_B = :longitude_B, latitude_B = :latitude_B 
              WHERE id = :id";
      
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':name', $name, PDO::PARAM_STR);
      $stmt->bindValue(':length', $length, PDO::PARAM_STR);
      $stmt->bindValue(':difficulty', $difficulty, PDO::PARAM_STR);
      $stmt->bindValue(':longitude_A', $longitude_A, PDO::PARAM_STR);
      $stmt->bindValue(':latitude_A', $latitude_A, PDO::PARAM_STR);
      $stmt->bindValue(':longitude_B', $longitude_B, PDO::PARAM_STR);
      $stmt->bindValue(':latitude_B', $latitude_B, PDO::PARAM_STR);
      $stmt->bindValue(':id', $id, PDO::PARAM_INT);
      
      return $stmt->execute();
  }

  // Supprimer un sentier
  public function deleteTrail(int $id): bool {
      $sql = "DELETE FROM trail WHERE id = :id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':id', $id, PDO::PARAM_INT);
      
      return $stmt->execute();
  }
}
