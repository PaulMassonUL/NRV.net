(()=>{var a=class{fetch_festival_api(t,r){return fetch("http://localhost:2080"+t,r).then(e=>e.ok?e.json():Promise.reject(new Error(e.statusText))).catch(e=>{console.log(e)})}},l=new a;var n=class{render_shows(t){let r=document.getElementsByClassName("article-list")[0];if(!r){console.error("Le conteneur des spectacles est introuvable.");return}if(!Array.isArray(t.shows)){console.error("Les spectacles ne sont pas au format d'un tableau.");return}t.shows.forEach(e=>{console.log(e);let i=document.createElement("article"),c=[];e.artists.forEach(h=>{c.push(h.name)});let u=c.join(" - "),f=new Date(e.date+" "+e.time),p={weekday:"long",year:"numeric",month:"long",day:"numeric",hour:"numeric",minute:"numeric"};e.date=f.toLocaleDateString("fr-FR",p),e.date=e.date.charAt(0).toUpperCase()+e.date.slice(1),i.innerHTML=`
            <div class="article-content">
                <h3>${e.title}</h3>
                <p>${e.date}</p>
                <p>${u}</p>
            </div>
            <img src="${e.images[0].path}">
            `,r.appendChild(i)})}},d=new n;var o=class{constructor(){this.loading=!1}load_shows(){this.loading||(this.loading=!0,l.fetch_festival_api("/shows").then(t=>{this.loading=!1,d.render_shows(t)}))}},m=new o;document.addEventListener("DOMContentLoaded",()=>{m.load_shows()});})();
