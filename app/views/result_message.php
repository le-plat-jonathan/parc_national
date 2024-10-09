<?php
// Déterminer le chemin de base en fonction de l'environnement
if (strpos($_SERVER['HTTP_HOST'], 'localhost:8000') !== false) {
    // Mac (localhost)
    $basePathHere = '/app/';
} else {
    // WAMP
    $basePathHere = '/parc_national/app/';
}

// Chemins des fichiers CSS et JS
$fileStyleCss = $basePathHere . 'views/src/css/styles.css';
$fileBookingCss = $basePathHere . 'views/src/css/booking.css';
$fileSwipperCss = $basePathHere . 'views/src/css/swiper-bundle.min.css';
$fileScriptJs = $basePathHere . 'views/src/js/script.js';
$fileNavBar = __DIR__ . '/navbar/navbar.php';
$fileFooter = __DIR__ . '/footer/footer.php';
?>

<!DOCTYPE html>
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


    <title>Parc national des calanques</title>
</head>

<body>
    <header style="background-color: #15505B;" class="header" id="header">
    <?php include $fileNavBar; ?>
    </header>
    <main class="main">
        <div class="div_message_result">
            <?php if(isset($message)){ echo $message; } ?>
        </div>
    </main>

    <!--==================== FOOTER ====================-->
    <footer class="footer section">
    <?php include $fileFooter; ?>
    </footer>
    <!--=============== MAIN JS ===============-->
</body>

</html>