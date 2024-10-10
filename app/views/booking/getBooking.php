<?php
require_once __DIR__ . '/../../Helpers/verify_token.php';
$is_token_verify = verify_token();

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
        
        <section class="section section__booking">
        <h2 class="section__title">Reservation</h2>
            <p class="section__subtitle"></p>
            <div class="container container__booking">
                <div class="booking__calendar">
                <div class="booking__navigation" id="optCalendar">
    <button class="btn__nav__calendar" id="btn-less"> < </button> <span id="actualMonth"> Mois actuel </span> <button  class="btn__nav__calendar" id="btn-plus"> > </button>
    </div>
    <table id="calendar">
        <thead>
            <tr>
            <th scope="col">Di</th>
            <th scope="col">Lu</th>
            <th scope="col">Ma</th>
            <th scope="col">Me</th>
            <th scope="col">Je</th>
            <th scope="col">Ve</th>
            <th scope="col">Sa</th>
            </tr>
        </thead>
        <tbody id="body-calendar">

        </tbody>
    </table>
            </div>
            <div class="booking__room">
                <div class="room" id="chalet-1">La Maison du Soleil</div>
                <div class="room" id="chalet-2">Bungalow des Oliviers</div>
                <div class="room" id="chalet-3">Le Refuge Méditerranéen</div>
           </div>
        </div>
        <?php if ($is_token_verify): ?>
        <button class="button button__booking" type="submit" id="reserve">Reserver</button>
        <?php endif; ?>
        </section>
    </main>

    <!--==================== FOOTER ====================-->
    <footer class="footer section">
    <?php include $fileFooter; ?>
    </footer>

    <!--========== SCROLL UP ==========-->
    <a href="#" class="scrollup" id="scroll-up">
        <i class="ri-arrow-up-line scrollup__icon"></i>
    </a>

    <?php if (isset($data) && !empty($data)) : ?>
        <script>
            const reservedDays = <?php echo json_encode($data); ?>;
            localStorage.setItem('dates', JSON.stringify(reservedDays));
        </script>
    <?php endif; ?>
    <script src="<?= $fileScriptJs ?>"></script>
</body>

</html>