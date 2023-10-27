class Evenings_ui {

    render_evening(evening) {
        this.render_evening_desc(evening);
        this.render_evening_shows(evening);
    }

    render_evening_desc(evening) {
        const h1 = document.getElementsByTagName('h1')[0];
        h1.innerHTML = evening.evening.name;

        const eveningDesc = document.getElementsByClassName('eveningDescription')[0];
        // Créez un élément article pour contenir les informations de la soirée
        const eveningArticle1 = document.createElement('article');
        const eveningArticle2 = document.createElement('article');

        const dateOrigin = new Date(evening.evening.date);
        let date = dateOrigin.toLocaleDateString('fr-FR', { weekday: 'short', day: 'numeric', month: 'short' });
        date = date.toUpperCase();

        let dateHour = dateOrigin.toLocaleTimeString('fr-FR', { hour: '2-digit', minute: '2-digit' });

        eveningArticle1.innerHTML = `
            <p><span class="underline">${date}</span></p>
            <p><span class="underline">${dateHour}</span></p>
            <p><span class="underline">${evening.evening.spot.name}</span></p>
        `;

        eveningArticle2.innerHTML = `
            <p>${evening.evening.thematic}</p>
            <p>Tarif : ${evening.evening.price}€</p>
            <p>Tarif réduit : ${evening.evening.reduced_price}€</p>
        `;

        eveningDesc.appendChild(eveningArticle1);
        eveningDesc.appendChild(eveningArticle2);
    }

    render_evening_shows(evening) {
        const list_shows = document.getElementsByClassName('list_shows')[0];

        evening.evening.shows.forEach(show => {
            const liste_artists_name = [];
            show.artists.forEach(artist => {
                liste_artists_name.push(artist.name);
            });
            const artistNamesString = liste_artists_name.join(' - ');

            const showSection = document.createElement('section');
            showSection.classList.add('show');
            const article = document.createElement('article');
            article.classList.add('showDescription');
            article.innerHTML = `
                <h2>${show.title}</h2>
                <p>${artistNamesString} - ${evening.evening.thematic}</p>
                <p class="description">${show.description}</p>
            `;
            showSection.appendChild(article);
            const div = document.createElement('div');
            div.classList.add('video');
            //créer un element video en controls autoplay
            const video = document.createElement('video');
            video.setAttribute('controls', '');
            video.setAttribute('autoplay', '');
            video.setAttribute('src', show.video);
            div.appendChild(video);
            showSection.appendChild(div);
            list_shows.appendChild(showSection);
        });

    }
}
export default new Evenings_ui();