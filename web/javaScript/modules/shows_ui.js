import Shows from "./shows";

class ShowsUI {

    render_shows(shows) {
        const showsContainer= document.getElementsByClassName('article-list')[0];

        // Vérifiez si l'élément container existe
        if (!showsContainer) {
            console.error("Le conteneur des spectacles est introuvable.");
            return;
        }

        if (!Array.isArray(shows.shows)) {
            console.error("Les spectacles ne sont pas au format d'un tableau.");
            return;
        }

        shows.shows.forEach(show => {
            console.log(show);
            const article = document.createElement('article');
            const liste_artists_name = [];
            show.artists.forEach(artist => {
                liste_artists_name.push(artist.name);
            });
            const artistNamesString = liste_artists_name.join(' - ');

            //afficher la date en français + heure sans les secondes
            const date = new Date(show.date + ' ' + show.time);
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute:'numeric'};
            show.date = date.toLocaleDateString('fr-FR', options);
            show.date = show.date.charAt(0).toUpperCase() + show.date.slice(1);

            article.innerHTML = `
            <div class="article-content">
                <h3>${show.title}</h3>
                <p>${show.date}</p>
                <p>${artistNamesString}</p>
            </div>
            <img src="${show.images[0].path}">
            `;

            showsContainer.appendChild(article);
        });
    }

}
export default new ShowsUI();