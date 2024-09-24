const dates = JSON.parse(localStorage.getItem('reservedDays'));

let allCells = document.querySelectorAll("table th")
let firstDate;
let endDate;

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
                // cellule.addEventListener(handleClick())
                verifyDate = new Date (cellule.id)
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
function handleClick (event) {
    if(firstDate === undefined){
        firstDate = this.id
        timeStampFirstDate = new Date(firstDate)
        document.getElementById(firstDate).className = "clicked" 
    } else if (secondDate === undefined){ 
        secondDate = this.id
        timeStampSecondDate = new Date(secondDate)
        document.getElementById(secondDate).className = "clicked" 

        // Marque les dates entre les deux
        allCells.forEach(element => {
            timeStampDate = new Date(element.id)
            if (timeStampDate > timeStampFirstDate && timeStampDate < timeStampSecondDate){
                element.className = "clicked"
            }
        });

    } else { 
        firstDate = undefined;
        secondDate = undefined;
        initCalendar()
    }
}

// // Réinitialise les réservations après soumission
// async function reserve () {
//     firstDate = undefined;
//     secondDate = undefined;
//     allCellsClicked = document.querySelectorAll("#calendar .clicked");
//     const check = await checkReserve(allCellsClicked);
//     if (check) {console.log(check)}
//     initCalendar();
// }