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
$fileProfilCss = $basePath . 'src/css/profil.css';
$fileBookingCss = $basePath . 'src/css/booking.css';
$fileStyleConnexion = $basePath . 'src/css/connexion.css';
$fileSwipperCss = $basePath . 'src/css/swiper-bundle.min.css';
$fileScriptJs = $basePath . 'src/js/script.js';
$fileNavBar = __DIR__ . '/../navbar/navbar.php';
$fileFooter = __DIR__ . '/../footer/footer.php';

// Chemins des vues
$pathAddBungalow = $basePath . 'bungalow/addBungalow.php';
$pathUpdateBungalow = $basePath . 'bungalow/updateBungalow.php';
$pathDeleteBungalow = $basePath . 'bungalow/deleteBungalow.php';

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
    <link rel="stylesheet" href="<?= $fileSwipperCss ?>">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="<?= $fileStyleCss ?>">
    <link rel="stylesheet" href="<?= $fileProfilCss ?>">
    <link rel="stylesheet" href="<?= $fileStyleConnexion ?>">

    <title>Administration</title>
</head>
<body>
  <header style="background-color: #15505B;" class="header" id="header">
    <?php include __DIR__ . "/../navbar/navbar.php"; ?>
  </header>
    <main>
        <div id="display_view">
            <a href="<?= $pathAddBungalow ?>" class="display_views">
                <p>Ajouter un bungalow</p>
            </a>
            <a href="<?= $pathUpdateBungalow ?>" class="display_views">
                <p>Modifier un bungalow</p>
            </a>
            <a href="<?= $pathDeleteBungalow ?>" class="display_views">
                <p>Supprimer un bungalow</p>
            </a>
        </div>
    </main>
  <footer class="footer section">
    <?php include __DIR__ . "/../footer/footer.php"; ?>
  </footer>

  <script src="src/js/main.js"></script>
</body>
</html>