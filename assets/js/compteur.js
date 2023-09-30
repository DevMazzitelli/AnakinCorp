function incrementerCompteur(compteurElement, nombreCible, vitesseIncrementation) {
    let compteur = 0;
    let compteursRestants = 4;

    const interval = setInterval(() => {
        compteur++;
        compteurElement.textContent = compteur;

        if (compteur === nombreCible) {
            clearInterval(interval); // Arrêtez l'incrémentation une fois que le nombre cible est atteint
            compteursRestants--;

            if (compteursRestants === 0) {
                // Tous les compteurs ont atteint leur cible, vous pouvez faire quelque chose ici si nécessaire
            }
        }
    }, vitesseIncrementation);
}

const apiUrl = 'https://127.0.0.1:8000/compteur';
const apiUrlProd = 'http://structureesport.ryan-mazzitelli.fr/compteur';

// Fonction pour gérer l'intersection de la div avec la fenêtre
function gestionIntersection(entries, observer) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {

            fetch(apiUrl)
                .then(function (response) {
                    return(response.json());
                }) .then(function (data) {
                incrementerCompteur(compteurElement, data['nbrJoueur'], (5000 / data['nbrJoueur']))
                incrementerCompteur(compteurElement2, data['nbrMembre'], (5000 / data['nbrMembre']))
                incrementerCompteur(compteurElement3, data['nbrEquipe'], (5000 / data['nbrEquipe']))
                incrementerCompteur(compteurElement4, data['nbrStaff'], (5000 / data['nbrStaff']))
            } );

            // Arrêtez de surveiller l'intersection une fois que le code est activé
            observer.unobserve(entry.target);
        }
    });
}

const compteurElement = document.getElementById("compteur");
const compteurElement2 = document.getElementById("compteur2");
const compteurElement3 = document.getElementById("compteur3");
const compteurElement4 = document.getElementById("compteur4");

// Obtenez la div que vous souhaitez observer
const compteurDiv = document.querySelector(".compteur");

// Créez un observateur d'intersection
const observer = new IntersectionObserver(gestionIntersection);

// Commencez à surveiller l'intersection de la div avec la fenêtre
observer.observe(compteurDiv);
