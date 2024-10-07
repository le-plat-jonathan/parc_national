<?php

require_once __DIR__ . './../vendor/autoload.php';
require_once  __DIR__ . './../Helpers/cors.php';
require_once  __DIR__ . './../Controllers/UserController.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$request_method = $_SERVER['REQUEST_METHOD'];

$request_uri = $_SERVER['REQUEST_URI'];
$script_name = $_SERVER['SCRIPT_NAME'];
$url = str_replace($script_name, "", $request_uri);
$url = trim($url, '/');

$urlParsed = explode('/', $url );
$endpoint = isset($urlParsed[0]) ? $urlParsed[0] : '';
$id = isset($urlParsed[1]) ? $urlParsed[1] : '';

$user = new UserController();

// Vérifier si la requête concerne les routes utilisateurs
if (in_array($endpoint, ['register', 'login', 'get_user', 'update_user', 'delete_user', 'get_all_users'])) {
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
    global $user;
    
    if ($_SERVER['CONTENT_TYPE'] === 'application/json') {
        $input = json_decode(file_get_contents('php://input'), true);
    } else {
        $input = $_POST;
    }
    
    switch ($endpoint) {
        case 'register':
            echo json_encode($user->register($input['email'], $input['password'], $input['confirmPassword'], $input['username']));
            header('Location: ../../views/user/login.php');
            exit();    
            break;  
        case 'login':
            echo json_encode(handleLoginRequest($input['email'], $input['password']));
            break;
        default:
            echo json_encode(['message' => 'Invalid POST action.']);
            break;
    }
}

// Gestion de la connexion de l'utilisateur + JWT + session
function handleLoginRequest($email, $password) {
    global $user;

    if (!$email || !$password) {
        return ['message' => 'Invalid input data.'];
    }

    $result = $user->login($email, $password);
    if (isset($result['token'])) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['user_id'] = $result['id'];
        $_SESSION['username'] = $result['username'];

        setcookie('auth_token', $result['token'], time() + (60 * 60), "/", "", false, true);

        header('Location: ../../views/index.php');
        exit();

    } else {
        return ['message' => 'Login failed.'];
    }
}


// Gestion des requêtes GET
function handleGetRequest($endpoint, $id) {
    global $user;
    switch ($endpoint) {
        case 'get_user':
            $user->getUserById($id);
            break;
        case 'get_all_users':
            $user->getAllUsers();
            break;
        default:
            echo json_encode(['message' => 'Invalid GET action.']);
            break;
    }
}

// Gestion des requêtes PUT
function handlePutRequest($endpoint, $id) {
    global $user;

    if ($_SERVER['CONTENT_TYPE'] === 'application/json') {
        $input = json_decode(file_get_contents('php://input'), true);
    } else {
        $input = $_PUT;
    }

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

// Gestion des requêtes DELETE
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