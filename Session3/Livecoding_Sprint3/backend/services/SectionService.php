<?php
require_once __DIR__.'/BaseService.php';
require_once __DIR__.'/../dao/SectionDAO.php';
require_once __DIR__.'/../api/api.php';

class SectionService extends BaseService{
    private $dao;
    public function __construct(){
        $this->dao = new SectionDAO();
    }
    public function gettingSection(){
        try{
            $sections = $this->dao->getSection();
            if($sections == false){
                throw new Exception("Cannot read the data");
            }
            echo json_encode($sections);
        }catch(Exception $e){
            throw new Exception("Cannot get to the file");
        }
    }

    public function addingSection($newsection){
        if(empty($newsection)){
            throw new Exception("Tous les champs doit etre remplisser");
        }
        $result = $this->dao->addSection($newsection);
        if($result === false){
            throw new Exception("Cannot get the section");
        }
        echo json_encode( ['message'=>"Section ajouter avec success"]);
        
    }
}

?>