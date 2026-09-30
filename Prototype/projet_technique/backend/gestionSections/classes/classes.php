<?php

class Section{
    private int $id;
    private string $section_nom;
    private string $section_couleur;
    private string $section_icon;
    private string $description;

    public function __construct(){

        $this->section_nom = $section_nom;
        $this->section_couleur = $section_couleur;
        $this->section_icon = $section_icon;
        $this->description = $description;
    }

    public function setNom_section($nom,$couleur,$icon,$description): void{
        $this->section_nom = $section_nom;
    }
    public function setCouleur_section(): void{
        $this->section_couleur = $section_couleur;
    }
    public function setIcon_section(): void{
        $this->section_icon = $section_icon;
    }
    public function setDescription(): void{
        $this->description = $description;
    }
    
    public function getNom_section(): string{
        return $this->section_nom;
    }
    public function getCouleur_section(): string{
        return $this->section_couleur;
    }
    public function getIcon_section(): string{
        return $this->section_icon;
    }
    public function getDescription(): string{
        return $this->description;
    }
    
}

?>