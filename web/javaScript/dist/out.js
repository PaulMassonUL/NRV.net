(()=>{var r=class{fetch_festival_api(e,s){return fetch("http://localhost:2080"+e,s).then(t=>t.ok?t.json():Promise.reject(new Error(t.statusText))).catch(t=>{console.log(t)})}},c=new r;var o=class{render_shows(e){let s=document.getElementsByClassName("article-list")[0];if(!s){console.error("Le conteneur des spectacles est introuvable.");return}if(!Array.isArray(e.shows)){console.error("Les spectacles ne sont pas au format d'un tableau.");return}e.shows.forEach(t=>{console.log(t);let i=document.createElement("article"),l=[];t.artists.forEach(u=>{l.push(u.name)});let m=l.join(" - ");i.innerHTML=`
            <div class="article-content">
                <h3>${t.title}</h3>
                <p>${t.time}</p>
                <p>${m}</p>
            </div>
            <img src="${t.images[0].path}">
            `,s.appendChild(i)})}},d=new o;var a=class{constructor(){this.loading=!1}load_shows(){this.loading||(this.loading=!0,c.fetch_festival_api("/shows").then(e=>{this.loading=!1,d.render_shows(e)}))}},h=new a;document.addEventListener("DOMContentLoaded",()=>{h.load_shows()});})();
