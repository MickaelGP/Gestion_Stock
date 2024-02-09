
let alarme = document.querySelector('#alert');

if(alarme){
    setTimeout(()=>{
        alarme.remove();
    }, 3000);
}

//Mois produit perimés
let date_du_mois = document.querySelector("#date");
let date_en_cours = new Date();
let tableau_des_mois = new Array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");

date_du_mois.innerText = tableau_des_mois[date_en_cours.getMonth()];

//Nombre de produit qui perime
let nombre = document.querySelector("#nombre");
let info = document.querySelector("#info");

if(nombre.innerText <= 5 ){
    info.classList.add('alert','alert-info');
}else if(nombre.innerText > 5){
    info.classList.add('alert','alert-danger');
}


document.querySelector('#liste').addEventListener('click', function (event) {
    event.preventDefault();
    // une requête AJAX vers l'URL d'export
    fetch('/export-inventaire')
        .then(response => response.text())
        .then(text => {
            // Créer un blob à partir du contenu texte
            const blob = new Blob([text], { type: 'text/plain' });

            // Créer un objet URL pour le blob
            const url = window.URL.createObjectURL(blob);

            // Créer un lien temporaire pour le téléchargement
            const a = document.createElement('a');
            a.href = url;
            a.download = 'Liste.txt';
            document.body.appendChild(a);
            a.click();

            // Nettoyer l'objet URL et le lien temporaire
            window.URL.revokeObjectURL(url);
            a.remove();
        });
});
