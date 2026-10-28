<?php
require '../classes/SectionManager.php';

class SectionController{

    public function gettingSections(){
        $gestion = new SectionManager();
        $sections = $gestion->getSection();

        header('Content-Type : application/json');
        echo json_encode($sections);
    }

    public function addingSection($newsection){
        $manage = new SectionManager();
        $manage->addSection($newsection);

        header('Content-Type : application/json');
        echo json_encode(['message' => 'Section ajoutée avec succès']);
    }
}
?>