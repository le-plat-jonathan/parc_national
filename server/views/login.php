<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action='/routes/userRoutes.php/login' method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" id='email'></input>
        <br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id='password'></input>
        <br><br>
        <button type='submit'>Se connecter</button>
    </form>
</body>
</html>

<?php
// On attend que le formulaire soit envoyé avant d'exécuter le php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérification que les données nécessaires sont disponibles
    if (isset($data['message'], $data['token'])) {
        $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
        $token = $data['token'];

        // Stockage du token dans un cookie sécurisé et HTTP only
        setcookie('auth_token', $token, time() + (60 * 60), "/", "", false, true);
    } else {
        echo "<p>Une erreur est survenue lors de la connexion.</p>";
    }
}
