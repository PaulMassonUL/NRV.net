import festivalLoader from '../../festival_loader.js';

class InscriptionForm {

    initializeEventListeners() {
        const button = document.getElementById("signup-button");
        button.addEventListener('click', () => {
            button.disabled = true;

            const form = document.getElementById("signup-form");
            const errorDiv = form.getElementsByClassName("error")[0];
            const firstname = form.querySelector("#first_name").value;
            const lastname = form.querySelector("#last_name").value;
            const email = form.querySelector("#signup-email").value;
            const password = form.querySelector("#signup-password").value;

            if (firstname.length === 0 || lastname.length === 0 || email.length === 0 || password.length === 0) {
                button.disabled = false;
                // afficher l'erreur
                errorDiv.innerHTML = '<p class="error">Veuillez remplir tous les champs</p>';
                return;
            }
            if (email.search(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$/) < 0) {
                button.disabled = false;
                // afficher l'erreur
                errorDiv.innerHTML = '<p class="error">Veuillez entrer une adresse e-mail valide</p>';
                return;
            }
            if (password.search(/[a-z]/) < 0 || password.search(/[A-Z]/) < 0 || password.search(/[0-9]/) < 0) {
                button.disabled = false;
                // afficher l'erreur
                errorDiv.innerHTML = '<p class="error">Le mot de passe doit contenir au moins une lettre minuscule, une lettre majuscule et un chiffre</p>';
                return;
            }

            const formData = new FormData();
            formData.append('first_name', firstname);
            formData.append('last_name', lastname);
            formData.append('email', email);
            formData.append('password', password);

            const options = {
                method: 'POST',
                body: formData
            };

            errorDiv.innerHTML = '';
            festivalLoader.fetch_festival_api('/auth/signup', options)
                .then(() => {
                    window.location.reload();
                })
                .catch(() => {
                    button.disabled = false;
                    // afficher l'erreur
                    errorDiv.innerHTML = '<p class="error">Cette adresse e-mail est déjà utilisée</p>';
                    errorDiv.classList.add('active');
                });
        });
    }

}

export default new InscriptionForm();