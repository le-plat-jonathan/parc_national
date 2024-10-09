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
$fileBookingCss = $basePath . 'src/css/booking.css';
$fileSwipperCss = $basePath . 'src/css/swiper-bundle.min.css';
$fileScriptJs = $basePath . 'src/js/script.js';
$fileNavBar = __DIR__ . '/../navbar/navbar.php';
$fileFooter = __DIR__ . '/../footer/footer.php';
?>

<?php /*
<?php $fileStyleCss = str_replace($_SERVER['DOCUMENT_ROOT'], '', __DIR__ . '/../src/css/styles.css') ?>
<?php $fileBookingCss = str_replace($_SERVER['DOCUMENT_ROOT'], '', __DIR__ . '/../src/css/booking.css') ?>
<?php $fileSwipperCss = str_replace($_SERVER['DOCUMENT_ROOT'], '', __DIR__ . '/../src/css/booking.css') ?>
<?php $fileScriptJs = str_replace($_SERVER['DOCUMENT_ROOT'], '', __DIR__ . '/../src/js/script.js') ?>
<?= $fileStyleCss ?>
*/ ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="./../src/img/favicon.png" type="image/png">

    <!--=============== REMIXICONS ===============-->
   <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="<?= $fileSwipperCss ?>">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="<?= $fileStyleCss ?>">
    <link rel="stylesheet" href="<?= $fileBookingCss ?>">

    <title>Parc national des calanques</title>
</head>
<body>
           <header style="background-color: #15505B;" class="header" id="header">
                <?php include $fileNavBar; ?>
            </header>

    <main class="main">
      <br>
    <a href="http://localhost/parc_national/app/routes/routesNaturalRessources.php/getAllRessources">
    <button class="button">Redirection</button>
    </main>

    <!--==================== FOOTER ====================-->
    <footer class="footer section">
    <?php include $fileFooter; ?>
    </footer>

    <!--========== SCROLL UP ==========-->
    <a href="#" class="scrollup" id="scroll-up">
        <i class="ri-arrow-up-line scrollup__icon"></i>
    </a>
</body>

</html>