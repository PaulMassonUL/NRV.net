class festivalLoader{

    fetch_festival_api(url, options){
        return fetch('http://localhost:2080' + url, options)
            .then(response => {
                if (response.ok) return response.json();
                return Promise.reject(new Error(response.statusText));
            })
            .catch(error => {
                console.log(error);
            });
    }
}

export default new festivalLoader();