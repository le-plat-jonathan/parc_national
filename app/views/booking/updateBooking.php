<?php

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

$uri = $_SERVER['REQUEST_URI'];
$urlForAction = str_replace('/views/booking/updateBooking.php', '/routes/bookingRoutes.php/updateBooking', $uri);

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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

    <title>Modifier la Réservation</title>
</head>
<body>
    <header style="background-color: #15505B;" class="header" id="header">
        <?php include $fileNavBar; ?>
    </header>
    <main>
        <h1>Modifier la Réservation</h1>
        <form action="<?= $urlForAction ?>" method="post" id="form_admin">
            <label for="id">Id de la réservation</label>
            <input type="number" value="<?= isset($data[0]['id']) ? htmlspecialchars($data[0]['id']) : "" ?>" name="id" required>

            <label for="start-date">Date de début</label>
            <input type="date" value="<?= isset($data[0]['start_date']) ? htmlspecialchars($data[0]['start_date']) : "" ?>" name="start-date" required>

            <label for="end-date">Date de fin</label>
            <input type="date" value="<?= isset($data[0]['end_date']) ? htmlspecialchars($data[0]['end_date']) : "" ?>" name="end-date" required>

            <label for="status">Statut</label>
            <select name="status" required>
                <option value="confirmed" <?= (isset($data[0]['status']) && $data[0]['status'] == 'confirmed') ? 'selected' : '' ?>>Confirmé</option>
                <option value="pending" <?= (isset($data[0]['status']) && $data[0]['status'] == 'pending') ? 'selected' : '' ?>>En attente</option>
                <option value="cancelled" <?= (isset($data[0]['status']) && $data[0]['status'] == 'cancelled') ? 'selected' : '' ?>>Annulé</option>
            </select>

            <label for="user_id">ID de l'utilisateur</label>
            <input type="number" value="<?= isset($data[0]['user_id']) ? htmlspecialchars($data[0]['user_id']) : "" ?>" name="user_id" required>

            <label for="bungalow_id">ID du bungalow</label>
            <input type="number" value="<?= isset($data[0]['bungalow_id']) ? htmlspecialchars($data[0]['bungalow_id']) : "" ?>" name="bungalow_id" required>

            <button type="submit">Envoyer</button>
        </form>
    </main>
    <footer class="footer section">
        <?php include $fileFooter; ?>
    </footer>

    <script src="<?= $fileScriptJs ?>"></script>
</body>
</html>