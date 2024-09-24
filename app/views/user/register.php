<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['email'], $_POST['password'], $_POST['username'])) {
        $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
        $username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
        $token = bin2hex(random_bytes(16));

        setcookie('auth_token', $token, time() + (60 * 60), "/", "", false, true);
        echo "<h2>Votre compte a bien été créé avec les données suivantes :</h2>";
        echo "<p>Email : " . $email . "</p>";
        echo "<p>Nom d'utilisateur : " . $username . "</p>";
    } else {
        echo "<p>Erreur : données du formulaire manquantes.</p>";
    }
} else {
    ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Inscription</title>
        </head>
        <body>
            <form action="/routes/userRoutes.php/register" method="post">
                <label for="username">Username:</label>
                <input type="text" name="username" id='username' required>
                <br><br>
                <label for="email">Email:</label>
                <input type="email" name="email" id='email' required>
                <br><br>
                <label for="password">Password:</label>
                <input type="password" name="password" id='password' required>
                <br><br>
                <button type='submit'>S'inscrire</button>
            </form>
        </body>
        </html>
    <?php
}
?>
