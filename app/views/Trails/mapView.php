<?php
require_once __DIR__ . '/../../Helpers/verify_token.php';
$is_token_true = verify_token();
// Déterminer le chemin de base en fonction de l'environnement
if (strpos($_SERVER['HTTP_HOST'], 'localhost:8000') !== false) {
    // Mac (localhost)
    $basePath = '/app/views/';
    $basePathRoute = '/app/routes/';
} else {
    // WAMP
    $basePath = '/parc_national/app/views/';
    $basePathRoute = '/parc_national/app/routes/';
}

// Chemins des fichiers CSS et JS
$fileStyleCss = $basePath . 'src/css/styles.css';
$fileStyleMapCss = $basePath . 'src/css/map.css';
$fileBookingCss = $basePath . 'src/css/booking.css';
$fileSwipperCss = $basePath . 'src/css/swiper-bundle.min.css';
$fileScriptJs = $basePath . 'src/js/script.js';
$fileScriptMapJs = $basePath . 'src/js/script-map.js';
$pathDelete = $basePathRoute . 'routeTrail.php/delete_trail/' . $data['id'];
$pathUpdate = $basePathRoute . "routeTrail.php/update_trail/" . $data['id'];
$fileNavBar = __DIR__ . '/../navbar/navbar.php';
$fileFooter = __DIR__ . '/../footer/footer.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= $fileStyleMapCss ?>">
    <link rel="stylesheet" href="<?= $fileStyleCss ?>">
</head>
<body>

    <header style="background-color: #15505B;" class="header" id="header">
    <?php include $fileNavBar; ?>
    </header>
        <main>
            <h2 class="section__title">Détails du sentier</h2>
                <?php if (!empty($data)) { ?>
                    <div class="main_map">
                        <div id="map"></div>
                        <ul class="ul_map">
                            <li><h2><?= htmlspecialchars($data['name']); ?></h2></li>
                            <li class='data'><strong>Longueur :</strong><?= htmlspecialchars($data['length']); ?></p></li>
                            <li class='data'><strong>Difficulté :</strong><?= htmlspecialchars($data['difficulty']); ?></p></li>
                            <li class='data'><strong>Longitude A :</strong><?= htmlspecialchars($data['longitude_A']); ?></p></li>
                            <li class='data'><strong>Latitude A :</strong><?= htmlspecialchars($data['latitude_A']); ?></p></li>
                            <li class='data'><strong>Longitude B :</strong><?= htmlspecialchars($data['longitude_B']); ?></p></li>
                            <li class='data'><strong>Latitude B :</strong><?= htmlspecialchars($data['latitude_B']); ?></p></li>
                        </ul>
                    </div>
                <?php } else { ?>
                    <p>Aucune donnée sur le sentier disponible.</p>
                <?php } ?>
                <div>
                <?php if($is_token_true): ?>
                <button class="button" id="modify-btn">Modifier le sentier</button> 
                <form action="<?= $pathDelete ?>" method="POST" style="display: inline;">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($data['id']); ?>">
                    <button type="submit" class="button" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette ressource ?');">Supprimer le sentier</button>
                </form>
            </div> 
            <!-- Modal -->
            <div id="updateModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h1>Mise à jour des infos d'une ressource :</h1>
                <form id="updateForm" action='<?= $pathUpdate ?>' method="post">
                <label for="id">Id :</label>
                <input type="int" id="id" name="id" value="<?= htmlspecialchars($data['id'] ?? ''); ?>" required>

                <label for="name">Nom :</label>
                <input type="text" id="name" name="name" value="<?= htmlspecialchars($data['name'] ?? ''); ?>" required>

                <label for="length">Longueur :</label>
                <textarea name="length" id="length" required><?= htmlspecialchars($data['length'] ?? ''); ?></textarea>

                <label for="difficulty">Difficulty :</label>
                <input type="text" id="difficulty" name="difficulty" value="<?= htmlspecialchars($data['difficulty'] ?? ''); ?>" required>

                <label for="longitude_A">Longitude A :</label>
                <input type="text" id="longitude_A" name="longitude_A" value="<?= htmlspecialchars($data['longitude_A'] ?? ''); ?>" required>

                <label for="latitude_A">Latitude A :</label>
                <input type="text" id="latitude_A" name="latitude_A" value="<?= htmlspecialchars($data['latitude_A'] ?? ''); ?>" required>

                <label for="longitude_B">Longitude B :</label>
                <input type="text" id="longitude_B" name="longitude_B" value="<?= htmlspecialchars($data['longitude_B'] ?? ''); ?>" required>

                <label for="latitude_B">Latitude A :</label>
                <input type="text" id="latitude_B" name="latitude_B" value="<?= htmlspecialchars($data['latitude_B'] ?? ''); ?>" required>

                <input type="hidden" id="img" name="img" value="<?= htmlspecialchars($data['img'] ?? ''); ?>" required>


                <button type="submit">Mettre à jour le sentier</button>
                
                </form>
            </div>
            </div>
            <?php endif; ?>
        </main>
         <?php include $fileFooter; ?>

</body>
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
<script>
  (g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})({
    key: "AIzaSyAOdyNOj6bK5n7oM1WhKjU1kmfAilSuDEE",
    v: "weekly",
  });
</script>
<script src="<?= $fileScriptMapJs ?>"></script>

</html>