import festivalLoader from '../festivalLoader.js';
import Shows_ui from "./shows_ui";

class Shows {

    constructor() {
        this.loading = false;
    }

    load_shows(){
        if(this.loading) return;
        this.loading = true;
        festivalLoader.fetch_festival_api('/shows')
            .then(shows => {
                this.loading = false;
                Shows_ui.render_shows(shows);
            });
    }

}

export default new Shows();