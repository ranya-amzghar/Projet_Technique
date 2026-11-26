const API = '../backend/api/api.php';
document.addEventListener('DOMContentLoaded',()=>{
    let btnShow_form = document.querySelector('#btn-show-form');
    let form_Section = document.querySelector('#section-form');
    let form = document.querySelector('#form-categorie');
    let nom = document.querySelector('#cat-nom');
    let couleur = document.querySelector('#cat-couleur');
    let icone = document.querySelector('#cat-icone');
    let description = document.querySelector('#sec-description');
    let annuler = document.querySelector('#btn-cancel-form');
    let btnSubmit = document.getElementById('btn-submit');
    let table = document.querySelector('#table-categories-body');

    function setLoading(isLoading){
        btnSubmit.disabled = isLoading;
        if(isLoading){
            btnSubmit.textContent = 'Enregistrement';
        }else{
            btnSubmit.textContent = 'Enregistrer';
        }
    }

    function ShowToast(message, type='success'){
        let container = document.getElementById('container');
        let toast = document.createElement('div');

        toast.className= "text-white p-4 rounded-lg";
        if(type=== "success"){
            toast.classList.add("bg-green-600");
        }else{
            toast.classList.add("bg-red-600");
        }
        toast.textContent = message;

        container.appendChild(toast);

        setTimeout(()=>{
            toast.remove();
        }, 3000)
    }

    function renderSections(sections){
        table.replaceChildren();
        sections.forEach(section => {
            let row = document.createElement('tr');
            [section.nom, section.description, section.couleur, section.icone].forEach(value => {
                let cell = document.createElement('td');
                cell.className = 'p-4 text-sm font-semibold text-gray-500 uppercase';
                cell.textContent = value ?? '';
                row.appendChild(cell);
            });
            table.appendChild(row);
        });
    }

    function ajouterSection(){
        fetch(API)
            .then(response => {
                if(!response.ok){
                    throw new Error(`Erreur HTTP ${response.status}`);
                }
                return response.json();
            })
            .then(sections => {
                if(!Array.isArray(sections)){
                    throw new Error('Réponse invalide du serveur');
                }
                renderSections(sections);
            })
            .catch(error => {
                ShowToast("Impossible de charger les sections","error");
                console.error(error);
            });
    }

    btnShow_form.addEventListener('click',()=>{
        form_Section.classList.remove('hidden');
    });

    annuler.addEventListener('click',()=>{
        form_Section.classList.add('hidden');
    });

    form.addEventListener('submit',(event)=>{
        event.preventDefault();
        setLoading(true);
        let section = {nom: nom.value,description:description.value,couleur:couleur.value,icone:icone.value}
        fetch(API,{
            method: 'POST',
            headers: {'Content-Type':'application/json'},
            body: JSON.stringify(section)
        })
            .then(response=>{
                if(!response.ok){
                    throw new Error(`Erreur HTTP ${response.status}`);
                }
                return response.json();
            })
            .then(section=>{
                ShowToast("Section enregistrée avec success","success");
                form.reset();
                form_Section.classList.add('hidden');
                ajouterSection();
            })
            .catch(error=>{
                ShowToast("Erreur reseau: Impossible de contacter le serveur","error");
                console.log(error);
            })
            .finally(() => {
                setLoading(false);
            });
    });
    ajouterSection();
})