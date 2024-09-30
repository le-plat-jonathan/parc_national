<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GetNaturalRessourcesByEnvironmentId</title>
</head>
<body>
<h1>Détails des ressources naturelles par environnement</h1>
<?php if (!empty($ressources)) : ?>  
    <?php foreach ($ressources as $ressource) : ?>  
        <h2>
            ID: <?= htmlspecialchars($ressource['id']); ?> <br>
            Nom: <?= htmlspecialchars($ressource['name']); ?> <br>
            Description: <?= htmlspecialchars($ressource['description']); ?> km <br>
            Population: <?= htmlspecialchars($ressource['population']); ?> <br>
            Environment_id: <?= htmlspecialchars($ressource['environment_id']); ?> <br>
           <img src="<?= htmlspecialchars($ressource['img']); ?>" alt=""> Image:  <br>
          
        </h2>
        <hr>
    <?php endforeach; ?>
<?php else : ?>
    <p>Aucune ressource naturelle trouvé.</p>
<?php endif; ?>

</body>
</html>
