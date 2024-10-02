<?php
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
    $trail = $basePath . 'routeTrail.php/getAllTrail';
    $home = $basePath . '../../app/views/index.php';
?>
<nav class="nav container">
    <a href="#" class="nav__logo">Parc National Des Calanques</a>

    <div class="nav__menu" id="nav-menu">
        <ul class="nav__list">
            <li class="nav__item">
                <a href="<?=$home?>" class="nav__link active-link">Acceuil</a>
            </li>
            <li class="nav__item">
                <a href="<?= $trail ?>" class="nav__link">Les sentiers</a>
            </li>
            <li class="nav__item">
                <a href="<?= $camping ?>" class="nav__link">Campings</a>
            </li>
            <li class="nav__item">
                <a href="<?= $ressources ?>" class="nav__link">Ressources naturelles</a>
            </li>
            <li class="nav__item">
                <?php if (!isset($_COOKIE['auth_token'])) {
                       echo '<a href="../../views/user/login.php" class="nav__link">Connexion</a>';
                } else {
                    echo '<a href="./../routes/logout.php" class="nav__link">Déconnexion</a>';
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