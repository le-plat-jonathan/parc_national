<?php

include_once __DIR__ . '/../controllers/trailController.php';

$trail = new TrailController();

$request_method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
$scriptName = $_SERVER['SCRIPT_NAME'];

$url = str_replace($scriptName, "", $uri);
$url = trim($url, "/");

$urlParsed = explode('/', $url );

$endPoint = isset($urlParsed[0]) ? $urlParsed[0] : "";
$id = isset($urlParsed[1]) ? $urlParsed[1] : "";

if($request_method=== 'GET'){
switch ($endPoint){
    case 'getTrailById':
    $trail->getTrailById($id);
    break;
    case 'update_trail':
        $trail->update();
        break;
    case 'getAllTrail':
        $trail->getAllTrail();
        break;
        default:
        echo "Erreur 404: erreur de endpoint dans GET";
        exit;
}

}else if($request_method==='POST'){
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



