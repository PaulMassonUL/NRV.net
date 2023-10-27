import festival_loader from "../../festival_loader";
import backoff_jauge_ui from "./backoff_jauge_ui";

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
                    backoff_jauge_ui.render_places(this.places);
                });
        } else {
            backoff_jauge_ui.render_places(this.places);
        }
    }
}