
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GetTrailById</title>
</head>
<body>
  
<h1>Détails d'un sentier: </h1>

<?php if (!empty($data)) { ?>
<ul>
<li><strong>Nom du Sentier :</strong> <?php echo htmlspecialchars($data['name']); ?></li>
<li><strong>Longueur du parcours :</strong> <?php echo htmlspecialchars($data['length']); ?></li>
<li><strong>Difficulté du parcours :</strong> <?php echo htmlspecialchars($data['difficulty']); ?></li>
<li><strong>Longitude Départ :</strong> <?php echo htmlspecialchars($data['longitude_A']); ?></li>
<li><strong>Latitude Départ :</strong> <?php echo htmlspecialchars($data['latitude_A']); ?></li>
<li><strong>Longtiude Arrivée :</strong> <?php echo htmlspecialchars($data['longitude_B']); ?></li>
<li><strong>Latitude Arrivée :</strong> <?php echo htmlspecialchars($data['latitude_B']); ?></li>
</ul>
<?php } else { ?>
        <p>Aucune donnée sur le sentier disponible.</p>
    <?php } ?>

</body>
</html>

