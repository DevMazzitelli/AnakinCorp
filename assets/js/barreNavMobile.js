document.addEventListener('DOMContentLoaded', function () {
    // Sélectionnez le bouton et le sous-menu
    const nosEquipesMobileBtn = document.getElementById('nosEquipesMobile');
    const subMenuMobile = document.querySelector('.sub-menuMobile');

    // Ajoutez un gestionnaire d'événement de clic au bouton
    nosEquipesMobileBtn.addEventListener('click', function () {
        // Inversez la visibilité du sous-menu en ajoutant ou en supprimant la classe 'visible'
        if (subMenuMobile.classList.contains('visible')) {
            subMenuMobile.classList.remove('visible'); // Cacher le sous-menu
        } else {
            subMenuMobile.classList.add('visible'); // Afficher le sous-menu
        }
    });
});
