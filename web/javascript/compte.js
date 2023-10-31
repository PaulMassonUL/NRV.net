import compte from "./modules/compte/compte.js";

// recuperer le access_token du localstorage
const token = localStorage.getItem("access_token");

// rediriger vers la page de connexion si le token n'existe pas
if (token == null) {
    window.location.href = "connexion.html";
} else {
    // sinon faire une requete pour recuperer les informations de l'utilisateur
    compte.getUser();
}