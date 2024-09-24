<?php

include_once __DIR__ . '/../controllers/naturalRessourcesController.php';

$ressource = new NaturalRessourcesController();

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
      case 'getRessourcesById':
      $ressource->getNaturalRessourcesById($id);
      break;
      case 'getRessourcesByEnvironmentId':
        $ressource->getNaturalRessourcesByEnvironmentId($id);
        break;
      case 'update_ressources':
          $ressource->update();
          break;
      case 'getAllRessources':
          $ressource->getAllNaturalRessources();
          break;
          default:
          echo "Erreur 404: erreur de endpoint dans GET";
          exit;
  }
  
  }else if($request_method==='POST'){
      switch($endPoint){
          case 'create_ressources':
              $ressource->create();
              break;
          case 'update_ressources':
              $ressource->update((int)$id);
              break;
          case 'delete_ressources':
              $ressource->delete($id);
              break;
              defaut: 
              echo 'Erreur de endpoint dans POST';
              exit;
      }
  }else {
      echo 'Error request method';
  }