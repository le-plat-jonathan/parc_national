<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>addBungalow</title>
</head>

<body>
    <form action="/routes/pointOfInterestRoutes.php/createPointOfInterest" method="post">
        <label for="name">name</label>
        <input type="text" name="name" id="name">

        <label for="longitude">description</label>
        <input type="text" name="longitude" id="longitude">

        <label for="latitude">price</label>
        <input type="latitude" name="latitude" id="latitude">

        <input type="submit" value="post">
    </form>
</body>
</html>