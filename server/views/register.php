<?php

// Vérification que les données nécessaires sont disponibles
if (isset($data['message'], $data['token'])) {
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
    $token = $data['token'];

    // Stockage du token dans un cookie sécurisé et HTTP only
    setcookie('auth_token', $token, time() + (60 * 60), "/", "", false, true);
    echo "<h2>Votre compte a bien été créé avec les données suivantes :</h2>";
    echo "<p>Email : " . $email . "</p>";
    echo "<p>Nom d'utilisateur : " . $username . "</p>";
} else {
    echo "<p>Une erreur est survenue lors de la création du compte.</p>";
}
