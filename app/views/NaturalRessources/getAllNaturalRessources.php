<!DOCTYPE html>
<html>
<head>
    <title>Liste des ressources naturelles</title>
</head>
<body>
 

  <h1>Toutes les ressources naturelles :</h1>

<?php if (!empty($ressources)) : ?>  
    <?php foreach ($ressources as $ressource) : ?>  
        <h2>
            ID: <?= htmlspecialchars($ressource['id']); ?> <br>
            Nom: <?= htmlspecialchars($ressource['name']); ?> <br>
            Description: <?= htmlspecialchars($ressource['description']); ?> km <br>
            Population: <?= htmlspecialchars($ressource['population']); ?> <br>
            Environment_id: <?= htmlspecialchars($ressource['environment_id']); ?> <br>
          
        </h2>
        <hr>
    <?php endforeach; ?>
<?php else : ?>
    <p>Aucune ressource naturelle trouvé.</p>
<?php endif; ?>
</body>
</html>



