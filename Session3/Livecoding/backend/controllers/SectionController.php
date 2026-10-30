<?php
require '../classes/SectionManager.php';

class SectionController{
    public function gettingSection(){
        $gestion = new SectionManager();
        $sections = $gestion->getSection();
        header('Content-Type: application/json');
        echo json_encode($sections);
    }

    public function addingSection($newsection){
        $manager = new SectionManager();
        $manager->addSection($newsection);
        header('Content-Type: application/json');
        echo json_encode(['message'=>"Section ajouter avec success"]);
    }
}

?>