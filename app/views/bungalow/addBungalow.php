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
        $urlForAction = str_replace('/views/bungalow/addBungalow.php', '/routes/bungalowRoutes.php/addBungalow', $uri);
    ?>
<body>
    <form action="<?=$urlForAction?>" method="post">
        <label for="name">name</label>
        <input type="text" name="name" id="nameBungalow">
        <label for="description">description</label>
        <input type="text" name="description" id="descriptionBungalow">
        <label for="price">price</label>
        <input type="number" name="price" id="priceBungalow">
        <input type="submit" value="post">
    </form>
</body>
</html>