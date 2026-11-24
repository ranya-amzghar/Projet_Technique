<?php
require '../dao/SectionDAO.php';
require 'BaseService.php';

class SectionService{
    private $dao;

    public function __construct(){
        $this->dao = '../database/section_data.json';
    }

    public function gettingSection(){
        $gestion = new SectionDAO();
        $sections = $gestion->getSection();
        if($sections === false){
            throw new Exception("Cannot read the data from the file");
        }
        header('Content-Type: application/json');
        echo json_encode($sections);
    }
    
    public function addingSection($newsection){
        $manager = new SectionDAO();
        try{
            if(strlen($newsection['nom']) < 2||strlen($newsection['description'])< 2){
                throw new Exception("Le nom et la description doit avoir plus que 2 charactere");
            }
            $manager->addSection($newsection);

            header('Content-Type: application/json');
            echo json_encode(['message'=>"Section ajouter avec success"]);
        }catch(Exception $e){
            echo "Error:" . $e->getMessage();
        }
    }
}

?>