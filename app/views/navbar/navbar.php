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

function isActive($pageUrl, $currentUrl) {
    return strpos($currentUrl, $pageUrl) !== false ? 'active-link' : '';
}

?>

<nav class="nav container">
    <a href= "<?=$basePathView?>/index.php" class="nav__logo">Parc National Des Calanques</a>

    <div class="nav__menu" id="nav-menu">
        <ul class="nav__list">
            <li class="nav__item">
            <a href="<?= $home ?>" class="nav__link">Accueil</a>
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
                    echo '<a href=" ' . $basePathView . 'admin/admin_user.php" class="nav__link">Administration</a>';
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

        <i class="ri-close-line nav__close" id="nav-close"></i>
    </div>

    <div class="nav__toggle" id="nav-toggle">
        <i class="ri-function-line"></i>
    </div>
</nav>
<script src="/parc_national/app/views/src/js/activeLink.js"></script>