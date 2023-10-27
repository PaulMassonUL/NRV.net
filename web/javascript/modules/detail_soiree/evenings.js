import festivalLoader from "../../festival_loader";
import Evenings_ui from "./evenings_ui";
import Panier from "../panier/panier";

class Evenings {

    constructor() {
        this.loading = false;
        this.initializeEventListeners();
        this.evening = null;
    }

    initializeEventListeners() {
        const book = document.getElementById('add-panier');
        book.addEventListener('click', () => {
            console.log(this.evening);
            Panier.add_evening_to_panier(this.evening);
        });
    }


    load_evening(id) {
        console.log(id);
        if (this.loading) return;
        festivalLoader.fetch_festival_api('/evening/' + id)
            .then(evening => {
                this.evening = evening;
                Evenings_ui.render_evening(evening);
                this.loading = false;
            })
            .catch(error => {
                console.error(error);
                this.loading = false;
            });
    }


}

export default new Evenings();