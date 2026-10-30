<?php
header('Content-Type: application/json');
require '../controllers/SectionController.php';

$controller = new SectionController();
if($_SERVER['REQUEST_METHOD']==='POST'){
    $data = file_get_contents('php://input');
    $newsection = json_decode($data,true);
    $controller->addingSection($newsection);
}else{
    $controller->gettingSection();
}

?>