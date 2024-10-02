<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carte des Points d'Intérêt</title>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOdyNOj6bK5n7oM1WhKjU1kmfAilSuDEE&callback=initMap&v=weekly&libraries=marker" defer></script>

    <style>
        #map {
            height: 500px;
            width: 100%;
        }
    </style>
</head>
<body>
    <h1>Carte des Points d'Intérêt</h1>

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
</body>
</html>
