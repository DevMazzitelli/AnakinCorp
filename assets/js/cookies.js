document.addEventListener('DOMContentLoaded', function () {
    const cookieContainer = document.querySelector('.cookie');
    const acceptButton = document.querySelector('.acceptButton');
    const declineButton = document.querySelector('.declineButton');

    // Vérifier si l'utilisateur a déjà accepté les cookies
    if (document.cookie.includes('cookiesAccepted=true')) {
        cookieContainer.style.display = 'none';
    }

    // Écouteur de clic sur le bouton "Accepter"
    acceptButton.addEventListener('click', function () {
        // Définir un cookie pour enregistrer le consentement de l'utilisateur
        document.cookie = 'cookiesAccepted=true; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/';
        cookieContainer.style.display = 'none';
    });

    // Écouteur de clic sur le bouton "Refuser"
    declineButton.addEventListener('click', function () {
        // Afficher un message d'erreur
        alert('Vous devez accepter les cookies pour continuer');
    });
});