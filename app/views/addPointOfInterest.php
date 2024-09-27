<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>addBungalow</title>
</head>
<?php

 $uri = $_SERVER['REQUEST_URI'];
 $scriptName = $_SERVER['SCRIPT_NAME'];
 $urlForAction = str_replace('/views/addPointOfInterest.php', '/routes/pointOfInterestRoutes.php/createPointOfInterest', $uri);

?>
<body>
    <form action="<?= $urlForAction ?>"  method="post">
        <label for="name">name</label>
        <input type="text" name="name" id="name">

        <label for="longitude">longitude</label>
        <input type="text" name="longitude" id="longitude">

        <label for="latitude">latitude</label>
        <input type="latitude" name="latitude" id="latitude">

        <input type="submit" value="post">
    </form>
</body>
</html>