const API = ('../backend/gestionSection/api/api.php');
document.addEventListener('DOMContentLoaded', ()=>{
    let showForm = document.getElementById('showForm');
    let form = document.getElementById('form');
    let nom = document.getElementById('nom');
    let icone = document.getElementById('icone');
    let couleur = document.getElementById('couleur');
    let description = document.getElementById('description');
    let annuler = document.getElementById('annuler');
    let table = document.getElementById('table_body');
    function ajouterSection(){
        fetch(API)
            .then(reponse => reponse.json())
            .then(sections => {
                table.innerHTML = "";
                sections.forEach(section => {
                    table.insertAdjacentHTML('beforeend', `<tr><td> ${section.nom} </td><td> ${section.couleur} </td><td> ${section.icone} </td><td> ${section.description} </td></tr>`)
                });
            })
    };

    showForm.addEventListener('click', ()=>{
        showForm.hidden = true;
        form.hidden = false;
    });

    annuler.addEventListener('click',()=>{
        showForm.hidden = false;
        form.hidden = true;
    });

    form.addEventListener('submit', (event)=>{
        event.preventDefault();
        let section = {nom: nom.value,couleur: couleur.value, icone: icone.value, description: description.value};
        fetch(API,{
            method: 'POST',
            headers: {'Content-Type' : 'application/json'},
            body: JSON.stringify(section)
        })
            .then(reponse => reponse.json())
            .then(section=>{
                table.insertAdjacentHTML('beforeend', `<tr><td class="border border-gray-500 m-6 px-4 py-2"> ${section.nom} </td><td class="border border-gray-500 m-6 px-4 py-2"> ${section.couleur} </td><td class="border border-gray-500 m-6 px-4 py-2"> ${section.icone} </td><td class="border border-gray-500 m-6 px-4 py-2"> ${section.description} </td></tr>`);
                form.reset();
                showForm.hidden = false;
                form.hidden = true;
                ajouterSection();
            })
    });
    ajouterSection();

})