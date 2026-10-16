<?php
header('Content-Type: application/json');
require '../class/class.php';
$Section = new SectionManage();
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $json = file_get_contents('php://input');
    $newsection = json_decode($json,true);
    $add = $Section->addSection($newsection);
    echo json_encode(['add'=>$add]);
}else{
    echo json_encode($Section->getSection());
}
?>