import BackoffJauge from './backoff_jauge.js';

class Backoff_jauge_ui {
    render_places(places) {
        // const placesContainer = document.getElementsByClassName('backoff_jauge')[0];

        console.log(places);
        // Vérifiez si l'élément container existe
        // if (!placesContainer) {
        //     console.error("Le conteneur des places est introuvable.");
        //     return;
        // }
        // //si placesContainer existe, on vide le contenu
        // placesContainer.innerHTML = '';
        //
        // const article = document.createElement('article');
        // article.innerHTML = `
        //     <p>${places.places}</p>
        // `;
        //
        // placesContainer.appendChild(article);
    }
}

export default new Backoff_jauge_ui();