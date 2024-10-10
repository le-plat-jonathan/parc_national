<?php

include_once __DIR__ . '/../controllers/trailController.php';
include_once __DIR__ . '/../controllers/PointOfInterestController.php';
include_once __DIR__ . '/../Helpers/verify_token.php';

$trail = new TrailController();

$is_token_true = verify_token();

// Parse de l'URL
$request_method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI']; // Récupère l'URI entière
$scriptName = $_SERVER['SCRIPT_NAME']; // Récupère le chemin du script PHP

// Retire la partie chemin vers le fichier script du reste de l'URL
$url = str_replace($scriptName, "", $uri);

// Assure que l'URL ne commence pas par un slash
$url = ltrim($url, '/');

// Découpe l'URL en segments
$urlParsed = explode('/', $url);

$endPoint = isset($urlParsed[0]) ? $urlParsed[0] : "";
$id = isset($urlParsed[1]) ? intval($urlParsed[1]) : 0; // Si pas d'ID, par défaut 0


//Méthode get avec switch selon endpoint( getById, updateById, getAll)
if($request_method==='GET'){
switch ($endPoint){
    case 'getTrailById':
    $trail->getTrailById($id);
    break;
    case 'update_trail':
        if ($is_token_true){
        $trail->update();} else {
            echo "Token invalide";
        }
        break;
    case 'getAllTrail':
        $trail->getAllTrail();
        break;
    default:
        echo "Erreur 404: erreur de endpoint dans GET";
        exit;
}
//Méthode post avec switch selon endpoint(creer, update, delete)
}else if($request_method==='POST' && $is_token_true){
    
    switch($endPoint){
        case 'create_trail':
            $trail->create();
            break;
        case 'update_trail':
            $trail->update((int)$id);
            break;
        case 'delete_trail':
            $trail->delete($id);
            break;
            defaut: 
            echo 'Erreur de endpoint dans POST';
            exit;
    }
}else {
    echo 'Error request method';
}



