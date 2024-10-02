let map;
let directionsService;
let directionsRenderer;

/* Div */
let divBtn = document.getElementById("btnCalanques");

function convertCoordinates(coord) {
  return {
    lat: parseFloat(coord.latitude),
    lng: parseFloat(coord.longitude),
  };
}

async function loadRoad() {
  const response = await fetch(
    "/parc_national/app/routes/pointOfInterestRoutes.php/getAllPointOfInterest"
  );
  let data = await response.json();
  return data;
}

async function initMap() {
  const { Map } = await google.maps.importLibrary("maps");

  map = new Map(document.getElementById("map"), {
    center: { lat: 43.2115, lng: 5.4352 },
    zoom: 12,
  });

  directionsService = new google.maps.DirectionsService();
  directionsRenderer = new google.maps.DirectionsRenderer();
  directionsRenderer.setMap(map);

  const pointsOfInterest = await loadRoad();

  addMarkers(pointsOfInterest);
}
function addMarkers(pointsOfInterest) {
  pointsOfInterest.forEach((point) => {
    const marker = new google.maps.Marker({
      map: map,
      position: convertCoordinates(point),
      title: point.name,
    });

    const infoWindow = new google.maps.InfoWindow({
      content: `<h3>${point.name}</h3><p>${point.description}</p>`,
    });

    marker.addListener("click", () => {
      infoWindow.open(map, marker);
    });
  });
}

function calcRoute({ start, end }) {
  const request = {
    origin: start,
    destination: end,
    travelMode: "WALKING",
  };

  directionsService.route(request, function (result, status) {
    if (status === "OK") {
      directionsRenderer.setDirections(result);
    } else {
      console.error("Directions request failed due to " + status);
    }
  });
}

function createButton(routes) {
  routes.forEach((route) => {
    let divBtn = document.getElementById(route.difficulté);
    var btn = document.createElement("BUTTON");
    btn.textContent = route.nom;
    divBtn.appendChild(btn);
    btn.addEventListener("click", () =>
      calcRoute({
        start: convertCoordinates(route.départ),
        end: convertCoordinates(route.arrivée),
      })
    );
  });
}
