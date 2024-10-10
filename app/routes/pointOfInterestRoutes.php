<?php 

require_once __DIR__ . '/../controllers/PointOfInterestController.php';
require_once __DIR__ . '/../Helpers/verify_token.php';

/*
    PointOfInterest routes handler: gère les requêtes HTTP pour les PointOfInterests et les dirige vers le bon contrôleur.

    Méthodes HTTP supportées:

    - GET:
        - getAllPointOfInterest() : void -> récupère toutes les réservations et les passe à la vue correspondante.
        - getPointOfInterestById(id : int) : void -> récupère une réservation spécifique par son id et la passe à la vue correspondante.

    - POST:
        - createPointOfInterest() : void -> crée une nouvelle réservation à partir des données POST (start-date, end-date, status, user_id, bungalow_id).
        - updatePointOfInterest(id : int) : void -> met à jour une réservation existante avec les données POST fournies (start-date, end-date, status, user_id, bungalow_id).
        - deletePointOfInterest(id : int) : void -> supprime une réservation spécifique par son ID et affiche un message de confirmation ou une erreur en cas d'échec.

    Points d'entrée:

    - getAllPointOfInterest : pour récupérer toutes les réservations
    - getPointOfInterestById/{id} : pour récupérer une réservation spécifique par son ID
    - createPointOfInterest : pour créer une nouvelle réservation
    - updatePointOfInterest/{id} : pour mettre à jour une réservation existante
    - deletePointOfInterest/{id} : pour supprimer une réservation spécifique
*/
$is_token_true = verify_token();

$pointOfInterest = new PointOfInterestController();

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$scriptName = $_SERVER['SCRIPT_NAME'];

$url = str_replace($scriptName, "", $uri);
$url = trim($url, "/");

$urlParsed = explode('/', $url );

$endPoint = isset($urlParsed[0]) ? $urlParsed[0] : "";
$id = isset($urlParsed[1]) ? $urlParsed[1] : "";

if ($method==='GET'){

    switch($endPoint){
        case 'getAllPointOfInterest':
            $pointOfInterest->getAllPointOfInterest();
        break;

        case 'getPointOfInterestById':
            $pointOfInterest->getPointOfInterestById($id);
        break;

        case 'updatePointOfInterest':
            if ($is_token_true){
            $pointOfInterest->updatePointOfInterest($id);} else {
                echo "Token invalide";
            }
        break;

        default:
        echo "Problème avec le endpoint";
        exit;
    }

} else if ($method==='POST' && $is_token_true){

    switch($endPoint){
        case 'createPointOfInterest':
        $pointOfInterest->createPointOfInterest();
        break;
        case 'updatePointOfInterest':
        $pointOfInterest->updatePointOfInterest($id);
        break;
        case 'deletePointOfInterest':
        $pointOfInterest->deletePointOfInterest($id);
        break;
        default:
        echo "Problème avec le endpoint";
        exit;
    }


} else {
    echo 'Problème avec la méthode : ' . $method;
}