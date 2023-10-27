import festivalLoader from "../../../festival_loader";

class backOfficeRedirection {
    constructor () {
        this.loading = false;
    }


    load_back_redirection() {
        if(this.loading) return;
        festivalLoader.fetch_festival_api('/dates_evening')
            .then(dates => {
                Shows_ui.render_backOffRedirection(dates);
                this.loading = false;
            });
        this.loading = true;
    }


}

export default new backOfficeRedirection();