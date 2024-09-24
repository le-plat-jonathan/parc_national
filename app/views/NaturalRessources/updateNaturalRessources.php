<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update a ressourcel</title>
</head>
<body>
  <h1>Mise à jour des infos d'une ressource:</h1>
  <form action='/parc_national/app/routes/routesNaturalRessources.php/update_ressources' method="post">

  <label for="id">Id:</label>
    <input type="int" id="id" name="id" value="<?= htmlspecialchars($data['data']['id'] ?? ''); ?>" required>

    <label for="name">Nom:</label>
    <input type="text" id="name" name="name" value="<?= htmlspecialchars($data['data']['name'] ?? ''); ?>" required>

    <label for="length">Description:</label>
    <textarea type="text" name="description" id="description" value="<?= htmlspecialchars($data['data']['description'] ?? '');?>" required></textarea>
  
    <label for="population">Population:</label>
    <input type="text" id="population" name="population" value="<?= htmlspecialchars($data['data']['population'] ?? ''); ?>" required>

    <label for="environment_id">Environment_id:</label>
    <input type="text" id="environment_id" name="environment_id" value="<?= htmlspecialchars($data['data']['environment_id'] ?? ''); ?>" required>

    <button type="submit">Mettre à jour la ressource</button>
</form>
</body>
</html>
