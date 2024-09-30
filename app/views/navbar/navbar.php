<nav class="nav container">
    <a href="#" class="nav__logo">Parc National Des Calanques</a>

    <div class="nav__menu" id="nav-menu">
        <ul class="nav__list">
            <li class="nav__item">
            <a href="./../index.php" class="nav__link active-link">Home</a>
            </li>
            <li class="nav__item">
                <a href="./../Trails/getAllTrail.php" class="nav__link">Nos sentiers</a>
            </li>
            <li class="nav__item">
                <a href="./../booking.php" class="nav__link">Camping’s</a>
            </li>
            <li class="nav__item">
                <a href="./../nature.html" class="nav__link">Ressources naturelles</a>
            </li>
            <li class="nav__item">
                <?php if(!isset($_COOKIE['auth_token'])) {
                        echo '<a href="./../views/user/login.php" class="nav__link">Connexion</a>';
                    } else {
                        echo '<a href="" class="nav__link">Déconnexion</a>';
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