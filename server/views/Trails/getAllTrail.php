<!DOCTYPE html>
<html>
<head>
    <title>Liste des sentiers</title>
</head>
<body>
  <?php var_dump($trails) ?>
   
</body>
</html>


<?php /* ?>

<h1>Tous les sentiers</h1>
    <?php if (!empty($trails)) : ?>
        <?php foreach ($trails as $trail) : ?>
            <h2><?= htmlspecialchars($trail['id']); ?> <?= htmlspecialchars($trail['name']); ?> <?= htmlspecialchars($trail['length']); ?> <?= htmlspecialchars($trail['difficulty']); ?></h2>
        <?php endforeach; ?>
    <?php else : ?>
        <p>Aucun sentier trouvé.</p>
    <?php endif; ?>

    <?php */ ?>