function incrementerCompteur(compteurElement, nombreCible, vitesseIncrementation) {
    let compteur = 0;

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

// Fonction pour gérer l'intersection de la div avec la fenêtre
function gestionIntersection(entries, observer) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            // La div est maintenant visible dans la fenêtre
            // Appelez la fonction pour commencer l'incrémentation des compteurs
            incrementerCompteur(compteurElement, 30, 40);
            incrementerCompteur(compteurElement2, 500, 0.1);
            incrementerCompteur(compteurElement3, 3, 400);
            incrementerCompteur(compteurElement4, 6, 200);

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