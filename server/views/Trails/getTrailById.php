<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GetTrailById</title>
</head>
<body>
  
<h1>Détails du sentier</h1>

<?php if (!empty($data)) { ?>
<ul>
    <li><strong>Nom :</strong> <?= htmlspecialchars($data['name']); ?></li>
    <li><strong>Longueur :</strong> <?= htmlspecialchars($data['length']); ?></li>
    <li><strong>Difficulté :</strong> <?= htmlspecialchars($data['difficulty']); ?></li>
    <li><strong>Longitude A :</strong> <?= htmlspecialchars($data['longitude_A']); ?></li>
    <li><strong>Latitude A :</strong> <?= htmlspecialchars($data['latitude_A']); ?></li>
    <li><strong>Longitude B :</strong> <?= htmlspecialchars($data['longitude_B']); ?></li>
    <li><strong>Latitude B :</strong> <?= htmlspecialchars($data['latitude_B']); ?></li>
</ul>
<?php } else { ?>
    <p>Aucune donnée sur le sentier disponible.</p>
<?php } ?>

</body>
</html>
