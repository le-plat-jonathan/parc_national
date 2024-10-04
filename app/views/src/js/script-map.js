/*
Ce script utilise l'API Google Maps pour afficher une carte interactive avec des boutons dynamiques permettant de calculer des itinéraires de randonnée. Les trajets sont chargés à partir d'un fichier JSON (db.json) et les points de départ et d'arrivée des randonnées sont utilisés pour calculer et afficher les trajets. Des boutons sont créés pour chaque randonnée, et un clic sur l'un des boutons affiche le trajet sur la carte. La structure du code permet également d'ajouter des points d'intérêt le long des trajets.

Fonctions principales :
- `convertCoordinates(coord)` : Convertit les coordonnées GPS de la base de données en format compatible avec Google Maps.
- `loadRoad()` : Récupère les données du fichier JSON pour charger les trajets.
- `initMap()` : Initialise la carte Google Maps et charge les trajets disponibles.
- `calcRoute({start, end})` : Calcule et affiche un itinéraire entre deux points en utilisant Google Maps Directions API.
- `createButton(routes)` : Crée dynamiquement des boutons pour chaque randonnée et y associe une action pour calculer l'itinéraire correspondant.

Variables globales :
- `map` : Carte Google Maps.
- `directionsService` : Service pour calculer les directions.
- `directionsRenderer` : Service pour afficher les directions sur la carte.
*/

let map;
let directionsService;
let directionsRenderer;
let coordinates = [];
let arrayCoordinates = {};

/* Div */
let data = document.querySelectorAll(".data");
data.forEach(d => coordinates.push(d.textContent))

coordinates.forEach(c => {
  let splitData = c.split(":");
  key = splitData[0].trim()
  data = splitData[1].trim()
  arrayCoordinates[key] = data; 
});

async function initMap() {
  const { Map } = await google.maps.importLibrary("maps");

  map = new Map(document.getElementById("map"), {
    center: { lat: 43.2115, lng: 5.4352 },
    zoom: 12,
  });

  directionsService = new google.maps.DirectionsService();
  directionsRenderer = new google.maps.DirectionsRenderer();
  directionsRenderer.setMap(map);

  calcRoute({
    start: {
      lat: parseFloat(arrayCoordinates['Latitude A']),
      lng: parseFloat(arrayCoordinates['Longitude A'])
    },
    end: {
      lat: parseFloat(arrayCoordinates['Latitude B']),
      lng: parseFloat(arrayCoordinates['Longitude B'])
    }}
  )

}

function calcRoute({start, end}) {

  const request = {
    origin: start,
    destination: end,
    travelMode: 'WALKING'
  };

  directionsService.route(request, function(result, status) {
    if (status === 'OK') {
      directionsRenderer.setDirections(result);
    } else {
      console.error("Directions request failed due to " + status);
    }
  });
}

initMap()

/* 
Pour ajouter des points d'intérêt sur la carte :

routes.randonnées.facile.forEach(route => {
    route.points_d_intérêt.forEach(point => {
        new google.maps.Marker({
            map: map,
            position: convertCoordinates(point),
            title: point.nom
        });
    });
});
*/