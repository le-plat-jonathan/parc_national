<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="src/img/favicon.png" type="image/png">

    <!--=============== REMIXICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="src/css/swiper-bundle.min.css">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="src/css/styles.css">


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
                        <a href="./trails.html" class="nav__link">Nos sentiers</a>
                    </li>
                    <li class="nav__item">
                        <a href="./booking.html" class="nav__link">Camping’s</a>
                    </li>
                    <li class="nav__item">
                        <a href="./nature.html" class="nav__link">Ressources naturelles</a>
                    </li>

                    <li class="nav__item">
                        <a href="./connexion.html" class="nav__link">Connexion</a>
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
        <section class="section section__trails">
            <h2 class="section__title">Nos Sentiers</h2>
            <p class="section__subtitle">Découvrez les magnifiques sentiers des calanques de Marseille.</p>
            <div class="container container__trails">
                <div class="discover__card swiper-slide">
                    <img src="src/img/discover1.jpg" alt="" class="discover__img">
                    <div class="discover__data">
                        <h2 class="discover__title">Le tour de l’île de Ratonneau</h2>
                        <span class="discover__description">24 tours available</span>
                    </div>
                </div>
            </div>
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

    <!--=============== SCROLL REVEAL===============-->
    <script src="src/js/scrollreveal.min.js"></script>

    <!--=============== SWIPER JS ===============-->
    <script src="src/js/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="src/js/main.js"></script>
</body>

</html>