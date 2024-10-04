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
$fileBookingCss = $basePath . 'src/css/booking.css';
$fileSwipperCss = $basePath . 'src/css/swiper-bundle.min.css';
$fileScriptJs = $basePath . 'src/js/script.js';
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
    <link rel="stylesheet" href="/app/views/src/css/map.css">
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
        </main>
        <?php include $fileFooter; ?>

</body>
<script>
  (g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})({
    key: "AIzaSyAOdyNOj6bK5n7oM1WhKjU1kmfAilSuDEE",
    v: "weekly",
  });
</script>
<script src="/app/views/src/js/script-map.js"></script>

</html>