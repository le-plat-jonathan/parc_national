<?php
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

    <style>
      
    </style>

    <title>Parc national des calanques</title>
</head>

<body>
    <header style="background-color: #15505B;" class="header" id="header">
        <?php include $fileNavBar; ?>
    </header>

    <main class="main">
        <div class="user-info profil">
            <?php if (!empty($data)) { ?>
                <h2>Informations de l'utilisateur</h2>
                <p><strong>Nom d'utilisateur :</strong> <?php echo htmlspecialchars($data['username']); ?></p>
                <p><strong>Email :</strong> <?php echo htmlspecialchars($data['email']); ?></p>
                <p><strong>Compte créé le :</strong> <?php echo htmlspecialchars($data['created_at']); ?></p>
                <a href="../../../views/user/updateUser.php" class="button">Modifier mon profil</a>
            <?php } else { ?>
                <p>Aucune donnée utilisateur disponible.</p>
            <?php } ?>
        </div>
    </main>

    <!--==================== FOOTER ====================-->
    <footer class="footer section">
        <?php include $fileFooter; ?>
    </footer>

    <!--========== SCROLL UP ==========-->
    <a href="#" class="scrollup" id="scroll-up">
        <i class="ri-arrow-up-line scrollup__icon"></i>
    </a>

    <!--=============== SCROLL REVEAL===============-->
    <script src="/parc_national/app/views/src/js/scrollreveal.min.js"></script>

    <!--=============== SWIPER JS ===============-->
    <script src="/parc_national/app/views/src/js/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="/parc_national/app/views/src/js/main.js"></script>

</body>
</html>

