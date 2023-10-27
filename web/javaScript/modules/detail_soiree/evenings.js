import festivalLoader from "../../festivalLoader";
import Evenings_ui from "./evenings_ui";

class Evenings {

    constructor() {
        this.loading = false;
    }

    load_evening(id) {
        if (this.loading) return;
        festivalLoader.fetch_festival_api('/evening/' + id)
            .then(evening => {
                console.log(evening.evening);
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