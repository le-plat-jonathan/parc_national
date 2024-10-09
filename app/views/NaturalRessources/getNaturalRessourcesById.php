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
$fileScriptJsRessource = $basePath . 'src/js/update-ressources.js';
$fileNavBar = __DIR__ . '/../navbar/navbar.php';
$fileFooter = __DIR__ . '/../footer/footer.php';

require_once __DIR__ . '/../../config/dotEnvLoader.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$secretKey = "0aee078e548a963e3d8f234bb0c891dc425df7794279d985a5566bd70720565f";
if (isset($_COOKIE['auth_token'])) {
  try {
      // Décodage du token JWT
      $decoded = JWT::decode($_COOKIE['auth_token'], new Key($secretKey, 'HS256'));
  } catch (Exception $e) {
      // Gestion des erreurs liées au décodage du JWT
      error_log("Erreur lors du décodage du JWT : " . $e->getMessage());
      // Vous pouvez également rediriger ou afficher un message d'erreur si nécessaire
  }
}
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
                      <br>
<?php if(isset($decoded) && $decoded->role === 'admin'): ?>
<div>
    <button class="button" id="modify-btn">Modifier la fiche</button> 
    <form action="/parc_national/app/routes/routesNaturalRessources.php/delete_ressources/" method="POST" style="display: inline;">
        <input type="hidden" name="id" value="<?= htmlspecialchars($ressource['id']); ?>">
        <button type="submit" class="button" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette ressource ?');">Supprimer la fiche</button>
    </form>
</div> 


                  </ul>
                 <!-- Modal -->
<div id="updateModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h1>Mise à jour des infos d'une ressource :</h1>
    <form id="updateForm" action='/parc_national/app/routes/routesNaturalRessources.php/update_ressources' method="post">
      <label for="id">Id :</label>
      <input type="int" id="id" name="id" value="<?= htmlspecialchars($ressource['id'] ?? ''); ?>" required>

      <label for="name">Nom :</label>
      <input type="text" id="name" name="name" value="<?= htmlspecialchars($ressource['name'] ?? ''); ?>" required>

      <label for="description">Description :</label>
      <textarea name="description" id="description" required><?= htmlspecialchars($ressource['description'] ?? ''); ?></textarea>

      <label for="population">Population :</label>
      <input type="text" id="population" name="population" value="<?= htmlspecialchars($ressource['population'] ?? ''); ?>" required>

      <label for="environment_id">Environment_id :</label>
      <input type="text" id="environment_id" name="environment_id" value="<?= htmlspecialchars($ressource['environment_id'] ?? ''); ?>" required>

      <!-- Correction ici : l'image devrait utiliser 'img' si c'est cohérent avec la base de données -->
      <input type="hidden" id="img" name="img" value="<?= htmlspecialchars($ressource['img'] ?? ''); ?>" required>

      <button type="submit">Mettre à jour la ressource</button>
     
    </form>
  </div>
</div>
<?php endif; ?>
                  <?php } else { ?>
                      <p>Aucune donnée sur cette ressource disponible.</p>
                  <?php } ?>
        </div>
    </div>
        </section>
    </main>
    <footer>
      <?php include $fileFooter; ?>
    </footer>
    <script>
  var modal = document.getElementById("updateModal");
 var btn = document.getElementById("modify-btn");
 var span = document.getElementsByClassName("close")[0];

 btn.onclick = function() {
   modal.style.display = "block";
 }

 span.onclick = function() {
   modal.style.display = "none";
 }

 window.onclick = function(event) {
   if (event.target == modal) {
     modal.style.display = "none";
   }
 }


</script>
</body>
<script src="<?= $fileScriptJsRessource ?>" ></script>
</html>