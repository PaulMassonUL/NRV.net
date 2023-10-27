import festivalLoader from '../../festival_loader.js';
import Panier_ui from "./panier_ui";
class Panier {

    constructor() {
        this.loading = false;
        this.cart = JSON.parse(localStorage.getItem('cart')) || [];
    }

    add_evening_to_panier(evening) {
        this.cart.push(evening.evening.id);
        localStorage.setItem('cart', JSON.stringify(this.cart));
    }

    load_cart(id) {
        if (this.loading) return;
        festivalLoader.fetch_festival_api('/evening/' + id)
            .then(evening => {
                Panier_ui.render_panier(evening);
                this.loading = false;
            })
            .catch(error => {
                console.error(error);
                this.loading = false;
            });
    }
}

export default new Panier();