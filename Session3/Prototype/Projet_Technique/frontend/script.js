const API = '../backend/api/api.php';

document.addEventListener('DOMContentLoaded', ()=>{
    let Showform = document.getElementById('showForm');
    let form = document.getElementById('form');
    let nom = document.getElementById('nom');
    let icone = document.getElementById('icone');
    let couleur = document.getElementById('couleur');
    let description = document.getElementById('description');
    let ajouter = document.getElementById('ajouter')
    let annuler = document.getElementById('annuler');
    let table = document.getElementById('table_body');

    function setLoading(isLoading){
        ajouter.disabled = isLoading;
        if(isLoading){
            ajouter.textContent = 'Enregistrement...';
        }else{
            ajouter.textContent = 'Enregistrer';
        }
    }

    function showToast(message, type = 'success'){
        const container = document.getElementById('toast-container');
        const toast = document.createElement('div');

        toast.className = "text-white p-4 mb-2 rounded-lg shadow-lg";
        if (type === 'success') {
            toast.classList.add('bg-green-600');
        } else {
            toast.classList.add('bg-red-600');
        }
        toast.textContent = message;

        container.appendChild(toast);

        setTimeout(()=>{
            toast.remove();
        }, 5000);
    }

    function afficherSection(){
        fetch(API)
        .then(response=>response.json())
        .then(sections =>{
            table.innerHTML = '';
            sections.forEach(section => {
                table.insertAdjacentHTML('beforeend', `<tr><td class="border border-gray-500 px-4 py-2 md:px-3">${section.nom}</td><td class="border border-gray-500 px-4 py-2 md:px-3">${section.icone}</td><td class="border border-gray-500 px-4 py-2 md:px-3">${section.couleur}</td><td class="border border-gray-500 px-4 py-2 md:px-3">${section.description}</td></tr>`)
            });
        })
    }

    Showform.addEventListener('click', ()=>{
        Showform.hidden = true;
        form.hidden = false;
    });

    annuler.addEventListener('click', ()=>{
        Showform.hidden = false;
        form.hidden = true;
    });

    form.addEventListener('submit', (event)=>{
        event.preventDefault();
        setLoading(true);
        let newsection = {nom: nom.value, icone: icone.value, couleur: couleur.value, description: description.value};
        fetch(API,{
            method: 'POST',
            headers: {'Content-Type' : 'application/json'},
            body: JSON.stringify(newsection)
        })
        .then(response=>response.json())
        .then(sections=>{
            showToast("Section enregistrée avec succès !", "success");
            form.reset();
            Showform.hidden = false;
            form.hidden = true;
            afficherSection()
        })
        .catch(error => {
            showToast("Erreur réseau : Impossible de contacter le serveur.", "error");
            console.error(error);
        })
        .finally(() => {
            setLoading(false);
        });
    });

    afficherSection();
})