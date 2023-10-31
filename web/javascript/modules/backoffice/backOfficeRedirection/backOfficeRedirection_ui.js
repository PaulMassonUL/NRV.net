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
            <h3>Soirée du ${this.formatDate(date.date)}</h3>
            `;
            article.addEventListener('click', function () {
                // Redirigez l'utilisateur vers backoff_jauge.html
                window.location.href = `backoff_jauge.html?id=${date.idEvening}&date=${date.date}`;
            });
            backOffRedirection.appendChild(article);
        });
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

export default new backOfficeRedirection_ui();