CREATE DATABASE NewsBlog;
USE NewsBlog;

CREATE TABLE journalist (
    id_journalist INT AUTO_INCREMENT PRIMARY KEY,
    email_journalist VARCHAR(200) UNIQUE NOT NULL,
    nom_journalist VARCHAR(100) NOT NULL,
    prenom_journalist VARCHAR(100) NOT NULL,
    photo_journalist TEXT,
    mot_de_passe VARCHAR(200) NOT NULL
);

CREATE TABLE section (
    id_section INT AUTO_INCREMENT PRIMARY KEY,
    section_nom VARCHAR(200) NOT NULL,
    section_colour VARCHAR(200),
    section_icon VARCHAR(200),
    section_description VARCHAR(250)
);

CREATE TABLE article (
    id_article INT AUTO_INCREMENT PRIMARY KEY,
    titre_article VARCHAR(200) NOT NULL,
    contenu_article TEXT NOT NULL,
    description_article VARCHAR(250),
    date_publication DATE,
    date_creation DATE DEFAULT (CURRENT_DATE),
    duree_lecture INT,
    image_article TEXT,
    status ENUM('brouillon', 'publier') DEFAULT 'brouillon',
    id_journalist INT,
    id_section INT,
    FOREIGN KEY (id_journalist) REFERENCES journalist(id_journalist),
    FOREIGN KEY (id_section) REFERENCES section(id_section)
);