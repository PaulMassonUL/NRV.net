import backOfficeRedirection from "./backOfficeRedirection";

class backOfficeRedirection_ui {
    render_backOffRedirection(dates) {
        const backOffRedirection = document.getElementsByClassName('sectionBackOff')[0];

        // Vérifiez si l'élément container existe
        if (!backOffRedirection) {
            console.error("Le conteneur des spectacles est introuvable.");
            return;
        }
        if (!Array.isArray(dates.dates)) {
            console.error("Les spectacles ne sont pas au format d'un tableau.");
            return;
        }
        backOffRedirection.innerHTML = '';
        dates.dates.forEach(date => {
            const article = document.createElement('article');

            article.innerHTML = `
            <h3>${date}</h3>
        </article>
            `;

            backOffRedirection.appendChild(article);
        });
    }
}

export default new backOfficeRedirection_ui();