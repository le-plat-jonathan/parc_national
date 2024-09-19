<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un sentier</title>
</head>
<body>
    <h1>Ajouter un nouveau sentier</h1>
    <form method="POST" action="/parc_national/server/routeTrail.php">
        <label for="name">Name : </label>
        <input type="text" id="name" name="name" required>
        <br>
        <label >Length :</label>
        <input type="text" id="length" name="length" required>
        <br>
        <label >Difficulty :</label>
        <input type="text" id="difficulty" name="difficulty" required>
        <br>
        <label >longitude_A :</label>
        <input type="text" id="longitude_A" name="longitude_A" required>
        <br>
        <label >latitude_A :</label>
        <input type="text" id="latitude_A" name="latitude_A" required>
        <br>
        <label >longitude_B :</label>
        <input type="text" id="longitude_B" name="longitude_B" required>
        <br>
        <label >latitude_B :</label>
        <input type="text" id="latitude_B" name="latitude_B" required>
        <br>
        <button type="submit">Publier un sentier</button>
    </form>
  
</body>
</html>


