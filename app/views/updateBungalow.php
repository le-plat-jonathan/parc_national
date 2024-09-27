<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>updateBungalow</title>
</head>

    <?php
        $uri = $_SERVER['REQUEST_URI'];
        $urlForAction = str_replace('/views/addPointOfInterest.php', '/routes/pointOfInterestRoutes.php/createPointOfInterest', $uri);
    ?>

<body>
    <?php if($data): ?>
        <form action="<?=$urlForAction?>/<?=$id ?>" method="post">
            <label for="name">Name</label>
            <input type="text" value="<?= isset($data[0]['name']) ? $data[0]['name'] : "" ?>" name="name">

            <label for="description">Description</label>
            <input type="text" value="<?= isset($data[0]['description']) ? $data[0]['description'] : "" ?>" name="description">

            <label for="price">Price</label>
            <input type="number" value="<?= isset($data[0]['price']) ? $data[0]['price'] : "" ?>" name="price">

            <button type="submit">Envoyer</button>
        </form>
    <?php else: echo 'Data non disponible' ?>
    <?php endif; ?>    
</body>
</html>