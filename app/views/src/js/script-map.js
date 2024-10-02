let map;

function convertCoordinates(coord) {
  return {
    lat: parseFloat(coord.latitude),
    lng: parseFloat(coord.longitude),
  };
}

async function loadRoad() {
  const response = await fetch(
    "/parc_national/app/routes/routeTrail.php/getAllTrail"
  );
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

  pointsOfInterest.forEach((point) => {
    const marker = new google.maps.Marker({
      map: map,
      position: convertCoordinates(point),
      title: point.name,
    });

    marker.addListener("click", () => {
      infoWindow.setContent(
        `<h3>${point.name}</h3><p>${point.description}</p>`
      );
      infoWindow.open(map, marker);
    });
  });
}
window.onload = initMap;
