<!DOCTYPE html>
<html>
<head>
    <title>Liste des sentiers</title>
</head>
<body>
  <p>Je suis dans la views getAll</p>

  <h1>Tous les sentiers</h1>

<?php if (!empty($trails)) : ?>  
    <?php foreach ($trails as $trail) : ?>  
        <h2>
            ID: <?= htmlspecialchars($trail['id']); ?> <br>
            Nom: <?= htmlspecialchars($trail['name']); ?> <br>
            Longueur: <?= htmlspecialchars($trail['length']); ?> km <br>
            Difficulté: <?= htmlspecialchars($trail['difficulty']); ?> <br>
            Longitude A: <?= htmlspecialchars($trail['longitude_A']); ?> <br>
            Latitude A: <?= htmlspecialchars($trail['latitude_A']); ?> <br>
            Longitude B: <?= htmlspecialchars($trail['longitude_B']); ?> <br>
            Latitude B: <?= htmlspecialchars($trail['latitude_B']); ?>
            <img src="<?= htmlspecialchars($trail['img']); ?>" alt=""> Image:  <br>
        </h2>
        <hr>
    <?php endforeach; ?>
<?php else : ?>
    <p>Aucun sentier trouvé.</p>
<?php endif; ?>
</body>
</html>



