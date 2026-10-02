<?php
header('Content-Type: application/json');
require '../classes/classe.php';
$Section = new SectionManger();
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $json = file_get_contents('php://input');
    $newSection = json_decode($json,true);
    $add = $Section->addSection($newSection);
    echo json_encode(['add' =>$add]);
}else{
    echo json_encode($Section->getSection());
}

?>