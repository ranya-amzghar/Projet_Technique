<?php
header('Content-Type: application/json');
require '../classes/classes.php';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $json = file_get_contents('php://input');
    $newsection = json_decode($json, true);
    
    $file_data = file_exists('../../database/section_data.json')? file_get_contents('../../database/section_data.json'):'[]';
    $sections = json_decode($file_data,true);
    $sections[] = $newsection;
    
    file_put_contents('../../database/section_data.json', json_encode($sections));
    echo json_encode(['id' => count($sections)]);
}else{
    if(file_exists('../../database/section_data.json')){
        echo file_get_contents('../../database/section_data.json');
    }else{
        echo '[]';
    }
}
?>