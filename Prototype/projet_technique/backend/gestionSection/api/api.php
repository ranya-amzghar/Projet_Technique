<?php
header('Content-Type: application/json');
require '../classes/class.php';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    $json = file_get_contents('php://input');
    $newsection = json_decode($json, true);
    
    $section = new Section($newsection['nom'],$newsection['description'],$newsection['color'],$newsection['icone']);

    $file_data = file_exists('../../database/section_data.json')?file_get_contents('../../database/section_data.json'): '[]';
    $sections = json_decode($file_data, true);
    $sections[] = [
        'nom' => $section->getNom(),
        'description' => $section->getDescription(),
        'color' => $section->getcolor(),
        'icone' => $section->getIcone()
    ];

    file_put_contents('../../database/section_data.json', json_encode($sections));
    echo json_encode(['id'=> count($sections) +1]);
    
}else{
    if(file_exists('../../database/section_data.json')){
        echo file_get_contents('../../database/section_data.json');
    }else{
        echo '[]';
    }
}
?>
