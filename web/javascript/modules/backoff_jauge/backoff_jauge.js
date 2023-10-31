import festival_loader from "../../festival_loader.js";
import Backoff_jauge_ui from "./backoff_jauge_ui.js";

class Backoff_jauge {

    constructor() {
        this.places = null;
    }

    loadBackoff_jauge() {
        festival_loader.fetch_festival_api('/places/1')
            .then(places => {
                this.places = places;
                Backoff_jauge_ui.render_places(this.places);
            });
    }
}

export default new Backoff_jauge();