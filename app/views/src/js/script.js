/*
Ce fichier JavaScript gère un calendrier interactif permettant à l'utilisateur de visualiser et de réserver des dates pour différents bungalows. 

### Fonctionnalités principales :
1. **Génération du calendrier** : Affiche un tableau représentant le mois en cours avec des cellules pour chaque jour. L'utilisateur peut naviguer entre les mois.
2. **Sélection des dates** : Permet la sélection d'une première et d'une seconde date pour effectuer une réservation. Les jours entre ces deux dates sont automatiquement sélectionnés.
3. **Gestion des réservations** : Vérifie si les dates sélectionnées sont disponibles, en se basant sur les réservations existantes, et met à jour l'interface.
4. **Réservation** : Envoie les dates sélectionnées au serveur pour créer une nouvelle réservation, après vérification de leur disponibilité.
5. **Navigation entre bungalows** : Permet de visualiser et gérer les réservations de différents bungalows via des boutons.

### Variables principales :
- `dateNow` : Stocke la date actuelle pour suivre le mois affiché dans le calendrier.
- `btnPlus`, `btnLess` : Boutons permettant de changer le mois affiché dans le calendrier.
- `btnChaletOne`, `btnChaletTwo`, `btnChaletThree` : Boutons pour changer le bungalow affiché.
- `allCells` : Contient toutes les cellules du tableau calendrier.
- `firstDate`, `secondDate` : Stockent les dates sélectionnées par l'utilisateur pour une réservation.
- `bungalow_id`, `user_id` : Identifiants pour gérer les réservations spécifiques à un bungalow et un utilisateur.

### Fonctions principales :
- `initCalendar` : Génère le tableau du calendrier pour le mois en cours et permet de naviguer entre les mois.
- `handleClick` : Gère la sélection des dates par l'utilisateur et met à jour visuellement les dates sélectionnées.
- `reserve` : Vérifie la disponibilité des dates sélectionnées et effectue une réservation en envoyant une requête au serveur.
- `initReserve` : Récupère les réservations existantes et marque les dates déjà réservées dans le calendrier.
- `checkReserve` : Vérifie si les dates sélectionnées sont déjà réservées pour le bungalow choisi.
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

    } else {
        firstDate = undefined;
        secondDate = undefined;
        initCalendar()
    }
}

// Réinitialise les réservations
async function reserve (firstDate, secondDate) {
    console.log("reserve atteinte")

    let allCellsClicked = document.getElementsByClassName("clicked");

    // Convertit HTMLCollection en tableau
    allCellsClicked = Array.from(allCellsClicked);

    // Attendre la réponse de checkReserve
    let check = await checkReserve(allCellsClicked);

    if (check) {

            let url = document.location.href; 
            url = url.replace("/getAllBooking", "/createBooking");

            const data = {
                user_id: user_id,
                start_date: firstDate,
                end_date: secondDate,
                bungalow_id: bungalow_id,
            };

            console.log(data)
            console.log(JSON.stringify(data))

            // Effectuer la requête POST
            fetch(url, {
                method: 'POST', // Indique que c'est une requête POST
                headers: {
                    'Content-Type': 'application/json' // Indique le type de contenu
                },
                body: JSON.stringify(data) // Convertit l'objet en JSON
            })
            .then(data => {
                console.log('Success:', data); // Traitez les données renvoyées par le serveur
                location.reload()
            })
            .catch((error) => {
                console.error('Error:', data); // Gérer les erreurs
            });
        } else {

            // Ajoute le code à exécuter si la réservation n'est pas possible
                console.log("Réservation non possible");
        }
    
    }

// Vérifie les dates réservées en consultant un fichier JSON
async function initReserve() {
    
    // Parcourt les réservations et marque les cellules réservées
        dates.forEach(dateChalet => {
        if (dateChalet.bungalow_id===bungalow_id){
            console.log(dateChalet.bungalow_id)

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

async function checkReserve(allCellsClicked) {
    let check = true;

    // Parcourt les réservations et vérifie que les cellules cliquées ne soient pas déjà réservées
    for (let dateChalet of dates) {
            if (dateChalet.bungalow_id===bungalow_id){
            let startDate = new Date(dateChalet.start_date);
            let endDate = new Date(dateChalet.end_date);
            startDate.setHours(0, 0, 0, 0);
            endDate.setHours(0, 0, 0, 0);

            // Vérifie si l'une des cellules cliquées tombe dans la période réservée
            for (let cell of allCellsClicked) {
                let date = new Date(cell.id);
                date.setHours(0, 0, 0, 0);

                if (date >= startDate && date <= endDate) {
                    check = false;
                    // Sortir des deux boucles dès que la première correspondance est trouvée
                    return check;
                }
            }
        }
    }

    return check; // Retourne true si aucune cellule ne correspond
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