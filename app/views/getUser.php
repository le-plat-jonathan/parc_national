<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'utilisateur</title>
    <style>
        .hidden-password {
            font-family: 'Courier New', Courier, monospace;
            letter-spacing: 0.3em;
            background-color: #f3f3f3;
            color: transparent;
            text-shadow: 0 0 8px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body>
    <?php 
    if (!empty($data)) { ?>
        <ul>
            <li><strong>Nom d'utilisateur :</strong> <?php echo htmlspecialchars($data['username']); ?></li>
            <li><strong>Email :</strong> <?php echo htmlspecialchars($data['email']); ?></li>
            <li><strong>Mot de passe :</strong> <span class="hidden-password"><?php echo str_repeat('*', strlen($data['password'])); ?></span></li>
            <li><strong>Rôle :</strong> <?php echo htmlspecialchars($data['role']); ?></li>
            <li><strong>Créé le :</strong> <?php echo htmlspecialchars($data['created_at']); ?></li>
        </ul>
    <?php } else { ?>
        <p>Aucune donnée utilisateur disponible.</p>
    <?php } ?>
</body>
</html>
