
## Dépendences Fonctionnelle

id_article ->titre_article, contenu_article, description_article, date_publication, date_creation, duree_lecture, image_article, status, id_journalist, id_section

id_section -> section_nom, section_colour, section_icon, section_description

id_journalist -> email_journalist, nom_journalist, prenom_journalist, photo_journalist, mot_de_passe

---
## Tables

Article(
    id_article,
    titre_article,
    contenu_article,
    description_article,
    date_publication,
    date_creation,
    duree_lecture,
    image_article,
    status,
    id_journalist,
    id_section
)

Section(
    id_section,
    section_nom,
    section_colour, 
    section_icon, 
    section_description
)

Journalist(
    id_journalist,
    email_journalist,
    nom_journalist, 
    prenom_journalist, 
    photo_journalist, 
    mot_de_passe
)