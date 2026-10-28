<?php
require 'section.php';

class SectionManager{
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
        $sections[] = $newsection;
        file_put_contents($this->file, json_encode($sections));
    }
}
?>