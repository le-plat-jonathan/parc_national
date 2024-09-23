btnLess = document.getElementById("lessOne")
btnAdd = document.getElementById("addOne")

uri = document.location.href

function addOneToId() {
    // Récupère l'URL actuelle
    const currentUri = window.location.pathname;
    
    // Découpe l'URL en segments en utilisant "/" comme séparateur
    const segments = currentUri.split('/');
    
    // Récupère le dernier segment
    const lastSegment = segments.pop() || segments.pop(); // Pour gérer le "/" à la fin de l'URL
    
    console.log(segments)
    console.log (parseInt(lastSegment)+1);

    replace
}

addOneToId()

// const id = getLastIdFromUri();

// btnAdd.addEventListener('click', ()=> {
//     newId = parseInt(id)
//     document.location.href = uri + newId
// })
// console.log(uri)
