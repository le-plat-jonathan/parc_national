<?php

require 'vendor/autoload.php';
include_once 'cors.php';
include_once 'db.php';
include_once 'models/User.php';

// connexion à la BDD
try {
    $pdo = new PDO("mysql:host=localhost;dbname=parc_national;charset=utf8", 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit();
}

$request_method = $_SERVER['REQUEST_METHOD'];
$request_uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
$endpoint = isset($request_uri[1]) ? $request_uri[1] : '';
$id = isset($request_uri[2]) ? $request_uri[2] : null;

// Création des objets
$user = new User($pdo);

// gestion des requêtes en fonction de la méthode
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

// gestion des requêtes POST
function handlePostRequest($endpoint) {
    global $user;
    $input = json_decode(file_get_contents('php://input'), true);

    switch ($endpoint) {
        case 'register':
            echo json_encode($user->create($input['email'], $input['password'], $input['username']));
            break;  
        case 'login':
            echo json_encode(handleLoginRequest($input['email'], $input['password']));
            break;
        default:
            echo json_encode(['message' => 'Invalid POST action.']);
            break;
    }
}

// gestion de la connexion de l'utilisateur + JWT + session
function handleLoginRequest($email, $password) {
    global $user;

    if (!$email || !$password) {
        return ['message' => 'Invalid input data.'];
    }

    $result = $user->login($email, $password);

    if ($result) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['user_id'] = $result['id'];
        $_SESSION['username'] = $result['username'];

        return [
            'message' => 'Login successful.',
            'user_id' => $result['id'],
            'token' => $result['token']
        ];
    } else {
        return ['message' => 'Login failed.'];
    }
}

// gestion des requêtes GET
function handleGetRequest($endpoint, $id) {
    global $user;
    switch ($endpoint) {
        case 'get_user':
            echo json_encode($user->getById($id));
            break;
        default:
            echo json_encode(['message' => 'Invalid GET action.']);
            break;
    }
}

// gestion des requêtes PUT
function handlePutRequest($endpoint, $id) {
    global $user;
    $input = json_decode(file_get_contents('php://input'), true);

    switch ($endpoint) {
        case 'update_user':
            echo json_encode($user->update(
                $id, 
                $input['email'] ?? null, 
                $input['password'] ?? null, 
                $input['username'] ?? null
            ));
            break;
        default:
            echo json_encode(['message' => 'Invalid PUT action.']);
            break;
    }
}


// gestion des requêtes DELETE
function handleDeleteRequest($endpoint, $id) {
    global $user;

    switch ($endpoint) {
        case 'delete_user':
            echo json_encode($user->delete($id));
            break;
        default:
            echo json_encode(['message' => 'Invalid DELETE action.']);
            break;
    }
}
?>
