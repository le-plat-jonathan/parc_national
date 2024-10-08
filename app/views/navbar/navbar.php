<?php

require_once '../../vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

// Déterminer le chemin de base en fonction de l'environnement
if (strpos($_SERVER['HTTP_HOST'], 'localhost:8000') !== false) {
    // Mac (localhost)
    $basePath = '/app/routes/';
    $basePathConnexion = '/app/views';
    $basePathView = '/app/views/';

} else {
    // WAMP
    $basePath = '/parc_national/app/routes/';
    $basePathView = '/parc_national/app/views/';
}

    $trail = $basePath . 'routeTrail.php/getAllTrail';
    $camping = $basePath . 'bookingRoutes.php/getAllBooking';
    $ressources = $basePath . 'routesNaturalRessources.php/getAllRessources';
    $trail = $basePath . 'routeTrail.php/getAllTrail';
    $home = $basePath . '../../app/views/index.php';

if (isset($_COOKIE['auth_token'])) {

        $secretKey = $_ENV['JWT_SECRET_KEY'];

        $decoded = JWT::decode($_COOKIE['auth_token'], new Key($secretKey, 'HS256'));
        
        $userId = $decoded->user_id;
        $username = $decoded->username;
        $role = $decoded->role;
}

$request_uri = $_SERVER['REQUEST_URI'];
$script_name = $_SERVER['SCRIPT_NAME'];
$url = str_replace($script_name, "", $request_uri);
$url = trim($url, '/');

$urlParsed = explode('/', $url );
$endpoint = isset($urlParsed[0]) ? $urlParsed[0] : '';

?>

<nav class="nav container">
    <a href="../../views/index.php" class="nav__logo">Parc National Des Calanques</a>

    <div class="nav__menu" id="nav-menu">
        <ul class="nav__list">
            <li class="nav__item">
            <a href="<?= $home ?>" class="nav__link active-link">Accueil</a>
            </li>
            <li class="nav__item">
                <a href="<?= $trail ?>" class="nav__link">Sentiers</a>
            </li>
            <li class="nav__item">
                <a href="<?= $camping ?>" class="nav__link">Campings</a>
            </li>
            <li class="nav__item">
                <a href="<?= $ressources ?>" class="nav__link">Ressources naturelles</a>
            </li>
            <?php if (isset($_COOKIE['auth_token'])) {
                if ($endpoint === 'get_user') {
                    echo '<li class="nav__item">';
                    echo '<a href="" class="nav__link">Mon compte</a>';
                    echo '</li>';
                } else {
                    echo '<li class="nav__item">';
                    echo '<a href=" ' . $basePath . 'userRoutes.php/get_user/' . $userId . '" class="nav__link">Mon compte</a>';
                    echo '</li>';
                }
                if($role === 'admin') {
                    echo '<li class="nav__item">';
                    echo '<a href=" ' . $basePathView . 'admin.php" class="nav__link">Administration</a>';
                    echo '</li>';
                }
            }?>
            <li class="nav__item">
                <?php if (!isset($_COOKIE['auth_token'])) {
                    echo '<a href=" ' . $basePathView . 'user/login.php" class="nav__link">Connexion</a>';
                } else {
                    echo '<a href=" ' . $basePath . 'logout.php" class="nav__link">Déconnexion</a>';
                }
                ?>
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
<script src="/parc_national/app/views/src/js/activeLink.js"></script>