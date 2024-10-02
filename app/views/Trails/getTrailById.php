<?php
// Déterminer le chemin de base en fonction de l'environnement
if (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false) {
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
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="./../src/img/favicon.png" type="image/png">

    <!--=============== REMIXICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="<?= $fileSwipperCss ?>">

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
        <section class="section section__trail">
            <h2 class="section__title">Détails du sentier</h2>
            <p class="section__subtitle"></p>
            <div class="container container__trail">
            <?php if (!empty($trail)) { ?>

                <img src="<?= htmlspecialchars($trail['img'] ?? ''); ?>" alt="" class="discover__img">

   
   <ul>
       <li><h2><?= htmlspecialchars($trail['name']); ?></h2></li>
       <li><strong>Longueur :</strong> <?= htmlspecialchars($trail['length']); ?></li>
       <li><strong>Difficulté :</strong> <?= htmlspecialchars($trail['difficulty']); ?></li>
       <li><strong>Longitude A :</strong> <?= htmlspecialchars($trail['longitude_A']); ?></li>
       <li><strong>Latitude A :</strong> <?= htmlspecialchars($trail['latitude_A']); ?></li>
       <li><strong>Longitude B :</strong> <?= htmlspecialchars($trail['longitude_B']); ?></li>
       <li><strong>Latitude B :</strong> <?= htmlspecialchars($trail['latitude_B']); ?></li>
   </ul>
   <?php } else { ?>
       <p>Aucune donnée sur le sentier disponible.</p>
   <?php } ?>
            </div>
        </section>
        <section class="section">
            <div class="container container__map">
            <div id="map"></div>

<script>
    let map;

    function convertCoordinates(coord) {
        return {
            lat: parseFloat(coord.latitude),
            lng: parseFloat(coord.longitude)
        };
    }

    async function loadRoad() {
        const response = await fetch('/parc_national/app/routes/pointOfInterestRoutes.php/getAllPointOfInterest');
        let data = await response.json(); 
        return data;
    }

    async function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: 43.2115, lng: 5.4352 },
            zoom: 12,
        });

        const pointsOfInterest = await loadRoad();

        const infoWindow = new google.maps.InfoWindow();

        pointsOfInterest.forEach(point => {
            const marker = new google.maps.Marker({
                map: map,
                position: convertCoordinates(point),
                title: point.name
            });

            marker.addListener('click', () => {
                infoWindow.setContent(`<h3>${point.name}</h3><p>${point.description}</p>`);
                infoWindow.open(map, marker);
            });
        });
    }
    window.onload = initMap;
</script>
            </div>
        </section>
    </main>
    <footer>
   <?php include $fileFooter; ?>
</footer>
</body>
</html>
