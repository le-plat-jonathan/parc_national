<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_COOKIE['auth_token'])) {
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
        <link rel="stylesheet" href="../src/css/swiper-bundle.min.css">

        <!--=============== CSS ===============-->
        <link rel="stylesheet" href="../src/css/styles.css">
        <link rel="stylesheet" href="../src/css/connexion.css">

        <title>Parc national des calanques</title>
    </head>
    
    <!--=============== NAVBAR ===============-->
    <body>
        <header style="background-color: #15505B;" class="header" id="header">
            <?php include "./../navbar/navbar.php"; ?>
        </header>

        <main class="main">
            <section class="section section__login">
                <form action="/routes/userRoutes.php/login" class="form form__login" method='post'>
                    <h2>Connexion</h2>
                    <div class="form__row">
                        <label>Email</label>
                        <input name="email" id="email" type="email">
                    </div>
                    <div class="form__row">
                        <label>Mot de passe</label>
                        <input name="password" id="password" type="password">
                    </div>
                    <button style="width: 100%;" class="button">Connexion</button>
                </form>
            </section>
        </main>

        <!--==================== FOOTER ====================-->
        <footer class="footer section">
            <?php include "./footer/footer.php"; ?>
        </footer>

        <!--========== SCROLL UP ==========-->
        <a href="#" class="scrollup" id="scroll-up">
            <i class="ri-arrow-up-line scrollup__icon"></i>
        </a>

        <!--=============== SCROLL REVEAL===============-->
        <script src="../src/js/scrollreveal.min.js"></script>

        <!--=============== SWIPER JS ===============-->
        <script src="../src/js/swiper-bundle.min.js"></script>

        <!--=============== MAIN JS ===============-->
        <script src="../src/js/main.js"></script>
    </body>

    </html>
    <?php
        echo "<p>Vous êtes connecté.e</p>";
    } else {
        echo "<p>Une erreur est survenue lors de la connexion.</p>";
    }
} else {
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
        <link rel="stylesheet" href="../src/css/swiper-bundle.min.css">

        <!--=============== CSS ===============-->
        <link rel="stylesheet" href="../src/css/styles.css">
        <link rel="stylesheet" href="../src/css/connexion.css">

        <title>Parc national des calanques</title>
    </head>

    <body>
        <header style="background-color: #15505B;" class="header" id="header">
            <?php include "./../navbar/navbar.php"; ?>
        </header>

        <main class="main">
            <section class="section section__login">
                <form action="/routes/userRoutes.php/login" class="form form__login" method='post'>
                    <h2>Connexion</h2>
                    <div class="form__row">
                        <label>Email</label>
                        <input name="email" id="email" type="email">
                    </div>
                    <div class="form__row">
                        <label>Mot de passe</label>
                        <input name="password" id="password" type="password">
                    </div>
                    <button style="width: 100%;" class="button">Connexion</button>
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
        <script src="../src/js/scrollreveal.min.js"></script>

        <!--=============== SWIPER JS ===============-->
        <script src="../src/js/swiper-bundle.min.js"></script>

        <!--=============== MAIN JS ===============-->
        <script src="../src/js/main.js"></script>
    </body>

    </html>
    <?php
}
?>