var name= document.getElementById("name")
var id= document.getElementById("id")
var description= document.getElementById("description")
var population= document.getElementById("population")
var environment_id= document.getElementById("environment_id")
var img= document.getElementById("img")

async function updateForm( id, name, description, population, environment_id, img) {
  
const data= {
  
  id :id,
  name:name,
  description :description,
  population :population,
  environment_id :environment_id,
  img: img
}
let url= document.location.href;
let URL= url.replace("/getRessourcesById/"+ id, "/update_ressources")

fetch ("/parc_national/app/routes/routesNaturalRessources.php/update_ressources", {
  method: "POST",
  headers: {
    "Content-Type": "application/json",
  },
  body: JSON.stringify(data)
})
.then(response => {
  // Si la réponse est au format JSON, on peut faire response.json()
  return response.text(); // Ou response.json() si tu envoies du JSON
})
.then(data => {
  console.log("Réponse du serveur :", data);  // Ici tu vois le texte renvoyé par le serveur
})
.catch(error => {
  console.error("Erreur :", error);
});
}

// updateForm(29, "test", "test", "test", "test", 1, "ok")