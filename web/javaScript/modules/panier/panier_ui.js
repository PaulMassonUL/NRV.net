class Panier_ui {

    total_ttc;
    total_ht;

    constructor() {
        this.total_ttc = 0;
        this.total_ht = 0;
    }
    render_panier(evening) {

        this.total_ttc += evening.evening.price;
        this.total_ht += evening.evening.price / 1.2;

        const divPanier = document.getElementsByClassName('tickets')[0];
        const article = document.createElement('article');
        const liste_artists_name = [];
        evening.evening.shows.forEach(show => {
            show.artists.forEach(artist => {
                liste_artists_name.push(artist.name);
            });
        });

        const dateOrigin = new Date(evening.evening.date);
        let date = dateOrigin.toLocaleDateString('fr-FR', {weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric'});
        date = date.charAt(0).toUpperCase() + date.slice(1);

        article.innerHTML = `
        <p>${evening.evening.name}</p>
        <p>${date}</p>
        <p>${liste_artists_name.join(' - ')}</p>
        <p>Tarif : ${evening.evening.price}€</p>
        `;

        divPanier.appendChild(article);

        const recap = document.getElementsByClassName('recap')[0];
        //modfier mon h2 présent dans recap
        recap.innerHTML = `
        <h2>Récapitulatif</h2>
        <p>Total HT : ${this.total_ht.toFixed(2)}€</p>
        <p>Total TTC : ${this.total_ttc.toFixed(2)}€</p>
        <button class="button button-green">Payer</button>
        <div class="type-payment">
                <h3>Nous accepetons :</h3>
                <div class="logos">
                    <img src="../img/icons/visa.png" alt="logo visa">
                    <img src="../img/icons/mastercard.png" alt="logo mastercard">
                    <img src="../img/icons/paypal.png" alt="logo paypal">
                </div>
            </div>
        `;


    }


}

export default new Panier_ui();