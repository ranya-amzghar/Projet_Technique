<?php
class Section{
    private $id;
    private $nom;
    private $description;
    private $couleur;
    private $icone;

    public function __construct($nom,$description,$couleur,$icone){
        $this->nom = $nom;
        $this->description = $description;
        $this->couleur = $couleur;
        $this->icone = $icone;
    }

    public function getId(): int{
        return $this->id;
    }
    public function getNom(): string{
        return $this->nom;
    }
    public function getDescription(): string{
        return $this->description;
    }
    public function getCouleur(): string{
        return $this->couleur;
    }
    public function getIcone(): string{
        return $this->icone;
    }
    
}

class SectionManage{
    private $file;

    public function __construct(){
        $this->file = '../../database/section_data.json';
    }

    public function getSection(){
        if(file_exists($this->file)){
            $json = file_get_contents($this->file);
            return json_decode($json,true);
        }
        return [];
    }

    public function addSection($newsection){
        $sections = $this->getSection();
        $sections[] = $newsection;
        file_put_contents($this->file, json_encode($sections));
    }
}
?>