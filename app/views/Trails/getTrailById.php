<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GetTrailById</title>
</head>
<body>
  
<h1>Détails du sentier</h1>
<?php if (!empty($trail)) { ?>
   
<ul>
    <li><strong>Nom :</strong> <?= htmlspecialchars($trail['name']); ?></li>
    <li><strong>Longueur :</strong> <?= htmlspecialchars($trail['length']); ?></li>
    <li><strong>Difficulté :</strong> <?= htmlspecialchars($trail['difficulty']); ?></li>
    <li><strong>Longitude A :</strong> <?= htmlspecialchars($trail['longitude_A']); ?></li>
    <li><strong>Latitude A :</strong> <?= htmlspecialchars($trail['latitude_A']); ?></li>
    <li><strong>Longitude B :</strong> <?= htmlspecialchars($trail['longitude_B']); ?></li>
    <li><strong>Latitude B :</strong> <?= htmlspecialchars($trail['latitude_B']); ?></li>
</ul>
<?php } else { ?>
    <p>Aucune donnée sur le sentier disponible.</p>
<?php } ?>

</body>
</html>
