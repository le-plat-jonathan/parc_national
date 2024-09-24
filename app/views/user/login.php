<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($data['email'], $data['token'])) {
        $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
        $token = $data['token'];
        setcookie('auth_token', $data['token'], time() + (60 * 60), "/", "", false, true);
    } else {
        echo "<p>Une erreur est survenue lors de la connexion.</p>";
    }
} else {
    ?>
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
}
?>