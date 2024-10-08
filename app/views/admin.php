<?php 

require_once './../Controllers/UserController.php';
require_once './../config/dotEnvLoader.php';

$user = new UserController();
$users = $user->getAllUsers();

// Déterminer le chemin de base en fonction de l'environnement
if (strpos($_SERVER['HTTP_HOST'], 'localhost:8000') !== false) {
    // Mac (localhost)
    $basePath = '/app/views/';
} else {
    // WAMP
    $basePath = '/parc_national/app/views/';
}

// Chemins des fichiers CSS et JS
$fileStyleCss = $basePath . 'src/css/styles.css';
$fileProfilCss = $basePath . 'src/css/profil.css';
$fileBookingCss = $basePath . 'src/css/booking.css';
$fileStyleConnexion = $basePath . '/src/css/connexion.css';
$fileSwipperCss = $basePath . 'src/css/swiper-bundle.min.css';
$fileScriptJs = $basePath . 'src/js/script.js';
$fileNavBar = __DIR__ . '/../navbar/navbar.php';
$fileFooter = __DIR__ . '/../footer/footer.php';

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="../src/img/favicon.png" type="image/png">

    <!--=============== REMIXICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="<?= $fileSwipperCss ?>">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="<?= $fileStyleCss ?>">
    <link rel="stylesheet" href="<?= $fileProfilCss ?>">
    <link rel="stylesheet" href="<?= $fileStyleConnexion ?>">

    <title>Parc national des calanques</title>
</head>
<body>
  <header style="background-color: #15505B;" class="header" id="header">
    <?php include "./navbar/navbar.php"; ?>
  </header>
        <div class='admin_title'>
            <h1>Administration des utilisateurs</h1>
        </div>

        <?php if (!empty($users['users'])): ?>
            <?php foreach ($users['users'] as $user): ?>
                <main class="main_admin">
                    <div class="user-info profil">
                        <div class="admin_info">
                            <div class='user_infos'>
                                <p><strong>Username:</strong> <?= htmlspecialchars($user['username']); ?></p>
                                <p><strong>Email:</strong> <?= htmlspecialchars($user['email']); ?></p>
                                <p><strong>Role:</strong> <?= htmlspecialchars($user['role']); ?></p>
                            </div>

                            <div class='admin_btn'>
                                <!-- Delete User Button -->
                                <form method="POST" action="../routes/userRoutes.php/delete_user" onsubmit="return confirm('Voulez-vous vraiment supprimer ce compte utilisateur ?');">
                                    <input type="hidden" name="id" value="<?= $user['id']; ?>">
                                    <button type="submit" class="button">Supprimer</button>
                                </form>

                                <!-- Update User Button -->
                                <form method="GET" action="../routes/userRoutes.php/update_user"  onsubmit="return confirm('Voulez-vous vraiment modifier ce compte utilisateur ?');">
                                    <input type="hidden" name="id" value="<?= $user['id']; ?>">
                                    <button type="submit" class="button">Modifier</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No users found.</p>
        <?php endif; ?>
  
  <footer class="footer section">
    <?php include "./footer/footer.php"; ?>
  </footer>

  <script src="src/js/main.js"></script>
</body>
</html>
