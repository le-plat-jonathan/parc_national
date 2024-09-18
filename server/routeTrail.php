<?php
require_once './vendor/autoload.php';
include_once 'cors.php';
include_once './controllers/trailController.php';
require_once './models/Database.php';

$controller = new TrailController($pdo);

$request_method = $_SERVER['REQUEST_METHOD'];
$request_uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
$endpoint = isset($request_uri[1]) ? $request_uri[1] : '';
$id = isset($request_uri[2]) ? $request_uri[2] : null;

// Vérifier si la requête concerne les routes utilisateurs
if (in_array($endpoint, ['get_trail', 'get_all_trail', 'create_trail', 'update_trail', 'delete_trail'])) {
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
            http_response_code(405); // Méthode non autorisée
            echo json_encode(['message' => 'Méthode de requête non valide.']);
            break;
    }
} else {
    // Redirection ou gestion pour d'autres routes
    http_response_code(404); // Non trouvé
    echo json_encode(['message' => 'Endpoint non trouvé.']);
}

// Gestion des requêtes POST
function handlePostRequest($endpoint) {
    global $controller;
    $input = json_decode(file_get_contents('php://input'), true);

    switch ($endpoint) {
        case 'create_trail':
            if (!empty($input['name']) && !empty($input['length']) && !empty($input['difficulty']) && !empty($input['longitude_A']) && !empty($input['latitude_A']) && !empty($input['longitude_B']) && !empty($input['latitude_B'])) {
                $result = $controller->create($input['name'], $input['length'], $input['difficulty'], $input['longitude_A'], $input['latitude_A'], $input['longitude_B'], $input['latitude_B']);
                if ($result) {
                    http_response_code(201); // Ressource créée
                    echo json_encode(['message' => 'Sentier créé avec succès.']);
                } else {
                    http_response_code(500); // Erreur serveur
                    echo json_encode(['message' => 'Erreur lors de la création du sentier.']);
                }
            } else {
                http_response_code(400); // Requête invalide
                echo json_encode(['message' => 'Données d’entrée invalides.']);
            }
            break;
    }
}

// Gestion des requêtes GET
function handleGetRequest($endpoint, $id = null) {
    global $controller;
    switch ($endpoint) {
        case 'get_trail':
            if ($id) {
                $trail = $controller->getTrailById($id);
                if ($trail) {
                    http_response_code(200); // OK
                    echo json_encode($trail);
                } else {
                    http_response_code(404); // Non trouvé
                    echo json_encode(['message' => 'Sentier non trouvé.']);
                }
            } else {
                http_response_code(400); // Requête invalide
                echo json_encode(['message' => 'ID de sentier requis.']);
            }
            break;
        case 'get_all_trail':
            $trails = $controller->getAllTrail();
            http_response_code(200); // OK
            echo json_encode($trails);
            break;
        default:
            http_response_code(400); // Requête invalide
            echo json_encode(['message' => 'Action GET non valide.']);
            break;
    }
}

// Gestion des requêtes PUT
function handlePutRequest($endpoint, $id) {
    global $controller;
    $input = json_decode(file_get_contents('php://input'), true);

    switch ($endpoint) {
        case 'update_trail':
            if ($id) {
                $result = $controller->update(
                    $id,
                    $input['name'] ?? null, 
                    $input['length'] ?? null, 
                    $input['difficulty'] ?? null, 
                    $input['longitude_A'] ?? null,
                    $input['latitude_A'] ?? null,
                    $input['longitude_B'] ?? null,
                    $input['latitude_B'] ?? null
                );
                if ($result) {
                    http_response_code(200); // OK
                    echo json_encode(['message' => 'Sentier mis à jour avec succès.']);
                } else {
                    http_response_code(500); // Erreur serveur
                    echo json_encode(['message' => 'Erreur lors de la mise à jour du sentier.']);
                }
            } else {
                http_response_code(400); // Requête invalide
                echo json_encode(['message' => 'ID de sentier requis.']);
            }
            break;
        default:
            http_response_code(400); // Requête invalide
            echo json_encode(['message' => 'Action PUT non valide.']);
            break;
    }
}

// Gestion des requêtes DELETE
function handleDeleteRequest($endpoint, $id) {
    global $controller;

    switch ($endpoint) {
        case 'delete_trail':
            if ($id) {
                $result = $controller->delete($id);
                if ($result) {
                    http_response_code(200); // OK
                    echo json_encode(['message' => 'Sentier supprimé avec succès.']);
                } else {
                    http_response_code(500); // Erreur serveur
                    echo json_encode(['message' => 'Erreur lors de la suppression du sentier.']);
                }
            } else {
                http_response_code(400); // Requête invalide
                echo json_encode(['message' => 'ID de sentier requis.']);
            }
            break;
        default:
            http_response_code(400); // Requête invalide
            echo json_encode(['message' => 'Action DELETE non valide.']);
            break;
    }
}
