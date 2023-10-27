import evenings from "./modules/detail_soiree/evenings";

document.addEventListener('DOMContentLoaded', () => {

    const urlParams = new Proxy(new URLSearchParams(window.location.search), {
        get: (searchParams, prop) => searchParams.get(prop)
    });
    let eveningId = urlParams.id;
    if (!eveningId) {
        window.location.href = '/ATELIER/web/html/list_show.html';
    } else {
        evenings.load_evening(eveningId);
    }

});