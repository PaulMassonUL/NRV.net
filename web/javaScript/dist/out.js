(()=>{var s=class{fetch_festival_api(t,a){return fetch("http://docketu.iutnc.univ-lorraine.fr:11110"+t,a).then(e=>e.ok?e.json():Promise.reject(new Error(e.statusText))).catch(e=>{console.log(e)})}},n=new s;var o=class{render_shows(t){let a=document.getElementsByClassName("article-list")[0];if(!a){console.error("Le conteneur des spectacles est introuvable.");return}if(!Array.isArray(t.shows)){console.error("Les spectacles ne sont pas au format d'un tableau.");return}t.shows.forEach(e=>{console.log(e);let l=document.createElement("article"),c=[];e.artists.forEach(p=>{c.push(p.name)});let u=c.join(" - "),h=new Date(e.date+" "+e.time),m={weekday:"long",year:"numeric",month:"long",day:"numeric",hour:"numeric",minute:"numeric"};e.date=h.toLocaleDateString("fr-FR",m),e.date=e.date.charAt(0).toUpperCase()+e.date.slice(1),l.innerHTML=`
            <div class="article-content">
                <h3>${e.title}</h3>
                <p>${e.date}</p>
                <p>${u}</p>
            </div>
            <img src="${e.images[0].path}">
            `,a.appendChild(l)})}},d=new o;var r=class{constructor(){this.loading=!1}load_shows(){this.loading||(n.fetch_festival_api("/shows").then(t=>{this.loading=!1,d.render_shows(t)}),n.fetch_festival_api("/spots_evening").then(t=>{this.loading=!1,console.log(t)}),n.fetch_festival_api("/dates_evening").then(t=>{this.loading=!1,console.log(t)}),n.fetch_festival_api("/thematics_evening").then(t=>{this.loading=!1,console.log(t)}),this.loading=!0)}},f=new r;document.addEventListener("DOMContentLoaded",()=>{f.load_shows()});})();
