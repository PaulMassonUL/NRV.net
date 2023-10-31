import festivalLoader from '../../festival_loader.js';

class Compte {

    getUser() {
        const options = {
            method: 'GET',
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem("access_token")
            }
        };

        festivalLoader.fetch_festival_api('/user/', options)
            .then(response => {
                // récuperer les informations de l'utilisateur
                const firstname = document.getElementById("firstname");
                const lastname = document.getElementById("lastname");
                const email = document.getElementById("email");
                lastname.textContent = "Nom : " + response.last_name;
                firstname.textContent = "Prénom : " + response.first_name;
                email.textContent = "Adresse email : " + response.email;
            })
            .catch(() => {
                // si le token est invalide, envoyer le refresh token pour en avoir un nouveau
                const refreshToken = localStorage.getItem("refresh_token");
                this.refreshToken(refreshToken);
            });
    }

    refreshToken(refreshToken) {
        const options = {
            method: 'POST',
            body: JSON.stringify({
                'refresh_token': refreshToken
            })
        };

        festivalLoader.fetch_festival_api('/auth/refresh', options)
            .then(response => {
                // si le refresh token est valide, rediriger vers la page d'accueil
                localStorage.setItem("access_token", response.access_token);
                localStorage.setItem("refresh_token", response.refresh_token);
                window.location.href = "index.html";
            })
            .catch(() => {
                // si le refresh token est invalide, rediriger vers la page de connexion
                window.location.href = "connexion.html";
            });
    }

}

export default new Compte();