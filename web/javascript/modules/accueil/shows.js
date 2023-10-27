import festivalLoader from '../../festival_loader.js';
import Shows_ui from "./shows_ui";

class Shows {

    constructor() {
        this.loading = false;
        this.initializeEventListeners();
        this.spots = null;
        this.dates = null;
        this.thematics = null;
    }

    initializeEventListeners() {
        const lieuxBadge = document.getElementById('lieux-filtre');
        const datesBadge = document.getElementById('date-filtre');
        const thematiquesBadge = document.getElementById('style-filtre');

        lieuxBadge.addEventListener('click', () => {
            this.loadLieuxData();
        });

        datesBadge.addEventListener('click', () => {
            this.loadDatesData();
        });

        thematiquesBadge.addEventListener('click', () => {
            this.loadThematicsData();
        });
    }

    loadLieuxData() {
        if (this.spots === null) {
            festivalLoader.fetch_festival_api('/spots_evening')
                .then(spots => {
                    this.spots = spots;
                    Shows_ui.render_spots(this.spots);
                });
        } else {
            Shows_ui.render_spots(this.spots);
        }
    }

    loadDatesData() {
        if (this.dates === null) {
            festivalLoader.fetch_festival_api('/dates_evening')
                .then(dates => {
                    this.dates = dates;
                    Shows_ui.render_dates(this.dates);
                });
        } else {
            Shows_ui.render_dates(this.dates);
        }
    }

    loadThematicsData() {
        if (this.thematics === null) {
            festivalLoader.fetch_festival_api('/thematics_evening')
                .then(thematics => {
                    this.thematics = thematics;
                    Shows_ui.render_thematics(this.thematics);
                });
        } else {
            Shows_ui.render_thematics(this.thematics);
        }
    }

    load_shows(){
        if(this.loading) return;
        festivalLoader.fetch_festival_api('/shows')
            .then(shows => {
                Shows_ui.render_shows(shows);
                this.loading = false;
            });
        this.loading = true;
    }

    load_shows_by_thematic(thematic){
        if(this.loading) return;
        festivalLoader.fetch_festival_api('/shows?thematic=' + thematic)
            .then(shows => {
                Shows_ui.render_shows(shows);
                this.loading = false;
            });
        this.loading = true;
    }

    load_shows_by_date(date){
        if(this.loading) return;
        festivalLoader.fetch_festival_api('/shows?date=' + date)
            .then(shows => {
                Shows_ui.render_shows(shows);
                this.loading = false;
            });
        this.loading = true;
    }

    load_shows_by_spot(spot){
        if(this.loading) return;
        festivalLoader.fetch_festival_api('/shows?lieu=' + spot)
            .then(shows => {
                Shows_ui.render_shows(shows);
                this.loading = false;
            });
        this.loading = true;
    }


}

export default new Shows();