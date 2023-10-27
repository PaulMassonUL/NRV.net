import festivalLoader from "../../../festival_loader";
import backOfficeRedirection_ui from "./backOfficeRedirection_ui";

class backOfficeRedirection {
    constructor () {
        this.loading = false;
    }


    load_back_redirection() {
        if(this.loading) return;
        festivalLoader.fetch_festival_api('/dates_evening')
            .then(dates => {
                backOfficeRedirection_ui.render_backOffRedirection(dates);
                this.loading = false;
            });
        this.loading = true;
    }


}

export default new backOfficeRedirection();