<?php 

require_once "Database.php";

/*
searchBungalow(id :int) : array -> renvoie un bungalow spécifique par son id

createBungalow(name :string, description :string, price :int ) : void -> crée un nouveau bungalow

readBungalow() : array -> renvoie tous les bungalows

updateBungalow(id :int, name :string, description :string, price :int) : void -> met à jour un bungalow par son id

deleteBungalow(id :int) : void -> supprime un bungalow par son id
*/

class Bungalow extends Database {

    public function __construct() {
        parent::__construct();
    }
    public function getBungalowById($id) {
        try {
            $req = $this->bdd->prepare("SELECT * FROM bungalow WHERE `id` = :id");
            $req->bindValue(':id', $id, PDO::PARAM_STR);
            $req->execute();
            $result = $req->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
    
    public function createBungalow($name, $description, $price) {
        try {
            $req = $this->bdd->prepare("INSERT INTO bungalow (name, description, price) VALUES (:name, :description, :price)");

            $req->bindValue(':name', $name, PDO::PARAM_STR);
            $req->bindValue(':description', $description, PDO::PARAM_STR);
            $req->bindValue(':price', $price, PDO::PARAM_INT);

            $req->execute();
            
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
    public function getAllBungalow() {
        try {
            $req = $this->bdd->prepare("SELECT * FROM bungalow");
            $req->execute();
            $result = $req->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    public function updateBungalow($id, $name, $description, $price) {
        try {
            $req = $this->bdd->prepare("UPDATE `bungalow` SET `id`=:id,`name`=:name,`description`=:description,`price`=:price WHERE `id`=:id");
            $req->bindValue(':id', $id);
            $req->bindValue(':name', $name, PDO::PARAM_STR);
            $req->bindValue(':description', $description, PDO::PARAM_STR);
            $req->bindValue(':price', $price, PDO::PARAM_STR);
            $req->execute();
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    public function deleteBungalow($id) {
        try {
            $req = $this->bdd->prepare("DELETE FROM `bungalow` WHERE `id`=:id");
            $req->bindValue(':id', $id);
            $req->execute();
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
    
}