<?php
require_once './config/dotEnvLoader.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
    echo '<pre>';
    var_dump($_COOKIE);
    echo '</pre>';

    $secretKey = "0aee078e548a963e3d8f234bb0c891dc425df7794279d985a5566bd70720565f";

    $decoded = JWT::decode($_COOKIE['auth_token'], new Key($secretKey, 'HS256'));
    echo '<pre>';
    var_dump($decoded);
    echo '</pre>';
?>