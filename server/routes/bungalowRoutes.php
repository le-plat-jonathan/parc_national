<?php 

require_once "../controllers/bungalowController.php";



$request_method = $_SERVER['REQUEST_METHOD'];

$request_uri = $_SERVER['REQUEST_URI'];
$script_name = $_SERVER['SCRIPT_NAME'];
$url = str_replace($script_name, "", $request_uri);
$url = trim($url, '/');

$urlParsed = explode('/', $url );
$endpoint = isset($urlParsed[0]) ? $urlParsed[0] : '';
$id = isset($urlParsed[1]) ? $urlParsed[1] : '';

$bungalow = new bungalowController();
echo '<pre>';
echo $request_uri;
echo '<br>';
echo $script_name;
echo '<br>';

switch ($request_method) {
    case 'GET':
        if($url === "getAllBungalow") {
            $bungalow->getAllBungalow();
            break;
    
        } else if  ($endpoint === 'getBungalowById' && $id!="") {
            $bungalow->getBungalowById($urlParsed[1]); // Passer l'ID en paramètre
            break;
        }
    
    
    
    case 'books/show':
        $controllerName = 'BookController';
        $methodName = 'show';
        echo 'route par defaut';
        break;
    
    default:
        // echo "404 - Page non trouvée";
        exit;
}


// function handleBungalowRequest ($method, $id=null) {

//     global $bungalow;

//     switch ($method){
//         case 'POST':
//         $input = json_decode(file_get_contents('php://input'), true);
//         $bungalow->createBungalow($input['name'], $input['description'], $input['price']);
//         echo json_encode(['message' => 'Bungalow created successfully']);
//         break;

//         case 'GET':
//         if ($id) {
//             $result = $bungalow->searchBungalow($id);
//             echo json_encode($result);
//             break;

//         } else {
//             $result = $bungalow->readBungalow();
//             echo json_encode($result);
//             break;

//         }

//         case 'PUT' :
//         $input = json_decode(file_get_contents('php://input'), true);
//         $bungalow->updateBungalow($id, $input['name'], $input['description'], $input['price']);
//         echo json_encode(['message' => 'Bungalow updated successfully']);
//         break;

//         case 'DELETE':
//             $bungalow->deleteBungalow($id);
//             echo json_encode(['message' => 'Bungalow deleted successfully']);
//             break;

//         default:
//             echo json_encode(['message' => 'Invalid request method for Bungalow.']);
//             break;
//     }

// }