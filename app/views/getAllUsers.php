<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>
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
    if (!empty($users)) { ?>
        <ul>
            <?php foreach ($users as $user) { ?>
                <li><strong>Nom d'utilisateur :</strong> <?php echo htmlspecialchars($user['username']); ?></li>
                <li><strong>Email :</strong> <?php echo htmlspecialchars($user['email']); ?></li>
                <li><strong>Mot de passe :</strong> <span class="hidden-password"><?php echo str_repeat('*', strlen($user['password'])); ?></span></li>
                <li><strong>Rôle :</strong> <?php echo htmlspecialchars($user['role']); ?></li>
                <li><strong>Créé le :</strong> <?php echo htmlspecialchars($user['created_at']); ?></li>
                <hr>
            <?php } ?>
        </ul>
    <?php } else { ?>
        <p>Aucun utilisateur trouvé.</p>
    <?php } ?>
</body>
</html>
