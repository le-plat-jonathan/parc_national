<?php 

require_once __DIR__ . "/../config/Database.php";

/*
searchBungalow(id :int) : array -> renvoie un bungalow spécifique par son id

createBungalow(name :string, description :string, price :int ) : void -> crée un nouveau bungalow

readBungalow() : array -> renvoie tous les bungalows

updateBungalow(id :int, name :string, description :string, price :int) : void -> met à jour un bungalow par son id

deleteBungalow(id :int) : void -> supprime un bungalow par son id
*/

class Booking extends Database {

    public function __construct() {
        parent::__construct();
    }
    public function getBookingById($id) {
        try {
            $req = $this->pdo->prepare("SELECT * FROM booking WHERE `id` = :id");
            $req->bindValue(':id', $id, PDO::PARAM_INT);
            $req->execute();
            $result = $req->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
    
    public function createBooking($start_date, $end_date, $status, $user_id, $bungalow_id) {
        try {
            $req = $this->pdo->prepare("INSERT INTO `booking`(`start_date`, `end_date`, `status`, `user_id`, `bungalow_id`) VALUES (:start_date, :end_date, :status, :user_id, :bungalow_id)");

            $req->bindValue(':start_date', $start_date, PDO::PARAM_STR);
            $req->bindValue(':end_date', $end_date, PDO::PARAM_STR);
            $req->bindValue(':status', $status, PDO::PARAM_STR);
            $req->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            $req->bindValue(':bungalow_id', $bungalow_id, PDO::PARAM_INT);

            return $req->execute();
            
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
    public function getAllBooking() {
        try {
            $req = $this->pdo->prepare("SELECT * FROM booking");
            $req->execute();
            $result = $req->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    public function updateBooking($id, $start_date, $end_date, $status, $user_id, $bungalow_id) {
        try {
            $req = $this->pdo->prepare("UPDATE `booking` SET `id`=:id,`start_date`=:start_date, `end_date`=:end_date,`status`=:status,`user_id`=:user_id, `bungalow_id`=:bungalow_id WHERE `id`=:id");

            $req->bindValue(':id', $id, PDO::PARAM_INT);
            $req->bindValue(':start_date', $start_date, PDO::PARAM_STR);
            $req->bindValue(':end_date', $end_date, PDO::PARAM_STR);
            $req->bindValue(':status', $status, PDO::PARAM_STR);
            $req->bindValue(':user_id', $user_id, PDO::PARAM_INT); 
            $req->bindValue(':bungalow_id', $bungalow_id, PDO::PARAM_INT);

            return ($req->execute());
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    public function deleteBooking($id) {
        try {
            $req = $this->pdo->prepare("DELETE FROM `booking` WHERE `id`=:id");
            $req->bindValue(':id', $id, PDO::PARAM_INT);
            return ($req->execute());
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
    
}