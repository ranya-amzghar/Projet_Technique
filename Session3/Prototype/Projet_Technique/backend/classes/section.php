<?php
class Section{
    private $id;
    private $nom;
    private $couleur;
    private $icone;
    private $description;

    public function __construct(){
        $this->nom = $nom;
        $this->couleur = $nom;
        $this->icone = $icone;
        $this->description = $description;
    }

    public function getNom(): string{
        $this->nom;
    }
    public function getCouleur(): string{
        $this->couleur;
    }
    public function getIcone(): string{
        $this->icone;
    }
    public function getDescription(): string{
        $this->description;
    }
}
?>