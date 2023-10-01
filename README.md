# Structure Esport

Bienvenue dans le projet Structure Esport, un site dédié à une structures esport et de ses partenaires. Cette application web permet de gérer des compétitions, des équipes, des partenaires, des streamers et des actualités liées à l'esport de la structure.

Vous pouvez accéder au site web ici : [Structure Esport](http://structureesport.ryan-mazzitelli.fr/)

## Aperçu du Site

### Version Desktop
![Version Desktop](https://postimg.cc/CRhYJqGs)

### Version Mobile
![Version Mobile](https://ibb.co/R0hFJJ2)

## Fonctionnalités

FRONT-END/BACK-END : 
- Affichage dynamique (global).
- Gestion des compétitions (CRUD), redirection vers les compétitions et affichage des informations au passage de la compétiton.
- Gestion des équipes esport (CRUD), 3 équipes dont 4 membres (3 joueurs et 1 coach) avec description.
- Gestion des partenaires (CRUD), limite max x2. Affichage de ses réseaux sociaux.
- Gestion des streamers (CRUD), limite max x3. Affichage du streamer avec sa bannière et redirection vers son twitch.
- Publication d'actualités (CRUD), pas de limite. Gestion des actualités de la structures.
- Affichage du cookie.
- Utilisation de AOS.js
- Affichage dynamique du compteur et calculs de la vitesse pour un affichage cohérent.
  
BACK-END : 
- Système d'inscription et d'authentification.
- Système de hierarchie des rôles (Admin/user)
- Pannel d'administration pour modifier l'entierté du site.
  ![Pannel d'admin](https://ibb.co/WVP6xL1)
- Restrictions des routes en fonction des rôles.
- Restrictions des cruds pour l'harmonie du front.
- Système généraliser d'ajout d'image (400x150, 550x200, 300x300, 330x175)
- Cookie.

BDD : 
- Sqlite (Utilisation en local)
- MySql (Pour la mise en prod)

DOCUMENTATION : 
- Génération des mentions légales
- Génération des politiques de confidentialité.
- Symfony Docs Global
- Symfony Docs Cookie
- SaSS (Première mise en prod avec Sass)


