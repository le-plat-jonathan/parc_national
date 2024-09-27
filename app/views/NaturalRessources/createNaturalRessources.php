<!DOCTYPE html>
<html>
<head>
    <title>Ajouter une ressource naturelle</title>
</head>
<body>
    <h1>Ajouter une nouvelle ressource naturelle</h1>
    <form method="POST" action="/parc_national/app/routes/routesNaturalRessources.php/create_ressources">
        <label for="name">Name : </label>
        <input type="text" id="name" name="name" required>
        <br>
        <label >Description :</label>
        <textarea type="text" id="description" name="description" required></textarea>
        <br>
        <label >Population :</label>
        <input type="text" id="population" name="population" required>
        <br>
        <label >Environment_id :</label>
        <input type="text" id="environment_id" name="environment_id" required>
        <br>
        <button type="submit">Publier une ressource naturelle</button>
    </form>
  
</body>
</html>


