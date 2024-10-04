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
$fileTrailsCss = $basePath . 'src/css/trails.css';
$fileScriptJs = $basePath . 'src/js/script.js';
$fileNavBar = __DIR__ . '/../navbar/navbar.php';
$fileFooter = __DIR__ . '/../footer/footer.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="./../src/img/favicon.png" type="image/png">

    <!--=============== REMIXICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="<?= $fileStyleCss ?>">
    <link rel="stylesheet" href="<?= $fileTrailsCss ?>">


    <title>Parc national des calanques</title>
</head>

<body>
  <header style="background-color: #15505B;" class="header" id="header">
    <?php include $fileNavBar; ?>
  </header>
    <main class="main">
        <section class="section section__trail section__natural_ressources">
          <h2><?= htmlspecialchars($ressource['name']); ?></h2>
            <p class="section__subtitle"></p>
            <div class="container container__trail container_natural_ressources">
            <?php if (!empty($ressource)) { ?>
                <img src="<?= htmlspecialchars($ressource['img'] ?? ''); ?>" alt="" class="natural_ressource__img">
                  <ul>
                      <li><strong>Population :</strong> <?= htmlspecialchars($ressource['population']); ?></li><br> 
                      <li><strong>Description :</strong><br><br> <?= htmlspecialchars($ressource['description']); ?></li>
                      <br>
                  </ul>
                  <?php } else { ?>
                      <p>Aucune donnée sur cette ressource disponible.</p>
                  <?php } ?>
            </div>
        </section>
    </main>
    <footer>
      <?php include $fileFooter; ?>
    </footer>
</body>

</html>