<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GetNaturalRessourcesById</title>
</head>
<body>
  
<h1>Détails des ressources naturelles</h1>
<?php if (!empty($ressource)) { ?>
<ul>
    <li><strong>Nom :</strong> <?= htmlspecialchars($ressource['name']); ?></li>
    <li><strong>Description :</strong> <?= htmlspecialchars($ressource['description']); ?></li>
    <li><strong>Population :</strong> <?= htmlspecialchars($ressource['population']); ?></li>
    <li><strong>Environment_id:</strong> <?= htmlspecialchars($ressource['environment_id']); ?></li>
</ul>
<?php } else { ?>
    <p>Aucune donnée sur les ressources naturelles disponible.</p>
<?php } ?>

</body>
</html>
