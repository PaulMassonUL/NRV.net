import backoff_jauge from './modules/backoff_jauge/backoff_jauge.js';

document.addEventListener('DOMContentLoaded', () => {

    const urlParams = new Proxy(new URLSearchParams(window.location.search), {
        get: (searchParams, prop) => searchParams.get(prop)
    });

    let eveningId = urlParams.id;
    let eveningDate = urlParams.date;
    if (!eveningId) {
        window.location.href = '../html/backoff_redirection.html';
    } else {
        backoff_jauge.loadBackoff_jauge(eveningId, eveningDate);
    }
});