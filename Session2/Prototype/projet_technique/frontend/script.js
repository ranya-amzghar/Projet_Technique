let API = ('../backend/gestionSection/api/api.php')
document.addEventListener('DOMContentLoaded',() => {
    let show = document.querySelector('#show');
    let form = document.querySelector('#form');
    let nom = document.querySelector('#nom');
    let description = document.querySelector('#description');
    let color = document.querySelector('#color');
    let icone = document.querySelector('#icone');
    let add = document.querySelector('#ajouter');
    let cancel = document.querySelector('#annuler');
    let table = document.querySelector('#table_body');
    function ajouterSection(){
        fetch(API)
            .then(reponse => reponse.json())
            .then(sections => {
                table.innerHTML = "";
                sections.forEach(section => {
                    table.insertAdjacentHTML('beforeend', `<tr><td> ${section.nom} </td> <td> ${section.description} </td> <td> ${section.color} </td><td> ${section.icone} </td></tr>`)
                });
            })
    };

    show.addEventListener('click', ()=>{
        show.hidden = true;
        form.hidden = false;
    });

    cancel.addEventListener('click',()=>{
        show.hidden = false;
        form.hidden = true;
    });

    form.addEventListener('submit', (event)=>{
        event.preventDefault();
        let section = {nom: nom.value, description: description.value, color: color.value, icone: icone.value};
        fetch(API,{
            method: 'POST',
            headers: {'Content-Type' : 'application/json'},
            body: JSON.stringify(section)
        })
            .then(reponse => reponse.json())
            .then(section=>{
                table.insertAdjacentHTML('beforeend', `<tr><td> ${section.nom} </td> <td> ${section.description} </td> <td> ${section.color} </td><td> ${section.icone} </td></tr>`);
                form.reset();
                show.hidden = false;
                form.hidden = true;
                ajouterSection();
            })
    });
    ajouterSection();
})