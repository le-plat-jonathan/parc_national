/*
Ce fichier JavaScript implémente un calendrier interactif permettant à l'utilisateur de sélectionner des dates, avec la possibilité de réserver des périodes et de visualiser des réservations existantes.

### Fonctionnalités principales :
1. **Génération du calendrier** : Affiche le calendrier du mois en cours, avec la possibilité de passer aux mois suivants ou précédents.
2. **Sélection de dates** : Permet de sélectionner une première et une seconde date en cliquant sur les cellules du calendrier. Toutes les dates entre les deux sont automatiquement sélectionnées.
3. **Vérification des réservations** : Lors de la génération du calendrier, les dates déjà réservées sont chargées depuis un fichier JSON et affichées en tant que "réservées".
4. **Réservation** : Un bouton "Réserver" permet de réinitialiser les sélections de dates.

### Variables principales :
- `dateNow` : Stocke la date actuelle.
- `btnPlus` et `btnLess` : Boutons permettant de changer de mois.
- `allCells` : Liste de toutes les cellules de jours du calendrier.
- `firstDate`, `secondDate` : Stockent les dates sélectionnées par l'utilisateur.

### Fonctions principales :
- `initCalendar` : Génère le tableau du calendrier pour le mois en cours.
- `handleClick` : Gère la sélection des dates par l'utilisateur.
- `reserve` : Permet de valider la réservation et réinitialiser la sélection.
- `initReserve` : Vérifie et applique les réservations déjà effectuées, récupérées d'un fichier JSON.
*/

const dateNow = new Date()

let btnPlus = document.getElementById("btn-plus")
let btnLess = document.getElementById("btn-less")
let btnChaletOne = document.getElementById("chalet-1")
let btnChaletTwo = document.getElementById("chalet-2")
let btnChaletThree = document.getElementById("chalet-3")
let allCells;
let firstDate;
let secondDate;
let numeroChalets = 0;
let bungalow_id = 1;
let user_id = 1;


const dates = JSON.parse(localStorage.getItem('dates'));
console.log(dates)


// Fonction d'initialisation du calendrier
function initCalendar () {

    const firstDayInMonth = new Date(dateNow.getFullYear(), dateNow.getMonth(), 1) // Premier jour du mois
    const lastDayInMonth = new Date(dateNow.getFullYear(), dateNow.getMonth() + 1, 0) // Dernier jour du mois

    let firstWeek = document.createElement("tr"); // Création de la première semaine
    let calendar = document.getElementById("body-calendar") // Élément HTML du corps du calendrier
    let spanActualMonth = document.getElementById("actualMonth") // Élément affichant le nom du mois
    let monthName = dateNow.toLocaleString('fr-FR', { month: 'long' }); // Nom du mois en français
    calendar.innerHTML = "" // Réinitialise le calendrier

    actualWeekNumber = 1
    spanActualMonth.textContent = monthName // Affiche le nom du mois actuel

    // Crée les premières cellules vides si le premier jour du mois ne commence pas un dimanche
    if (firstDayInMonth.getDay() !== 0){
        for (i = 0; i < firstDayInMonth.getDay(); i++){
            emptyCell = document.createElement("td")
            emptyCell.textContent = ""; // Cellule vide
            firstWeek.id = "week-" + actualWeekNumber
            firstWeek.appendChild(emptyCell)
        }
    } else {
        firstWeek.id = "week-" + actualWeekNumber
    }
    calendar.appendChild(firstWeek)

    // Crée les cellules du tableau avec les jours du mois
    for (i = 1 ; i <= lastDayInMonth.getDate() ; i++){
        if ((i - 1 + firstDayInMonth.getDay()) % 7 === 0){ // Crée une nouvelle semaine lorsque nécessaire
            newWeek = document.createElement("tr")
            actualWeekNumber++
            newWeek.id = "week-" + actualWeekNumber
            calendar.appendChild(newWeek)
        }
        week = document.getElementById("week-" + actualWeekNumber)
        dayCell = document.createElement("td")
        dayCell.textContent = i; // Insère le jour du mois
        dayCell.id = firstDayInMonth.getFullYear() + "-" + (firstDayInMonth.getMonth() + 1) + "-" + i; // Format d'ID : Y-m-d
        dayCell.addEventListener("click", handleClick) // Ajoute un événement de clic pour sélectionner les dates
        week.appendChild(dayCell)
    }

    allCells = document.querySelectorAll("#calendar td"); // Sélectionne toutes les cellules du calendrier
    initReserve(bungalow_id) // Vérifie les réservations existantes
}


