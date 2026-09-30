let API_URL = '../backend/gestionSections/api/api.php'
document.addEventListener('DOMContentLoaded', ()=>{
    let btnShows = document.querySelector('#show');
    let form = document.querySelector('#form');
    let nom = document.querySelector('#nom');
    let couleur = document.querySelector('#couleur');
    let icon = document.querySelector('#icon');
    let description = document.querySelector('#description');
    let table = document.querySelector('#table_body');
    let btnAdd = document.querySelector('#ajouter');
    let btnCancel = document.querySelector('#annuler');
    function AjouterData(){
        fetch(API_URL)
            .then(response => response.json())
            .then(section => {
                table.innerHTML = '';
                section.forEach(section=>{
                    table.insertAdjacentHTML('beforeend', `<tr class="divide-x divide-gray-300 border-b border-gray-300"><td class="border border-gray-300 px-4 py-2">${section.nom}</td><td class="border border-gray-300 px-4 py-2">${section.couleur}</td><td class="border border-gray-300 px-4 py-2">${section.icon}</td><td class="border border-gray-300 px-4 py-2">${section.description}</td></tr>`)
                })
                }
            )
    }
    btnShows.addEventListener('click', ()=>{
        btnShows.hidden = true;
        form.hidden = false;
    });
    btnCancel.addEventListener('click', ()=>{
        btnShows.hidden = false;
        form.hidden = true;
    });
    form.addEventListener('submit', (event)=>{
        event.preventDefault();
        let sections = {nom:nom.value, couleur: couleur.value, icon:icon.value, description: description.value};
        fetch(API_URL,{
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify(sections)
        })
            .then(response=> response.json())
            .then(section => {
                console.log("Création de section:", section.id)
                table.insertAdjacentHTML('beforeend',`<tr class="divide-x divide-gray-300 border-b border-gray-300"><td class="border border-gray-300 px-4 py-2">${section.nom}</td><td class="border border-gray-300 px-4 py-2">${section.couleur}</td><td class="border border-gray-300 px-4 py-2">${section.icon}</td><td class="border border-gray-300 px-4 py-2">${section.description}</td></tr>`);
                form.reset();
                btnShows.hidden = false;
                form.hidden = true;
                AjouterData();
            });
    });
    AjouterData();
})