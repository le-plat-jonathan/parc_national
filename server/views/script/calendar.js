const dates = JSON.parse(localStorage.getItem('reservedDays'));

let allCells = document.querySelectorAll("table th")

// Applique les dates réservées depuis le JSON
async function initReserve(dates) {
    allCells = document.querySelectorAll("table th");

    if (dates){
        dates.forEach(date=>{
            startDate = new Date(date.start_date)
            endDate = new Date(date.end_date)

            console.log('start : ' + startDate)
            console.log('end : ' + endDate)

            allCells.forEach(cellule => {
                verifyDate = new Date (cellule.id)
                console.log('date verifiée : ' + verifyDate)
                if (verifyDate >= startDate && verifyDate <= endDate){
                    cellule.className = "reserved"
                }
            });
        });
    }
}

initReserve(dates)

// // Vérifie si une date sélectionnée est déjà réservée
// async function checkReserve (allCellsClicked){
//     const response = await fetch('reservation.json');
//     const names = await response.json();
//     let check = true

//     names.chalets[numeroChalets].reservations.forEach(dateChalet => {
//         startDate = dateChalet.startDate
//         endDate = dateChalet.endDate

//         allCellsClicked.forEach( cells => {
//             if (cells.id >= startDate && cells.id <= endDate){
//                 console.log("Date invalide : déjà reservée")
//                 check = false;
//             }
//         })

//         return check;
//     });
// }

// // Récupère les réservations existantes via la route PHP
// async function getDates (id) {
//     fetch(`/routes/bookingRoutes.php/getBookingByBungalowId/${id}`, { 
//         method: 'GET',
//         headers: {
//             'Content-Type': 'application/json'
//         }
//     })
//     .then(response => {
//         if (!response.ok) {
//             throw new Error('Erreur dans la requête réseau');
//         }
//         return response.json();
//     })
//     .then(data => {
//         initReserve(data);
//     })
//     .catch(error => {
//         console.error('Erreur:', error);
//     });
// }

// // Récupère les bungalows existants via la route PHP
// async function getBungalows () {
//     fetch(`/routes/bungalowRoutes.php/getAllBungalow`, { 
//         method: 'GET',
//         headers: {
//             'Content-Type': 'application/json'
//         }
//     })
//     .then(response => {
//         if (!response.ok) {
//             throw new Error('Erreur dans la requête réseau');
//         }
//         return response.json();
//     })
//     .then(data => {
//         console.log(data)
//     })
//     .catch(error => {
//         console.error('Erreur:', error);
//     });
// }

// // Bouton pour soumettre une réservation
// reserveButton = document.getElementById("reserve")
// reserveButton.addEventListener("click", () => reserve(firstDate, secondDate))

// // Changer de mois
// btnPlus.addEventListener('click', () => {
//     dateNow.setMonth(dateNow.getMonth() + 1)
//     initCalendar()
// })
// btnLess.addEventListener('click', () => {
//     dateNow.setMonth(dateNow.getMonth() - 1)
//     initCalendar()
// })

// // Changer de chalet
// btnChaletOne.addEventListener('click', () => {
//     numeroChalets = 0
//     initCalendar()
// })
// btnChaletTwo.addEventListener('click', () => {
//     numeroChalets = 1
//     initCalendar()
// })
// btnChaletThree.addEventListener('click', () => {
//     numeroChalets = 2
//     initCalendar()
// })

// // Initialisation du calendrier au chargement
// initCalendar()

// getBungalows()



// // Gère la sélection des dates
// function handleClick (event) {
//     if(firstDate === undefined){
//         firstDate = this.id
//         timeStampFirstDate = new Date(firstDate)
//         document.getElementById(firstDate).className = "clicked" 
//     } else if (secondDate === undefined){ 
//         secondDate = this.id
//         timeStampSecondDate = new Date(secondDate)
//         document.getElementById(secondDate).className = "clicked" 

//         // Marque les dates entre les deux
//         allCells.forEach(element => {
//             timeStampDate = new Date(element.id)
//             if (timeStampDate > timeStampFirstDate && timeStampDate < timeStampSecondDate){
//                 element.className = "clicked"
//             }
//         });

//     } else { 
//         firstDate = undefined;
//         secondDate = undefined;
//         initCalendar()
//     }
// }

// // Réinitialise les réservations après soumission
// async function reserve () {
//     firstDate = undefined;
//     secondDate = undefined;
//     allCellsClicked = document.querySelectorAll("#calendar .clicked");
//     const check = await checkReserve(allCellsClicked);
//     if (check) {console.log(check)}
//     initCalendar();
// }