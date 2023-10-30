import festival_loader from "../../festival_loader";
import Backoff_jauge_ui from "./backoff_jauge_ui";

class Backoff_jauge {

    constructor() {
        this.loading = false;
        this.initializeEventListeners();
        this.places = null;
    }

    initializeEventListeners() {
        this.loadBackoff_jauge();
    }

    loadBackoff_jauge() {
        if(this.places === null) {
            festival_loader.fetch_festival_api('/places/1')
                .then(places => {
                    this.places = places;
                    Backoff_jauge_ui.render_places(this.places);
                });
        } else {
            Backoff_jauge_ui.render_places(this.places);
        }
    }
}

export default new Backoff_jauge();