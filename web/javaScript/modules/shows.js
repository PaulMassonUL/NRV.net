import festivalLoader from '../festivalLoader.js';
import Shows_ui from "./shows_ui";

class Shows {

    constructor() {
        this.loading = false;
    }

    load_shows(){
        if(this.loading) return;
        festivalLoader.fetch_festival_api('/shows')
            .then(shows => {
                this.loading = false;
                Shows_ui.render_shows(shows);
            });
        festivalLoader.fetch_festival_api('/spots_evening')
            .then(spots => {
                this.loading = false;
                console.log(spots);
            });
        festivalLoader.fetch_festival_api('/dates_evening')
            .then(dates => {
                this.loading = false;
                console.log(dates);
            });
        festivalLoader.fetch_festival_api('/thematics_evening')
            .then(thematics => {
                this.loading = false;
                console.log(thematics);
            });
        this.loading = true;
    }

}

export default new Shows();