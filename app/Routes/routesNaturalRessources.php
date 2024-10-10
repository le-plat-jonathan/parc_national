<?php

include_once __DIR__ . '/../controllers/naturalRessourcesController.php';
require_once __DIR__ . '/../Helpers/verify_token.php';

$ressource = new NaturalRessourcesController();

$is_token_true = verify_token();

//Methode pour parser mon url 
$request_method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
$scriptName = $_SERVER['SCRIPT_NAME'];

$url = str_replace($scriptName, "", $uri);
$url = trim($url, "/");

$urlParsed = explode('/', $url );

$endPoint = isset($urlParsed[0]) ? $urlParsed[0] : "";
$id = isset($urlParsed[1]) ? $urlParsed[1] : "";

//Création de routes avec une méthode GET avec un switch selon différents endpoint dont on a besoin(avec getById, getByEnvironmentId, update, getAll)
if($request_method=== 'GET'){
  switch ($endPoint){
      case 'getRessourcesById':
      $ressource->getNaturalRessourcesById($id);
      break;
      case 'getRessourcesByEnvironmentId':
        $ressource->getNaturalRessourcesByEnvironmentId($id);
        break;
      case 'update_ressources':
        if($is_token_true){
          $ressource->update();}
          break;
      case 'getAllRessources':
          $ressource->getAllNaturalRessources();
          break;
          default:
          echo "Erreur 404: erreur de endpoint dans GET";
          exit;
  }
  // Création de routes avec une méthode POST et un switch comme pour le GET(create, update, delete)
  }else if($request_method==='POST' && $is_token_true){
      switch($endPoint){
          case 'create_ressources':
              $ressource->create();
              break;
          case 'update_ressources':
              $ressource->update((int)$id);
              break;
          case 'delete_ressources':
              $ressource->delete($_POST['id']);;
              break;
              defaut: 
              echo 'Erreur de endpoint dans POST';
              exit;
      }
  }else {
      echo 'Error request method';
  }