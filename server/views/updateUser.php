<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action='/routes/userRoutes.php/update_user' method="put">
        <label for="username">Username:</label>
        <input type="text" name="username" id='username'></input>
        <br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id='email'></input>
        <br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id='password'></input>
        <br><br>
        <button type='submit'>Mettre à jour</button>
    </form>
</body>
</html>

<?php
// On attend que le formulaire soit envoyé avant d'exécuter le php
    if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    // Vérification que les données nécessaires sont disponibles
    if (isset($data['message'])) {
        echo "<p>Modification effectuée avec succès</p>";
    } else {
        echo "<p>Une erreur est survenue lors de la modification des informations du compte.</p>";
    }
}