class Backoff_jauge_ui {
    render_places(places) {
        const progressBarPlaceHTML = document.getElementById('progress-place');
        const placesMaxHTML = document.getElementById('max-value');
        const placesAvailableHTML = document.getElementById('places-available');

        const placesTotal = places.places.nbTotalPlaces;
        const placesSold = places.places.nbTicketSold;
        const placesAvailable = placesTotal - placesSold;

        progressBarPlaceHTML.setAttribute('value', placesSold);
        placesMaxHTML.innerHTML = `${placesTotal}`;
        placesAvailableHTML.innerHTML = `${placesAvailable}`;

        console.log(places);
        console.log('test', placesAvailable);
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