let API = '../backend/GestionSection/api/api.php';
document.addEventListener('DOMContentLoaded',()=>{
    let btnShow_form = document.querySelector('#btn-show-form');
    let form_Section = document.querySelector('#section-form');
    let form = document.querySelector('#form-categorie');
    let nom = document.querySelector('#cat-nom');
    let couleur = document.querySelector('#cat-couleur');
    let icone = document.querySelector('#cat-icone');
    let description = document.querySelector('#sec-description');
    let annuler = document.querySelector('#btn-cancel-form');
    let table = document.querySelector('#table-categories-body');

    function ajouterSection(){
        fetch(API)
            .then(reponse => reponse.json())
            .then(section => {
                table.innerHTML = "";
                section.forEach(sec => {
                    table.insertAdjacentHTML('beforeend',`<tr><td class="p-4 text-sm font-semibold text-gray-500 uppercase">${sec.nom}</td><td class="p-4 text-sm font-semibold text-gray-500 uppercase">${sec.description}</td><td class="p-4 text-sm font-semibold text-gray-500 uppercase">${sec.couleur}</td><td class="p-4 text-sm font-semibold text-gray-500 uppercase">${sec.icone}</td></tr>`)
                });
            })

    }

    btnShow_form.addEventListener('click',()=>{
        form_Section.classList.remove('hidden');
    });

    annuler.addEventListener('click',()=>{
        form_Section.classList.add('hidden');
    });

    form.addEventListener('submit',(event)=>{
        event.preventDefault();
        let section = {nom: nom.value,description:description.value,couleur:couleur.value,icone:icone.value}
        fetch(API,{
            method: 'POST',
            headers: {'Content-Type':'application/json'},
            body: JSON.stringify(section)
        })
            .then(response=>response.json())
            .then(section=>{
                table.insertAdjacentHTML('beforeend',`<tr><td class="p-4 text-sm font-semibold text-black-500 uppercase">${section.nom}</td><td class="p-4 text-sm font-semibold text-black-500 uppercase">${section.description}</td><td class="p-4 text-sm font-semibold text-black-500 uppercase">${section.couleur}</td><td class="p-4 text-sm font-semibold text-black-500 uppercase">${section.icone}</td></tr>`);
                form.reset();
                form_Section.hidden = true;
                btnShow_form = false;
                ajouterSection();
            })
    });
    ajouterSection();
})