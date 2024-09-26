<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>addPointOfInterest</title>
</head>

<body>
    <form action="/parc_national/app/routes/pointOfInterestRoutes.php/createPointOfInterest" method="post">
        <label for="name">name</label>
        <input type="text" name="name" id="name">

        <label for="name">Description</label>
       <textarea  type="text" name="description" id="description"></textarea>

        <label for="latitude">Latitude</label>
        <input type="latitude" name="latitude" id="latitude">
        
        <label for="longitude">Longitude</label>
        <input type="text" name="longitude" id="longitude">

        <input type="submit" value="post">
    </form>
</body>
</html>