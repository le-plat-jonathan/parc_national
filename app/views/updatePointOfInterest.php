<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UpdatePointOfInterest</title>
</head>
<body>
    <form action="/parc_national/app/routes/pointOfInterestRoutes.php/updatePointOfInterest/<?=$data['id']?>" method="post">
        <label for="name">name</label>
        <input type="text" name="name" id="name" value=<?=$data['name']?>>

        <label for="name">Description</label>
        <textarea  type="text" name="description" id="description" value=<?$data['description']?>></textarea>

        <label for="latitude">latitude</label>
        <input type="latitude" name="latitude" id="latitude" value=<?=$data['latitude']?>>

        <label for="longitude">longitude</label>
        <input type="text" name="longitude" id="longitude" value=<?=$data['longitude']?>>

        <input type="submit" value="post">
    </form>
</body>
</html>