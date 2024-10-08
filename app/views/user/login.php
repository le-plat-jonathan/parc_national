<?php

session_start();

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
$fileBookingCss = $basePath . 'src/css/booking.css';
$fileStyleConnexion = $basePath . '/src/css/connexion.css';
$fileSwipperCss = $basePath . 'src/css/swiper-bundle.min.css';
$fileScriptJs = $basePath . 'src/js/script.js';
$fileNavBar = __DIR__ . '/../navbar/navbar.php';
$fileFooter = __DIR__ . '/../footer/footer.php';

// Afficher le message d'alerte s'il existe
if (isset($_SESSION['alert'])) {
    echo "<script>alert('{$_SESSION['alert']}');</script>";
    // Effacer le message de la session après l'avoir affiché
    unset($_SESSION['alert']);
}
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
        <link rel="stylesheet" href="<?= $fileStyleConnexion ?>">

        <title>Parc national des calanques</title>
    </head>

    <body>
        <header style="background-color: #15505B;" class="header" id="header">
            <?php include "./../navbar/navbar.php"; ?>
        </header>

        <main class="main">
            <section class="section section__login">
                <form action="../../Routes/userRoutes.php/login" class="form form__login" method='post'>
                    <h2>Connexion</h2>
                    <div class="form__row">
                        <label>Email</label>
                        <input name="email" id="email" type="email">
                    </div>
                    <div class="form__row">
                        <label>Mot de passe</label>
                        <input name="password" id="password" type="password">
                    </div>
                    <button style="width: 100%;" class="button">Se connecter</button>
                    <p>Vous n'avez pas encore de compte?<a href='./../user/register.php'> Créez-en un!</a></p>
                </form>
            </section>
        </main>

        <!--==================== FOOTER ====================-->
        <footer class="footer section">
            <?php include "./../footer/footer.php"; ?>
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
