<?php

Class Section{
    private int $id;
    private string $nom;
    private string $icone;
    private string $couleur;
    private string $description;

    public function __construct($nom,$icone,$couleur,$description){
        $this->nom = $nom;
        $this->icone = $icone;
        $this->couleur = $couleur;
        $this->description = $description;
    }

    public function getNom(): string{
        return $this->nom;
    }
    public function getIcone(): string{
        return $this->icone;
    }
    public function getCouleur(): string{
        return $this->couleur;
    }
    public function getDescription(): string{
        return $this->description;
    }
    public function setNom(): void{
        $this->nom = $nom;
    }
    public function setIcone(): void{
        $this->icone = $icone;
    }
    public function setCouleur(): void{
        $this->couleur = $couleur;
    }
    public function setDescription(): void{
        $this->description = $description;
    }
}
Class SectionManger{
    private $file;
    public function __construct(){
        $this->file = '../../database/section_data.json';
    }
    public function getSection(){
        if(file_exists($this->file)){
            $file_data = file_get_contents($this->file);
            return json_decode($file_data,true);
        }
        return [];
    }

    public function addSection($newSection){
        $section = $this->getSection();
        $section[] = $newSection;
        file_put_contents($this->file,json_encode($section));
    }
}

?>