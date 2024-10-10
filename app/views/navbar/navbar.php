<?php

require_once '../../vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

// Déterminer le chemin de base en fonction de l'environnement
if (strpos($_SERVER['HTTP_HOST'], 'localhost:8000') !== false) {
    // Mac (localhost)
    $basePath = '/app/routes/';
} else {
    // WAMP
    $basePath = '/parc_national/app/routes/';
}

$trail = $basePath . 'routeTrail.php/getAllTrail';
$camping = $basePath . 'bookingRoutes.php/getAllBooking';
$ressources = $basePath . 'routesNaturalRessources.php/getAllRessources';
$home = $basePath . '../../app/views/index.php';

if (isset($_COOKIE['auth_token'])) {
    $secretKey = $_ENV['JWT_SECRET_KEY'];
    $decoded = JWT::decode($_COOKIE['auth_token'], new Key($secretKey, 'HS256'));
    $userId = $decoded->user_id;
    $username = $decoded->username;
    $role = $decoded->role;
}

// Récupérer l'URL actuelle pour déterminer quelle page est active
$request_uri = $_SERVER['REQUEST_URI'];

// Vérifier quelle page est active
function isActive($pageUrl, $currentUrl) {
    return strpos($currentUrl, $pageUrl) !== false ? 'active-link' : '';
}

?>

<nav class="nav container">
    <a href="../../views/index.php" class="nav__logo">Parc National Des Calanques</a>

    <div class="nav__menu" id="nav-menu">
        <ul class="nav__list">
            <li class="nav__item">
                <a href="<?= $home ?>" class="nav__link <?= isActive('index.php', $request_uri) ?>">Accueil</a>
            </li>
            <li class="nav__item">
                <a href="<?= $trail ?>" class="nav__link <?= isActive('getAllTrail', $request_uri) ?>">Sentiers</a>
            </li>
            <li class="nav__item">
                <a href="<?= $camping ?>" class="nav__link <?= isActive('getAllBooking', $request_uri) ?>">Campings</a>
            </li>
            <li class="nav__item">
                <a href="<?= $ressources ?>" class="nav__link <?= isActive('getAllRessources', $request_uri) ?>">Ressources naturelles</a>
            </li>
            <?php if (isset($_COOKIE['auth_token'])): ?>
                <li class="nav__item">
                    <a href="../../routes/userRoutes.php/get_user/<?= $userId ?>" class="nav__link <?= isActive('get_user', $request_uri) ?>">Mon Profil</a>
                </li>
            <?php endif; ?>
            <li class="nav__item">
                <?php if (!isset($_COOKIE['auth_token'])): ?>
                    <a href="../../views/user/login.php" class="nav__link <?= isActive('login.php', $request_uri) ?>">Connexion</a>
                <?php else: ?>
                    <a href="../../routes/logout.php" class="nav__link">Déconnexion</a>
                <?php endif; ?>
            </li>
        </ul>

        <div class="nav__dark">
            <!-- Bouton pour changer de thème -->
            <span class="change-theme-name">Dark mode</span>
            <i class="ri-moon-line change-theme" id="theme-button"></i>
        </div>

        <i class="ri-close-line nav__close" id="nav-close"></i>
    </div>

    <div class="nav__toggle" id="nav-toggle">
        <i class="ri-function-line"></i>
    </div>
</nav>
<script src="/parc_national/app/views/src/js/activeLink.js"></script>
