<?php
// Déterminer le chemin de base en fonction de l'environnement
if (strpos($_SERVER['HTTP_HOST'], 'localhost:8000') !== false) {
    // Mac (localhost)
    $basePathView = '/app/views/';
    $basePathRoute = '/app/routes/';
    $pathRouteGetNaturalRessourcesById = '/app/Routes/routesNaturalRessources.php/getRessourcesByEnvironmentId/';
} else {
    // WAMP
    $basePathView = '/parc_national/app/views/';
    $pathRouteGetNaturalRessourcesById = '/parc_national/app/Routes/routesNaturalRessources.php/getRessourcesByEnvironmentId/';

}

// Chemins des fichiers CSS et JS
$fileStyleCss = $basePathView . 'src/css/styles.css';
$fileNaturelleCss = $basePathView . 'src/css/naturelle.css';
$fileBookingCss = $basePathView . 'src/css/booking.css';
$fileSwipperCss = $basePathView . 'src/css/swiper-bundle.min.css';
$fileScriptJs = $basePathView . 'src/js/script.js';
$fileNavBar = __DIR__ . '/../navbar/navbar.php';
$fileFooter = __DIR__ . '/../footer/footer.php';
?>

<!DOCTYPE html>
<html lang="fr">

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="src/img/favicon.png" type="image/png">

    <!--=============== REMIXICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="<?= $fileSwipperCss ?>">

<!--=============== CSS ===============-->
<link rel="stylesheet" href="<?= $fileStyleCss ?>">
<link rel="stylesheet" href="<?= $fileNaturelleCss ?>">


    <title>Parc national des calanques</title>
</head>


<body>
    <header style="background-color: #15505B;" class="header" id="header">
    <?php include $fileNavBar; ?>
    
    </header>

    <main class="main">
        <section class="section section__trails">
            <h2 class="section__title">Ressources naturelles</h2>
            <p class="section__subtitle">Découvrez les magnifiques espèces des calanques de Marseille.</p>
            <div class="container container__trails">
                <div class="trails__filter gap">
                    <div>
                        <a href="<?=$pathRouteGetNaturalRessourcesById?>2" class="display_env">
                            <img src='<?=$basePathView?>src/img/dauphin.jpg' alt="faune marine" class="env_selector">
                            <p class='env_selector_text'>Faune marine</p>
                        </a>
                    </div>
                    <div>
                        <a href="<?=$pathRouteGetNaturalRessourcesById?>1" class="display_env">
                            <img src='<?=$basePathView?>src/img/aigle-faune.jpg' alt="faune terrestre"class="env_selector">
                            <p class='env_selector_text'>Faune terrestre</p>
                        </a>
                    </div>
                    <div>
                        <a href="<?=$pathRouteGetNaturalRessourcesById?>3" class="display_env">
                            <img src='<?=$basePathView?>src/img/ciste.jpg' alt="Flore terrestre"class="env_selector">
                            <p class='env_selector_text'>Flore terrestre</p>
                        </a>
                    </div>
                </div>
            </div>
        </section>

    </main>


    <!--==================== FOOTER ====================-->
    <footer class="footer section">
    <?php include $fileFooter ?>
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
    <!--=============== SWIPER JS ===============-->
    <script src="/parc_national/app/views/src/js/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="/parc_national/app/views/src/js/main.js"></script>
</body>


</html>