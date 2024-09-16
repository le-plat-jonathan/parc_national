<?php

include_once "./models/Trail.php"; 
include_once './cors.php';
include_once './db.php';

// connexion à la db
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

$trail= new Trail ($pdo);


