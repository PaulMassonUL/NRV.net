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
            article.innerHTML = `
            <div class="article-content">
                <h3>${show.title}</h3>
                <p>${show.time}</p>
                <p>${artistNamesString}</p>
            </div>
            <img src="${show.images[0].path}">
            `;

            showsContainer.appendChild(article);
        });
    }

}
export default new ShowsUI();