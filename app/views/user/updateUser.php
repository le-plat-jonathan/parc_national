<?php

require_once __DIR__ . '/../../config/dotEnvLoader.php';

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
        <?php include $fileNavBar; ?>
    </header>

    <main class="main updateProfil">
        <div class="user-info">
            <form action="../../Routes/userRoutes.php/update_user" method="POST">
                <input type="hidden" name="id" value="<?= $userId; ?>">
                <div>
                    <label for="username">Nom d'utilisateur :</label><br>
                    <input type="text" id="username" name="username" class="input_update">
                </div>
                <div>
                    <label for="email">Email :</label><br>
                    <input type="email" id="email" name="email" class="input_update">
                </div>
                <div>
                    <label for="password">Mot de passe :</label><br>
                    <input type="password" id="password" name="password" class="input_update">
                </div>
                <div>
                    <label for="confirmPassword">Confirmez le mot de passe :</label><br>
                    <input type="password" id="confirmPassword" name="confirmPassword" class="input_update">
                </div>
                <div>
                    <button class="button" type="submit">Enregistrer</button>
                </div>
            </form>
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

