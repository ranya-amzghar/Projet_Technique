<?php
class Section{
    private int $id;
    private string $nom;
    private string $description;
    private string $color;
    private string $icone;

    public function __construct($nom,$description,$color,$icone){
        $this->nom = $nom;
        $this->description = $description;
        $this->color = $color;
        $this->icone = $icone;
    }

    public function getNom(): string{
        return $this->nom;
    }
    public function getDescription(): string{
        return $this->description;
    }
    public function getcolor(): string{
        return $this->color;
    }
    public function getIcone(): string{
        return $this->icone;
    }
    public function setNom(): string{
        $this->nom = $nom;
    }
    public function setDescription(): string{
        $this->description = $description;
    }
    public function setColor(): string{
        $this->color = $color;
    }
    public function setIcone(): string{
        $this->nom = $icone;
    }
}
?>