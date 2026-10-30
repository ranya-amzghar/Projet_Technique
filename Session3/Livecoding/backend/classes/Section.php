<?php
class Section{
    private $id;
    private $nom;
    private $description;
    private $couleur;
    private $icone;

    public function __construct(){
        $this->nom = $nom;
        $this->description = $description;
        $this->couleur = $couleur;
        $this->icone = $icone;
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
?>