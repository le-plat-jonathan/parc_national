<?php
//require_once './vendor/autoload.php';
//include_once './cors.php';
include_once __DIR__ . '/controllers/trailController.php';
//require_once './models/Database.php';

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


// switch ($request_method) {
//     case 'GET':
//         if ($endpoint === 'getTrailById' && $id) {
//             $trail->getTrailById($id);
//         } else {
//             $trail->getAllTrail();
//         }
//         break;
//         case 'POST':
//             if($endpoint=== 'create_trail'){
//                 $trail->create();
//             } else {
//                 echo 'Creation error';
//             }
//             break;
//             if ($endpoint === 'update_trail' && $id) {
//                 // Récupérer les données du formulaire
//                 $name = $_POST['name'] ?? '';
//                 $length = $_POST['length'] ?? '';
//                 $difficulty = $_POST['difficulty'] ?? '';
//                 $longitude_A = $_POST['longitude_A'] ?? '';
//                 $latitude_A = $_POST['latitude_A'] ?? '';
//                 $longitude_B = $_POST['longitude_B'] ?? '';
//                 $latitude_B = $_POST['latitude_B'] ?? '';
    
//                 // Appeler la méthode de mise à jour
//                 $trail->update($id, $name, $length, $difficulty, $longitude_A, $latitude_A, $longitude_B, $latitude_B);
//             } else{
//                 echo 'update error';
//             }
//             break;
//         case 'DELETE': 
//             if($endpoint=== 'delete_trail'){
//                 $trail->delete($id);
//             } else{
//                 echo 'delete error';
//             }
           
//             break;
//     default:
//         echo "Erreur 404: Route non trouvée";
//         exit;
// }


// Vérifier si la requête concerne les routes utilisateurs
/*
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
*/