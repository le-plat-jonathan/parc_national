<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Bungalow</title>
</head>
<body>
<p>Test de vue </p>

<?php if (isset($data) && !empty($data)): ?>
    <?php var_dump($data); ?>
<?php else: ?>
    <p>Aucune donnée disponible.</p>
<?php endif; ?>

</body>
</html>