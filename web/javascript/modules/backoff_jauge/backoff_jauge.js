import festival_loader from "../../festival_loader.js";
import Backoff_jauge_ui from "./backoff_jauge_ui.js";

class Backoff_jauge {

    constructor() {
        this.places = null;
    }

    loadBackoff_jauge(eveningId, eveningDate) {
        festival_loader.fetch_festival_api('/places/' + eveningId)
            .then(places => {
                this.places = places;
                Backoff_jauge_ui.render_places(this.places, eveningDate);
            })
            .catch(error => {
                console.error(error);
            });
    }
}

export default new Backoff_jauge();