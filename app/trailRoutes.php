<?php
// require_once './vendor/autoload.php';
// include_once 'cors.php';
// include_once './models/Database.php';
include_once __DIR__ . '/controllers/trailController.php';

// Initialisation de la base de données et du contrôleur

$trail = new TrailController();

$request_method = $_SERVER['REQUEST_METHOD'];
$request_uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
$endpoint = isset($request_uri[1]) ? $request_uri[1] : '';
$id = isset($request_uri[2]) ? $request_uri[2] : null;

if ($request_method === 'GET'){
    $data = $trail->getAllTrail();
    require __DIR__ . '/views/Trails/getAllTrail.php';
}

// Vérifier si la requête concerne les routes utilisateurs
/*
if (in_array($endpoint, ['get_trail', 'get_all_trail', 'create_trail', 'update_trail', 'delete_trail'])) {
    // Gestion des requêtes en fonction de la méthode
    switch ($request_method) {
        case 'POST':
            handlePostRequest($endpoint);
            break;
        case 'GET':
            handleGetRequest($endpoint, $id);
            break;
        case 'PUT':
            handlePutRequest($endpoint, $id);
            break;
        case 'DELETE':
            handleDeleteRequest($endpoint, $id);
            break;
        default:
            echo json_encode(['message' => 'Invalid request method.']);
            break;
    }
} else {
    // Redirection ou gestion pour d'autres routes
    header("HTTP/1.0 404 Not Found");
    echo json_encode(['message' => 'Not Found']);
}

// Gestion des requêtes POST
function handlePostRequest($endpoint) {
    global $trail;
    $input = json_decode(file_get_contents('php://input'), true);

    switch ($endpoint) {
        case 'create_trail':
            echo json_encode($trail->create($input['name'], $input['length'], $input['difficulty'], $input['longitude_A'], $input['latitude_A'], $input['longitude_B'], $input['latitude_B']));
            break;  
        
    }
}

// Gestion des requêtes GET
function handleGetRequest($endpoint, $id = null) {
    global $trail;
    switch ($endpoint) {
        case 'get_trail':
            echo json_encode($trail->getTrailById($id));
            break;
        case 'get_all_trail':
            echo json_encode($trail->getAllTrail());
            break;
        default:
            echo json_encode(['message' => 'Invalid GET action.']);
            break;
    }
}

// Gestion des requêtes PUT
function handlePutRequest($endpoint, $id) {
    global $trail;
    $input = json_decode(file_get_contents('php://input'), true);

    switch ($endpoint) {
        case 'update_trail':
            echo json_encode($trail->update(
                $input['name'] ?? null, 
                $input['length'] ?? null, 
                $input['dificulty'] ?? null, 
                $input['longitude_A'] ?? null,
                $input['latitude_A'] ?? null,
                $input['longitude_B'] ?? null,
                $input['latitude_B'] ?? null
            ));
            break;
        default:
            echo json_encode(['message' => 'Invalid PUT action.']);
            break;
    }
}

// Gestion des requêtes DELETE
function handleDeleteRequest($endpoint, $id) {
    global $trail;

    switch ($endpoint) {
        case 'delete_trail':
            echo json_encode($trail->delete($id));
            break;
        default:
            echo json_encode(['message' => 'Invalid DELETE action.']);
            break;
    }
}*/