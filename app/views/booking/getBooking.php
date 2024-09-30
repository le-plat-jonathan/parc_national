<?php
// Déterminer le chemin de base en fonction de l'environnement
if (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false) {
    // Mac (localhost)
    $basePath = '/views/';
} else {
    // WAMP
    $basePath = '/parc_national/app/views/';
}

// Chemins des fichiers CSS et JS
$fileStyleCss = $basePath . 'src/css/styles.css';
$fileBookingCss = $basePath . 'src/css/booking.css';
$fileSwipperCss = $basePath . 'src/css/swiper-bundle.min.css';
$fileScriptJs = $basePath . 'src/js/script.js';
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
        <nav class="nav container">
            <a href="#" class="nav__logo">Parc National Des Calanques</a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="./index.html" class="nav__link active-link">Home</a>
                    </li>
                    <li class="nav__item">
                        <a href="../../routes/routeTrail.php/getAllTrail" class="nav__link">Nos sentiers</a>
                    </li>
                    <li class="nav__item">
                        <a href="../../routes/bookingRoutes.php/getAllBooking" class="nav__link">Camping’s</a>
                    </li>
                    <li class="nav__item">
                        <a href="../../routes/routesNaturalRessources.php/getAllRessources" class="nav__link">Ressources naturelles</a>
                    </li>

                    <li class="nav__item">
                        <a href="../../routes/userRoutes.php/login" class="nav__link">Connexion</a>
                    </li>
                </ul>

                <div class="nav__dark">
                    <!-- Theme change button -->
                    <span class="change-theme-name">Dark mode</span>
                    <i class="ri-moon-line change-theme" id="theme-button"></i>
                </div>

                <i class="ri-close-line nav__close" id="nav-close"></i>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class="ri-function-line"></i>
            </div>
        </nav>
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
        <button class="button button__booking" type="submit" id="reserve">Reserver</button>
        </section>
    </main>

    <!--==================== FOOTER ====================-->
    <footer class="footer section">
        <div class="footer__container container grid">
            <div class="footer__content grid">
                <div class="footer__data">
                    <h3 class="footer__title">Travel</h3>
                    <p class="footer__description">Travel you choose the <br> destination,
                        we offer you the <br> experience.
                    </p>
                    <div>
                        <a href="https://www.facebook.com/" target="_blank" class="footer__social">
                            <i class="ri-facebook-box-fill"></i>
                        </a>
                        <a href="https://twitter.com/" target="_blank" class="footer__social">
                            <i class="ri-twitter-fill"></i>
                        </a>
                        <a href="https://www.instagram.com/" target="_blank" class="footer__social">
                            <i class="ri-instagram-fill"></i>
                        </a>
                        <a href="https://www.youtube.com/" target="_blank" class="footer__social">
                            <i class="ri-youtube-fill"></i>
                        </a>
                    </div>
                </div>

                <div class="footer__data">
                    <h3 class="footer__subtitle">About</h3>
                    <ul>
                        <li class="footer__item">
                            <a href="" class="footer__link">About Us</a>
                        </li>
                        <li class="footer__item">
                            <a href="" class="footer__link">Features</a>
                        </li>
                        <li class="footer__item">
                            <a href="" class="footer__link">New & Blog</a>
                        </li>
                    </ul>
                </div>

                <div class="footer__data">
                    <h3 class="footer__subtitle">Company</h3>
                    <ul>
                        <li class="footer__item">
                            <a href="" class="footer__link">Team</a>
                        </li>
                        <li class="footer__item">
                            <a href="" class="footer__link">Plan y Pricing</a>
                        </li>
                        <li class="footer__item">
                            <a href="" class="footer__link">Become a member</a>
                        </li>
                    </ul>
                </div>

                <div class="footer__data">
                    <h3 class="footer__subtitle">Support</h3>
                    <ul>
                        <li class="footer__item">
                            <a href="" class="footer__link">FAQs</a>
                        </li>
                        <li class="footer__item">
                            <a href="" class="footer__link">Support Center</a>
                        </li>
                        <li class="footer__item">
                            <a href="" class="footer__link">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="footer__rights">
                <p class="footer__copy">&#169; 2021 Bedimcode. All rigths reserved.</p>
                <div class="footer__terms">
                    <a href="#" class="footer__terms-link">Terms & Agreements</a>
                    <a href="#" class="footer__terms-link">Privacy Policy</a>
                </div>
            </div>
        </div>
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