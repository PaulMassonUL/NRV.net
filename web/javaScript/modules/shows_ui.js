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
        showsContainer.innerHTML = '';
        shows.shows.forEach(show => {
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

    render_spots(spots) {
        const spotsContainer = document.getElementsByClassName('filtre')[0];

        // Vérifiez si l'élément container existe
        if (!spotsContainer) {
            console.error("Le conteneur des lieux est introuvable.");
            return;
        }
        //si spotsContainer existe, on vide le contenu
        spotsContainer.innerHTML = '';

        const li = document.createElement('li');
        li.innerHTML = `
        <a href="#">Tous les lieux</a>
        `;
        li.addEventListener('click', () => {
            Shows.load_shows();
        });
        spotsContainer.appendChild(li);

        spots.spots.forEach(spot => {
            const li = document.createElement('li');
            li.innerHTML = `
            <a href="#">${spot.name}</a>
            `;
            li.addEventListener('click', () => {
                Shows.load_shows_by_spot(spot.name);
            });
            spotsContainer.appendChild(li);
        });
    }

    render_dates(dates) {
        const datesContainer = document.getElementsByClassName('filtre')[0];

        // Vérifiez si l'élément container existe
        if (!datesContainer) {
            console.error("Le conteneur des dates est introuvable.");
            return;
        }
        //si datesContainer existe, on vide le contenu
        datesContainer.innerHTML = '';

        const li = document.createElement('li');
        li.innerHTML = `
        <a href="#">Tous les jours</a>
        `;
        li.addEventListener('click', () => {
            Shows.load_shows();
        });
        datesContainer.appendChild(li);

        dates.dates.forEach(date => {
            let dateOrigine = date;
            //transformer date en français
            const date_li = new Date(date);
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'};
            date = date_li.toLocaleDateString('fr-FR', options);
            date = date.charAt(0).toUpperCase() + date.slice(1);

            const li = document.createElement('li');
            li.innerHTML = `
            <a href="#">${date}</a>
            `;
            //récupérer la date au format yyyy-mm-dd
            dateOrigine = dateOrigine.slice(0, 10);
            li.addEventListener('click', () => {
                Shows.load_shows_by_date(dateOrigine);
            });
            datesContainer.appendChild(li);
        });
    }

    render_thematics(thematics) {
        const thematicsContainer = document.getElementsByClassName('filtre')[0];

        // Vérifiez si l'élément container existe
        if (!thematicsContainer) {
            console.error("Le conteneur des thématiques est introuvable.");
            return;
        }

        //si thematicsContainer existe, on vide le contenu
        thematicsContainer.innerHTML = '';

        const li = document.createElement('li');
        li.innerHTML = `
        <a href="#">Tous les styles</a>
        `;
        li.addEventListener('click', () => {
            Shows.load_shows();
        });
        thematicsContainer.appendChild(li);

        thematics.thematics.forEach(thematic => {
            const li = document.createElement('li');
            li.innerHTML = `
            <a href="#">${thematic}</a>
            `;
            li.addEventListener('click', () => {
                Shows.load_shows_by_thematic(thematic);
            });
            thematicsContainer.appendChild(li);
        });
    }

}
export default new ShowsUI();