<?php 

require_once "../controllers/bungalowController.php";

/*
Routeur Bungalow - Gère les requêtes HTTP pour les opérations CRUD sur les bungalows.

Ce fichier routeur analyse l'URI et la méthode HTTP pour déterminer quelle action exécuter dans le contrôleur `bungalowController`. Il supporte les méthodes GET et POST pour effectuer des opérations telles que la récupération, l'ajout, la mise à jour, ou la suppression de bungalows.

Méthodes HTTP gérées :
- GET :
    - `/getAllBungalow` : Récupère et affiche tous les bungalows.
    - `/getBungalowById/{id}` : Récupère un bungalow spécifique par son ID.
- POST :
    - `/addBungalow` : Crée un nouveau bungalow à partir des données POST.
    - `/deleteBungalow/{id}` : Supprime un bungalow spécifique par son ID.
    - `/updateBungalow/{id}` : Met à jour un bungalow spécifique par son ID.

Structure :
- $request_method : Capture la méthode HTTP (GET ou POST).
- $request_uri : Capture l'URI pour analyser le chemin demandé.
- $urlParsed : Découpe l'URI en segments pour identifier l'endpoint et l'ID (si applicable).

Contrôleur utilisé :
- bungalowController : Le contrôleur appelé pour effectuer les actions CRUD.

Messages d'erreur :
- Affiche une erreur si l'endpoint est invalide ou si la méthode HTTP n'est pas prise en charge.
*/

$request_method = $_SERVER['REQUEST_METHOD'];
$request_uri = $_SERVER['REQUEST_URI'];
$script_name = $_SERVER['SCRIPT_NAME'];
$url = str_replace($script_name, "", $request_uri);
$url = trim($url, '/');

$urlParsed = explode('/', $url );

$endpoint = isset($urlParsed[0]) ? $urlParsed[0] : '';
$id = isset($urlParsed[1]) ? $urlParsed[1] : '';

$bungalow = new bungalowController();

if ($request_method==='GET'){
    switch($endpoint){

        case 'getAllBungalow':
        $bungalow->getAllBungalow();
        break;

        case 'getBungalowById':
            if($id!=""){
            $bungalow->getBungalowById($id);
            } else {
                echo "Erreur : id non defini";
            }
        break;

        default:
        echo "Erreur de endpoint";
        exit;
    }
} else if ($request_method==='POST'){
    switch($endpoint){

        case 'addBungalow':
            $bungalow->createBungalow();
            break;

        case 'deleteBungalow':
            $bungalow->deleteBungalow($id);
            break;
        
        case 'updateBungalow':
        $bungalow->updateBungalow($id);
        break;
        
        default:
        echo "Erreur de endpoint";
        exit;
        
    }
} else {
    echo 'Erreur : mauvaise request method';
}