import connexionForm from "./modules/connexion/connexion_form.js";
import inscriptionForm from "./modules/connexion/inscription_form.js";

document.addEventListener('DOMContentLoaded', () => {

    connexionForm.initializeEventListeners();
    inscriptionForm.initializeEventListeners();

});

const container = document.getElementById('container');

const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});