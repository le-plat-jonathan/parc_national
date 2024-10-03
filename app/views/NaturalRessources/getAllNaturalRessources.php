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
$fileNaturelleCss = $basePath . 'src/css/naturelle.css';
$fileBookingCss = $basePath . 'src/css/booking.css';
$fileSwipperCss = $basePath . 'src/css/swiper-bundle.min.css';
$fileScriptJs = $basePath . 'src/js/script.js';
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
        <p class="section__subtitle">Découvrez les magnifiques especes des calanques de Marseille.</p>
        <div class="container container__trails">
            <div class="trails__filter">
                <div class="filter__box">
                    <p>Faune marine</p>
                </div>
                <div class="filter__box">
                    <p>Faune terrestre</p>
                </div>
                <div class="filter__box">
                    <p>Flore</p>
                </div>
            </div>
            <div class="flex">

            <?php
            foreach ($data as $ressource) {
            ?>
                <div class="discover__card swiper-slide">
                    <img src="<?= htmlspecialchars($ressource['img']); ?>" alt="" class="discover__img">
                    <div class="discover__data">
                        <h2 class="discover_title"><?= htmlspecialchars($ressource['name']); ?></h2>
                    </div>
                </div>
            <?php
            }
            ?>
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