// Gère la sélection des dates
function handleClick (event) {

    if(firstDate === undefined){ // Si aucune première date n'est sélectionnée
        console.log("first date")
        firstDate = this.id
        console.log(firstDate)
        timeStampFirstDate = new Date(firstDate)
        document.getElementById(firstDate).className = "clicked" // Marque la première date sélectionnée

    } else if (secondDate === undefined){ // Si la première date est sélectionnée mais pas la seconde
        secondDate = this.id
        timeStampSecondDate = new Date(secondDate)
        document.getElementById(secondDate).className = "clicked" // Marque la seconde date

        // Sélectionne les dates entre les deux
        allCells.forEach(element => {
            timeStampDate = new Date(element.id)
            if (timeStampDate > timeStampFirstDate && timeStampDate < timeStampSecondDate){
                element.className = "clicked" // Marque les dates entre les deux
            }
        });

    } else { // Si deux dates sont déjà sélectionnées, réinitialise la sélection
        reserve(firstDate, secondDate)
        firstDate = undefined;
        secondDate = undefined;
        document.location.href
    }
}

// Réinitialise les réservations
async function reserve (firstDate, secondDate) {
    console.log('user_id : ' + user_id)
    console.log('first date : ' + firstDate)
    console.log('second date : ' + secondDate)
    console.log('bungalow_id : ' + bungalow_id)

    
    let url = document.location.href; 
    url = url.replace("/getAllBooking", "/createBooking");

    const data = {
        user_id: user_id,
        start_date: firstDate,
        end_date: secondDate,
        bungalow_id: bungalow_id,
    };

    console.log(JSON.stringify(data))

    // Effectuer la requête POST
    fetch(url, {
        method: 'POST', // Indique que c'est une requête POST
        headers: {
            'Content-Type': 'application/json' // Indique le type de contenu
        },
        body: JSON.stringify(data) // Convertit l'objet en JSON
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
        }
        return response.text(); // Utiliser .text() pour obtenir la réponse brute
    })
    .then(text => {
        console.log('Response Text:', text); // Afficher la réponse brute
        return JSON.parse(text); // Tenter de parser le texte en JSON
        })
    .then(data => {
        console.log('Success:', data); // Traitez les données renvoyées par le serveur
    })
    .catch((error) => {
        console.error('Error:', error); // Gérer les erreurs
    });
}

// Vérifie les dates réservées en consultant un fichier JSON
async function initReserve() {
    
    // Parcourt les réservations et marque les cellules réservées
        dates.forEach(dateChalet => {
        if (dateChalet.bungalow_id===bungalow_id){

            startDate = new Date(dateChalet.start_date)
            endDate = new Date(dateChalet.end_date)
            startDate.setHours(0, 0, 0, 0);

            allCells.forEach(cellule => {
                verifyDate = new Date(cellule.id)
    
                if (verifyDate >= startDate && verifyDate <= endDate){
                    cellule.className = "reserved" // Marque la date comme réservée
                }
            });
            
        }
        

    });
}

async function checkReserve (allCellsClicked){

    const response = await fetch('reservation.json'); // Récupère les réservations depuis un fichier JSON
    const names = await response.json();
    let check = true

    // Parcourt les réservations et verifie que les cellules cliquées ne soient pas déjà validées
    names.chalets[numeroChalets].reservations.forEach(dateChalet => {

        startDate = dateChalet.startDate
        endDate = dateChalet.endDate

        allCellsClicked.forEach( cells => {
            if (cells.id>= startDate && cells.id <= endDate){
                console.log("Date invalide : déjà reservé")
                check = false;
            }
        })

        return check;


    });
    
}

// Ajoute un événement au bouton de réservation pour réinitialiser la sélection
reserveButton = document.getElementById("reserve")
reserveButton.addEventListener("click", () => reserve(firstDate, secondDate))

// Change de mois avec les boutons plus et moins
btnPlus.addEventListener('click', () => {
    dateNow.setMonth(dateNow.getMonth() + 1)
    initCalendar()
})
btnLess.addEventListener('click', () => {
    dateNow.setMonth(dateNow.getMonth() - 1)
    initCalendar()
})

btnChaletOne.addEventListener('click', () => {
    bungalow_id=1
    initCalendar()
})
btnChaletTwo.addEventListener('click', () => {
    bungalow_id=2
    initCalendar()
})
btnChaletThree.addEventListener('click', () => {
    bungalow_id=3
    initCalendar()
})

// Initialisation du calendrier au chargement
initCalendar()