<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action='/routes/userRoutes.php/login' method="post">
        <label for="id">ID de l'utilisateur que vous souhaitez supprimer:</label>
        <input type="number" name="id" id='id'></input>
        <br><br>
        <button type='submit'>Supprimer l'utilisateur</button>
    </form>
</body>
</html>

<?php

// On attend que le formulaire soit envoyé avant d'exécuter le php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérification que les données nécessaires sont disponibles
    if (isset($data['message'])) {
        echo "<p>Le compte a bien été supprimé</p>";
    } else {
        echo "<p>Une erreur est survenue lors de la suppréssion du compte.</p>";
    }
}