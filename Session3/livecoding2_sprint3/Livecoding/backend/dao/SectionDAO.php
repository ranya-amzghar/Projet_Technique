<?php
require '../classes/Section.php';

class SectionDAO{
    private $file;

    public function __construct(){
        $this->file = '../database/section_data.json';
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
        if(empty($newsection)){
            throw new Exception("Cannot read the data");
        }
        $sections[] = $newsection;
        file_put_contents($this->file,json_encode($sections));
    }
}

?>