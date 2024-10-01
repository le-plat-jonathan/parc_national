<?php $fileStyleCss = str_replace($_SERVER['DOCUMENT_ROOT'], '', __DIR__ . '/../src/css/styles.css') ?>
<?php $fileBookingCss = str_replace($_SERVER['DOCUMENT_ROOT'], '', __DIR__ . '/../src/css/booking.css') ?>
<?php $fileSwipperCss = str_replace($_SERVER['DOCUMENT_ROOT'], '', __DIR__ . '/../src/css/booking.css') ?>
<?php $fileScriptJs = str_replace($_SERVER['DOCUMENT_ROOT'], '', __DIR__ . '/../src/js/script.js') ?>
<?= $fileStyleCss ?>
<!DOCTYPE html>
<html>
<head>
    <title>Liste des sentiers</title>
</head>
<body>
  <p>Je suis dans la views getAll</p>

  <h1>Tous les sentiers</h1>

<?php if (!empty($trails)) : ?>  
    <?php foreach ($trails as $trail) : ?>  
        <h2>
            ID: <?= htmlspecialchars($trail['id']); ?> <br>
            Nom: <?= htmlspecialchars($trail['name']); ?> <br>
            Longueur: <?= htmlspecialchars($trail['length']); ?> km <br>
            Difficulté: <?= htmlspecialchars($trail['difficulty']); ?> <br>
            Longitude A: <?= htmlspecialchars($trail['longitude_A']); ?> <br>
            Latitude A: <?= htmlspecialchars($trail['latitude_A']); ?> <br>
            Longitude B: <?= htmlspecialchars($trail['longitude_B']); ?> <br>
            Latitude B: <?= htmlspecialchars($trail['latitude_B']); ?>
        </h2>
        <hr>
    <?php endforeach; ?>
<?php else : ?>
    <p>Aucun sentier trouvé.</p>
<?php endif; ?>
</body>
</html> -->

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


    <title>Parc national des calanques</title>
</head>

<body>
    <header style="background-color: #15505B;" class="header" id="header">
        <?php include "./../navbar/navbar.php"; ?>
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

