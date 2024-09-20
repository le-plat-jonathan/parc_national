<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>addBungalow</title>
</head>

<body>
    <form action="/routes/bungalowRoutes.php/addBungalow" method="post">
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