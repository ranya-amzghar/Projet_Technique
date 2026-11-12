<?php
header('Content-Type: application/json');
require '../services/SectionService.php';

$controller = new SectionService();
if($_SERVER['REQUEST_METHOD']==='POST'){
    $data = file_get_contents('php://input');
    $newsection = json_decode($data,true);
    $controller->addingSection($newsection);
}
if($_SERVER['REQUEST_METHOD']==='GET'){
    $controller->gettingSection();
}

?>