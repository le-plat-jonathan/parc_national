<?php 

require_once __DIR__ . "/../config/Database.php";

/*
getPointOfInterestById(id :int) : array -> renvoie un point d'intérêt spécifique par son id

createPointOfInterest(name :string, longitude :string, latitude :string) : void -> crée un nouveau point d'intérêt avec un nom, une longitude et une latitude

getAllPointOfInterest() : array -> renvoie tous les points d'intérêt

updatePointOfInterest(id :int, name :string, longitude :string, latitude :string) : void -> met à jour un point d'intérêt par son id

deletePointOfInterest(id :int) : void -> supprime un point d'intérêt par son id
*/

class PointOfInterest extends Database {

    public function __construct() {
        parent::__construct();
    }
    public function getPointOfInterestById($id) {
        try {
            $req = $this->pdo->prepare("SELECT * FROM point_of_interest WHERE `id` = :id");
            $req->bindValue(':id', $id, PDO::PARAM_INT);
            $req->execute();
            $result = $req->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
    
    public function createPointOfInterest($name,$description, $longitude, $latitude) {
        try {
            $req = $this->pdo->prepare("INSERT INTO `point_of_interest`(`name`,`description`, `longitude`, `latitude`) VALUES (:name, :description, :longitude, :latitude)");

            $req->bindValue(':name', $name, PDO::PARAM_STR);
            $req->bindValue(':description', $description, PDO::PARAM_STR);
            $req->bindValue(':longitude', $longitude, PDO::PARAM_STR);
            $req->bindValue(':latitude', $latitude, PDO::PARAM_STR);

            return $req->execute();
            
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
    public function getAllPointOfInterest() {
        try {
            $req = $this->pdo->prepare("SELECT * FROM point_of_interest");
            $req->execute();
            $result = $req->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    public function updatePointOfInterest($id, $name,$description, $longitude, $latitude) {
        try {
            $req = $this->pdo->prepare("UPDATE `point_of_interest` SET `id`=:id,`name`=:name,`description`=:description, `longitude`=:longitude,`latitude`=:latitude WHERE `id`=:id");

            $req->bindValue(':id', $id, PDO::PARAM_INT);
            $req->bindValue(':name', $name, PDO::PARAM_STR);
            $req->bindValue(':description', $description, PDO::PARAM_STR);
            $req->bindValue(':longitude', $longitude, PDO::PARAM_STR);
            $req->bindValue(':latitude', $latitude, PDO::PARAM_STR);

            return ($req->execute());
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    public function deletePointOfInterest($id) {
        try {
            $req = $this->pdo->prepare("DELETE FROM `point_of_interest` WHERE `id`=:id");
            $req->bindValue(':id', $id, PDO::PARAM_INT);
            return ($req->execute());
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
    
}

