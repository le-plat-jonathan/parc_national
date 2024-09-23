<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update a trail</title>
</head>
<body>
  <h1>Mise à jour des infos d'un sentier:</h1>
  <form action='/parc_national/server/routeTrail.php/update_trail' method="post">

  <label for="id">Id:</label>
    <input type="int" id="id" name="id" value="<?= htmlspecialchars($data['data']['id'] ?? ''); ?>" required>

    <label for="name">Nom:</label>
    <input type="text" id="name" name="name" value="<?= htmlspecialchars($data['data']['name'] ?? ''); ?>" required>

    <label for="length">Longueur:</label>
    <input type="text" id="length" name="length" value="<?= htmlspecialchars($data['data']['length'] ?? ''); ?>" required>

    <label for="difficulty">Difficulté:</label>
    <input type="text" id="difficulty" name="difficulty" value="<?= htmlspecialchars($data['data']['difficulty'] ?? ''); ?>" required>

    <label for="longitude_A">Longitude A:</label>
    <input type="text" id="longitude_A" name="longitude_A" value="<?= htmlspecialchars($data['data']['longitude_A'] ?? ''); ?>" required>

    <label for="latitude_A">Latitude A:</label>
    <input type="text" id="latitude_A" name="latitude_A" value="<?= htmlspecialchars($data['data']['latitude_A'] ?? ''); ?>" required>

    <label for="longitude_B">Longitude B:</label>
    <input type="text" id="longitude_B" name="longitude_B" value="<?= htmlspecialchars($data['data']['longitude_B'] ?? ''); ?>" required>

    <label for="latitude_B">Latitude B:</label>
    <input type="text" id="latitude_B" name="latitude_B" value="<?= htmlspecialchars($data['data']['latitude_B'] ?? ''); ?>" required>

    <button type="submit">Mettre à jour le sentier</button>
</form>
</body>
</html>
