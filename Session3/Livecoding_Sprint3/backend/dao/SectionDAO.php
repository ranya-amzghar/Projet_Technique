<?php
require '../classes/Section.php';
class SectionDAO{
    private $dao;

    public function __construct(){
        $this->dao ='../database/section_data.json';
    }

    public function getSection(){
        
            $json = file_get_contents($this->dao);
            return json_decode($json,true);
        
    }

    public function addSection($newsection){
        $sections = $this->getSection();
        $sections[] = $newsection;
        file_put_contents($this->dao,json_encode($sections));
    }
}

?>