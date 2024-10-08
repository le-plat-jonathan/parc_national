<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UpdatePointOfInterest</title>
</head>
    <?php

        $uri = $_SERVER['REQUEST_URI'];
        $urlForAction = str_replace('/views/pointOfInterest/addPointOfInterest.php', '/routes/pointOfInterestRoutes.php/updatePointOfInterest', $uri);
    ?>
<body>
    <?php if ($data) : ?>
        <form action="<?=$urlForAction?>" method="post">
        <label for="name">name</label>
        <input type="text" name="name" id="name" value=<?=$data['name']?>>

        <label for="name">Description</label>
        <input type="text" name="description" value="<?= htmlspecialchars($data['description'], ENT_QUOTES, 'UTF-8'); ?>">
        <label for="latitude">latitude</label>
        <input type="latitude" name="latitude" id="latitude" value=<?=$data['latitude']?>>

        <label for="longitude">longitude</label>
        <input type="text" name="longitude" id="longitude" value=<?=$data['longitude']?>>

        <input type="submit" value="post">
    </form>
    <?php else: echo 'Data non disponible' ?>
    <?php endif;?>
</body>
</html>