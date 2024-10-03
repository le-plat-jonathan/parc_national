<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['email'], $_POST['password'], $_POST['confirmPassword'], $_POST['username']) && $_POST['password'] === $_POST['confirmPassword']) {
        $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
        $username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');

        echo "<h2>Votre compte a bien été créé avec les données suivantes :</h2>";
        echo "<p>Email : " . $email . "</p>";
        echo "<p>Nom d'utilisateur : " . $username . "</p>";
    } else {
        echo "<p>Erreur : données du formulaire manquantes.</p>";
    }
} else {
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
        <link rel="stylesheet" href="./../src/css/swiper-bundle.min.css">

        <!--=============== CSS ===============-->
        <link rel="stylesheet" href="./../src/css/styles.css">
        <link rel="stylesheet" href="./../src/css/connexion.css">

        <title>Parc national des calanques</title>
    </head>

    <body>
        <header style="background-color: #15505B;" class="header" id="header">
            <?php include "./../navbar/navbar.php"; ?>
        </header>

        <main class="main">
            <section class="section section__login">
                <form action="../../Routes/userRoutes.php/register" class="form form__login" method='post'>
                    <h2>Inscription</h2>
                    <div class="form__row">
                        <label>Pseudo</label>
                        <input name="username" id="username" type="text">
                    </div>
                    <div class="form__row">
                        <label>Email</label>
                        <input name="email" id="email" type="email">
                    </div>
                    <div class="form__row">
                        <label>Mot de passe</label>
                        <input name="password" id="password" type="password">
                    </div>
                    <div class="form__row">
                        <label>Confirmer le mot de passe</label>
                        <input name="confirmPassword" id="confirmPassword" type="password">
                    </div>
                    <button style="width: 100%;" class="button">S'inscrire</button>
                    <p>Vous avez déjà un compte?<a href='./../user/login.php'> Connectez-vous!</a></p>
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
        <script src="./../src/js/scrollreveal.min.js"></script>

        <!--=============== SWIPER JS ===============-->
        <script src="./../src/js/swiper-bundle.min.js"></script>

        <!--=============== MAIN JS ===============-->
        <script src="./../src/js/main.js"></script>
    </body>

    </html>
    <?php
}
?>
