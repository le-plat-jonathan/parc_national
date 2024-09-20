<?php 

require_once __DIR__ . '/../models/Bungalow.php';

$request_uri = $_SERVER['REQUEST_URI'];
$script_name = $_SERVER['SCRIPT_NAME'];
$url = str_replace($script_name, "", $request_uri);
$url = trim($url, '/');

$urlParsed = explode('/', $url );
$id = $urlParsed[0];
$valid_id = false;

$bungalow = new Bungalow();
if ($id != "") {
    $data = $bungalow->getBungalowById($id);

    if (!empty($data)) {
        $valid_id = true;
    } else {
        echo 'Aucun bungalow trouvé avec cet ID';
    }
} else {
    echo 'ID MANQUANT';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if($valid_id): ?>
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