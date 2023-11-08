# NRV.net

## URL
- Dépôt git : https://github.com/PaulMassonUL/NRV.net.git
- Site : http://localhost:63342/NRV.net/web/html/list_show.html
- API : http://docketu.iutnc.univ-lorraine.fr:11110 + nom de la ressource (ex : /shows)



## Fonctionnalités de base :

- [x] Liste des spectacles, accès au détail de la soirée 
- [x] Filtrage par date
- [x] Filtrage par style
- [x] Filtrage par lieu
- [x] Ajout au panier
- [x] Affichage du panier
- [ ] Validation du panier et transformation en commande : récapitulatif + montant
- [x] Saisie des coordonnées du client et moyen de paiement
- [ ] Validation finale : création des billets
- [x] Gestion des places disponibles
    ## Pour les producteurs :
    - [x] Jauge des spectacles : nombre de places vendues
## Fonctionnalités additionnelles :
- [ ] pagination des listes
- [x] modification du panier, panier persistant
- [ ] ajout, modification de spectacles et soirées
- [ ] gestion des lieux et des places
- [ ] ventes de billets à l'entrée

## User de test :
- login : user1@example.com, user2@example.com, user3@example.com
- password : password


## Installation

### Prérequis

- PHP 8.1
- Composer
- sass
- nodejs

### Installation

- Cloner le projet
- Installer les dépendances avec composer dans le dossier `festival.components`
- Installer les dépendances avec npm dans le dossier `web/javascript`
- Compiler les fichiers scss avec la commande `sass --watch scss:css` dans le dossier `web`


## Déploiement

- port adminer sur docketu : 11112

## Tableau de bord

### Coneception

- Conception du modèle de données : Elian, Régis, Yvan, Paul
- Maquette sur figma : Elian, Régis, Yvan
- Prototype sur figma : Elian
- Création du jeu de données : Paul
- Scénario et Arborecence HTML : Elian, Régis, Yvan, Paul, Mathis

### Back-end

- Initialisation du projet : Elian

- #### Services
  - Service Authentification : Paul
  - Service Spot : Yvan
  - Service Show : Yvan, Paul, Mathis
  - Service Commande : Elian
  - Service Evening : Régis, Paul, Yvan
  - Service User : Paul

- Actions : Elian, Régis, Yvan, Paul, Mathis
  

### Front-end

- HTML : Elian, Régis, Yvan, Paul, Mathis
- SCSS : Yvan, Régis
- JS : Régis, Yvan, Paul, Mathis
- Déploiement : Elian, Paul









