document.addEventListener('DOMContentLoaded', function () {
    const subMenuMobile = document.querySelector('.sub-menuMobile');
    const nosEquipesMobileBtn = document.getElementById('nosEquipesMobile');
    const subMenuMobileSociaux = document.getElementById('sub-menuMobileSociaux');
    const sociauxMobileBtn = document.getElementById('sociauxMobile');

    // Fonction pour cacher tous les sous-menus sauf celui spécifié
    function hideAllSubMenus(exceptSubMenu) {
        const subMenus = [subMenuMobile, subMenuMobileSociaux];
        subMenus.forEach((subMenu) => {
            if (subMenu !== exceptSubMenu) {
                subMenu.classList.remove('visible');
            }
        });
    }

    // Ajouter un gestionnaire d'événement de clic pour le bouton "Nos Équipes Mobile"
    nosEquipesMobileBtn.addEventListener('click', function (event) {
        event.stopPropagation();
        // Inversez la visibilité du sous-menu en ajoutant ou en supprimant la classe 'visible'
        if (subMenuMobile.classList.contains('visible')) {
            subMenuMobile.classList.remove('visible'); // Cacher le sous-menu
        } else {
            // Avant d'afficher ce sous-menu, assurez-vous de masquer tous les autres
            hideAllSubMenus(subMenuMobile);
            subMenuMobile.classList.add('visible'); // Afficher le sous-menu
        }
    });

    // Ajouter un gestionnaire d'événement de clic pour le bouton "Sociaux Mobile"
    sociauxMobileBtn.addEventListener('click', function (event) {
        event.stopPropagation();
        // Inversez la visibilité du sous-menu en ajoutant ou en supprimant la classe 'visible'
        if (subMenuMobileSociaux.classList.contains('visible')) {
            subMenuMobileSociaux.classList.remove('visible'); // Cacher le sous-menu
        } else {
            // Avant d'afficher ce sous-menu, assurez-vous de masquer tous les autres
            hideAllSubMenus(subMenuMobileSociaux);
            subMenuMobileSociaux.classList.add('visible'); // Afficher le sous-menu
        }
    });

    // Gestionnaire d'événement de clic global pour masquer les sous-menus lorsque l'utilisateur clique ailleurs sur la page
    document.addEventListener('click', function (event) {
        hideAllSubMenus(null); // Masquer tous les sous-menus
    });

    // Gestionnaire d'événement de clic pour empêcher la propagation du clic en dehors du sous-menu
    subMenuMobile.addEventListener('click', function (event) {
        event.stopPropagation();
    });

    subMenuMobileSociaux.addEventListener('click', function (event) {
        event.stopPropagation();
    });
});
