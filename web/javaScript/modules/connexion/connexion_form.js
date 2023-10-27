import festivalLoader from '../../festivalLoader.js';

class ConnexionForm {

    initializeEventListeners() {
        const button = document.getElementById("button-connexion");
        button.addEventListener('click', () => {
            const form = document.getElementById("card-login");
            const email = form.querySelector("#email").value;
            const password = form.querySelector("#password").value;

            const options = {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Basic ' + btoa(email + ':' + password)
                },
                mode: 'cors'
            };

            festivalLoader.fetch_festival_api('/auth/signin', options)
                .then(response => {
                    if (response.success) {
                        localStorage.setItem('token', response.token);
                        window.location.href = 'accueil.html';
                    }
                });
        });
    }

}

export default new ConnexionForm();