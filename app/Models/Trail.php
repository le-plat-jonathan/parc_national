<?php

require_once __DIR__ . "/../config/Database.php";

class Trail extends Database {
    protected $pdo;

    public function __construct() {
       parent::__construct();
    }

    // Créer un sentier
    public function createTrail(string $name, string $length, string $difficulty, string $longitude_A, string $latitude_A, string $longitude_B, string $latitude_B): bool {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO trail (name, length, difficulty, longitude_A, latitude_A, longitude_B, latitude_B)
                    VALUES (:name, :length, :difficulty, :longitude_A, :latitude_A, :longitude_B, :latitude_B)");
            $stmt->bindValue(':name', $name, PDO::PARAM_STR);
            $stmt->bindValue(':length', $length, PDO::PARAM_STR);
            $stmt->bindValue(':difficulty', $difficulty, PDO::PARAM_STR);
            $stmt->bindValue(':longitude_A', $longitude_A, PDO::PARAM_STR);
            $stmt->bindValue(':latitude_A', $latitude_A, PDO::PARAM_STR);
            $stmt->bindValue(':longitude_B', $longitude_B, PDO::PARAM_STR);
            $stmt->bindValue(':latitude_B', $latitude_B, PDO::PARAM_STR);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            // Log ou afficher une erreur
            error_log("Erreur lors de la création du sentier : " . $e->getMessage());
            return false;
        }
    }

    // Récupérer un sentier par ID
    public function getTrailById(int $id) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM trail WHERE id = :id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erreur lors de la récupération du sentier : " . $e->getMessage());
            return null;
        }
    }

    // Récupérer tous les sentiers
    public function getAllTrail(): array {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM trail");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erreur lors de la récupération des sentiers : " . $e->getMessage());
            return [];
        }
    }

    // Mettre à jour un sentier
    public function updateTrail( int $id, string $name, string $length, string $difficulty, string $longitude_A, string $latitude_A, string $longitude_B, string $latitude_B ): bool {
        try {
            $stmt = $this->pdo->prepare("UPDATE trail 
                    SET name = :name, length = :length, difficulty = :difficulty, longitude_A = :longitude_A, latitude_A = :latitude_A, longitude_B = :longitude_B, latitude_B = :latitude_B 
                    WHERE id = :id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->bindValue(':name', $name, PDO::PARAM_STR);
            $stmt->bindValue(':length', $length, PDO::PARAM_STR);
            $stmt->bindValue(':difficulty', $difficulty, PDO::PARAM_STR);
            $stmt->bindValue(':longitude_A', $longitude_A, PDO::PARAM_STR);
            $stmt->bindValue(':latitude_A', $latitude_A, PDO::PARAM_STR);
            $stmt->bindValue(':longitude_B', $longitude_B, PDO::PARAM_STR);
            $stmt->bindValue(':latitude_B', $latitude_B, PDO::PARAM_STR);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Erreur lors de la mise à jour du sentier : " . $e->getMessage());
            return false;
        }
    }

    // Supprimer un sentier
    public function deleteTrail(int $id): bool {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM trail WHERE id = :id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Erreur lors de la suppression du sentier : " . $e->getMessage());
            return false;
        }
    }
}



