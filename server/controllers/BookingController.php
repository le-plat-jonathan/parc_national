<?php

require_once __DIR__ . '/../models/Booking.php';

/*

BookingController: contrôleur responsable de la gestion des réservations (SCRUD).

Méthodes:

- getAllBooking() : void -> récupère toutes les réservations et les passe à la vue correspondante.

- getBookingById(id : int) : void -> récupère une réservation spécifique par son id et la passe à la vue correspondante.

- createBooking() : void -> crée une nouvelle réservation à partir des données POST (start-date, end-date, status, user_id, bungalow_id) et affiche un message de succès ou une erreur si les données sont invalides.

- updateBooking(id : int) : void -> met à jour une réservation existante avec les données POST fournies (start-date, end-date, status, user_id, bungalow_id).

- deleteBooking(id : int) : void -> supprime une réservation spécifique par son ID et affiche un message de confirmation ou une erreur en cas d'échec.

*/

class BookingController {

    private $booking;

    public function __Construct () {
        $this->booking = new Booking();
    }

    public function getAllBooking() {
        $data = $this->booking->getAllBooking();
        require __DIR__ . '/../views/getBooking.php';
        }

    public function getBookingById($id) {
        $data = $this->booking->getBookingById($id);
        require __DIR__ . '/../views/getBooking.php';
        } 
    public function createBooking(){
            
            $startDate = isset($_POST['start-date']) ? $_POST['start-date'] : null;
            $endDate = isset($_POST['end-date']) ? $_POST['end-date'] : null;
            $status = isset($_POST['status']) ? $_POST['status'] : null;
            $userId = isset($_POST['user_id']) ? $_POST['user_id'] : null;
            $bungalowId = isset($_POST['bungalow_id']) ? $_POST['bungalow_id'] : null;
            
            if ($this->booking->createBooking($startDate, $endDate, $status, $userId, $bungalowId)){
                echo 'Booking crée avec succés';
            } else {
                echo 'Erreur dans la creation du booking';
            };
        }

    public function updateBooking($id){
            
            $startDate = isset($_POST['start-date']) ? $_POST['start-date'] : null;
            $endDate = isset($_POST['end-date']) ? $_POST['end-date'] : null;
            $status = isset($_POST['status']) ? $_POST['status'] : null;
            $userId = isset($_POST['user_id']) ? $_POST['user_id'] : null;
            $bungalowId = isset($_POST['bungalow_id']) ? $_POST['bungalow_id'] : null;
            
            if ($this->booking->updateBooking($id, $startDate, $endDate, $status, $userId, $bungalowId)){
                echo 'Booking update avec succés';
            } else {
                echo 'Erreur dans l\'update du booking';
            };
        }
        
    public function deleteBooking($id) {
    
            if ($this->booking->deleteBooking($id)){
                echo "Booking supprimé avec succès";
            } else {
                echo "Problème dans la suppresion du Booking, id : " . $id;
            }
    
        }
}

// LIGNE DEBUG
// $booking = new BookingController();
?>