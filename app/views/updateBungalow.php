<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if($data): ?>
        <form action="/routes/bungalowRoutes.php/updateBungalow/<?= $id ?>" method="post">
            <label for="name">Name</label>
            <input type="text" value="<?= isset($data[0]['name']) ? $data[0]['name'] : "" ?>" name="name">

            <label for="description">Description</label>
            <input type="text" value="<?= isset($data[0]['description']) ? $data[0]['description'] : "" ?>" name="description">

            <label for="price">Price</label>
            <input type="number" value="<?= isset($data[0]['price']) ? $data[0]['price'] : "" ?>" name="price">

            <button type="submit">Envoyer</button>
        </form>
    <?php endif; ?>    
</body>
</html>