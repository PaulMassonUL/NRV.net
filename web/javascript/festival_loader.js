class festival_loader {

    fetch_festival_api(url, options){
        return fetch('http://docketu.iutnc.univ-lorraine.fr:11110' + url, options)
            .then(response => {
                if (response.ok) return response.json();
                return Promise.reject(new Error(response.statusText));
            })
            .catch(error => {
                console.log(error);
            });
    }
}

//url to server ent : http://docketu.iutnc.univ-lorraine.fr:11110
//url to localhost : http://localhost:11110

export default new festival_loader();