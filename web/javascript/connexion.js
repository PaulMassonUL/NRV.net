import connexionForm from "./modules/connexion/connexion_form.js";

document.addEventListener('DOMContentLoaded', () => {

    connexionForm.initializeEventListeners();

});

const container = document.getElementById('container');

const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    console.log("login");
    container.classList.remove("active");
});