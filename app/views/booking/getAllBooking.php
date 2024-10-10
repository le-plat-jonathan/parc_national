<?php 

require __DIR__ . "/../../models/Booking.php";

// Déterminer le chemin de base en fonction de l'environnement
if (strpos($_SERVER['HTTP_HOST'], 'localhost:8000') !== false) {
    $basePath = '/app/views/';
} else {
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

$booking = new Booking();
$data = $booking->getAllBooking();

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
    <link rel="stylesheet" href="<?= $fileBookingCss ?>">
    <link rel="stylesheet" href="<?= $fileStyleConnexion ?>">

    <title>Administration des Réservations</title>
</head>
<body>
    <header style="background-color: #15505B;" class="header" id="header">
        <?php include $fileNavBar; ?>
    </header>
    <main>
        <h1>Liste des Réservations</h1>
        <div id="display_view">
            <?php foreach ($data as $d): ?>
                <div class="reservation">
                    <p>Numéro de réservation : <?= htmlspecialchars($d['id']) ?></p>
                    <p>Date de départ : <?= htmlspecialchars($d['start_date']) ?></p>
                    <p>Date de fin : <?= htmlspecialchars($d['end_date']) ?></p>
                    <p>Status : <?= htmlspecialchars($d['status']) ?></p>
                    <p>ID Utilisateur : <?= htmlspecialchars($d['user_id']) ?></p>
                    <p>ID Bungalow : <?= htmlspecialchars($d['bungalow_id']) ?></p>
                    <hr>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
    <footer class="footer section">
        <?php include $fileFooter; ?>
    </footer>

    <script src="<?= $fileScriptJs ?>"></script>
</body>
</html>