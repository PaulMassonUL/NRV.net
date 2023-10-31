class Backoff_jauge_ui {
    render_places(places, eveningDate) {
        const progressBarPlaceHTML = document.getElementById('progress-place');
        const placesMaxHTML = document.getElementById('max-value');
        const placesAvailableHTML = document.getElementById('places-available');
        const textEvening = document.querySelector('.text-evening');

        const placesTotal = places.places.nbTotalPlaces;
        const placesSold = places.places.nbTicketSold;
        const placesAvailable = placesTotal - placesSold;

        textEvening.innerHTML = `Soirée du ${this.formatDate(eveningDate)}`;
        textEvening.value = eveningDate;
        progressBarPlaceHTML.setAttribute('value', placesSold);
        progressBarPlaceHTML.setAttribute('max', placesTotal);
        placesMaxHTML.innerHTML = `${placesTotal}`;
        placesAvailableHTML.innerHTML = `${placesAvailable}`;
    }

    function

    formatDate(inputDate) {
        const date = new Date(inputDate);
        const day = date.getDate().toString().padStart(2, '0');
        const month = (date.getMonth() + 1).toString().padStart(2, '0');
        const year = date.getFullYear();
        const hours = date.getHours().toString().padStart(2, '0');
        const minutes = date.getMinutes().toString().padStart(2, '0');

        const formattedDate = `${day}.${month}.${year} / ${hours}h${minutes}`;
        return formattedDate;
    }
}

export default new Backoff_jauge_ui();