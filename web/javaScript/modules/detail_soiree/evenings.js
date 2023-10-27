import festivalLoader from "../../festivalLoader";

class Evenings {

    constructor() {
        this.loading = false;
    }

    load_evening(id) {
        console.log(id);
        if (this.loading) return;
        festivalLoader.fetch_festival_api('/evening/' + id)
            .then(evening => {
                console.log(evening);
                this.loading = false;
            })
            .catch(error => {
                console.error(error);
                this.loading = false;
            });
    }


}

export default new Evenings();