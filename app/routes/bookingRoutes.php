<?php 

require_once __DIR__ . '/../controllers/BookingController.php';
require_once __DIR__ . '/../Helpers/verify_token.php';

$is_token_true = verify_token();

/*
    Booking routes handler: gère les requêtes HTTP pour les bookings et les dirige vers le bon contrôleur.

    Méthodes HTTP supportées:

    - GET:
        - getAllBooking() : void -> récupère toutes les réservations et les passe à la vue correspondante.
        - getBookingById(id : int) : void -> récupère une réservation spécifique par son id et la passe à la vue correspondante.

    - POST:
        - createBooking() : void -> crée une nouvelle réservation à partir des données POST (start-date, end-date, status, user_id, bungalow_id).
        - updateBooking(id : int) : void -> met à jour une réservation existante avec les données POST fournies (start-date, end-date, status, user_id, bungalow_id).
        - deleteBooking(id : int) : void -> supprime une réservation spécifique par son ID et affiche un message de confirmation ou une erreur en cas d'échec.

    Points d'entrée:

    - getAllBooking : pour récupérer toutes les réservations
    - getBookingById/{id} : pour récupérer une réservation spécifique par son ID
    - createBooking : pour créer une nouvelle réservation
    - updateBooking/{id} : pour mettre à jour une réservation existante
    - deleteBooking/{id} : pour supprimer une réservation spécifique
*/

$booking = new BookingController();

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$scriptName = $_SERVER['SCRIPT_NAME'];

$url = str_replace($scriptName, "", $uri);
$url = trim($url, "/");

$urlParsed = explode('/', $url );

$endPoint = isset($urlParsed[0]) ? $urlParsed[0] : "";
$id = isset($urlParsed[1]) ? $urlParsed[1] : "";


//DEBUG

    // echo '<pre>';
    // echo 'l\'uri : ' . $uri . '</br>';
    // echo 'method : ' . $scriptName . '</br>';
    // echo 'l\'url : ' . $url . '</br>';
    // echo 'l\'urlParsed : </br>';
    // var_dump($urlParsed);
    // echo 'le endpoint : ' . $endPoint . '</br>';
    // echo 'l\'id : ' . $id . '</br>';
    // echo '</pre>';

if ($method==='GET'){

    switch($endPoint){
        case 'getAllBooking':
        $booking->getAllBooking();
        break;
        case 'getBookingById':
        $booking->getBookingById($id);
        break;
        default:
        echo "Problème avec le endpoint";
        exit;
    }

} else if ($method==='POST' && $is_token_true){

    switch($endPoint){
        case 'createBooking':
        $booking->createBooking();
        break;
        case 'updateBooking':
        $booking->updateBooking($id);
        break;
        case 'deleteBooking':
        $booking->deleteBooking($id);
        break;
        default:
        echo "Problème avec le endpoint";
        exit;
    }


} else {
    echo 'Problème avec la méthode : ' . $method;
}