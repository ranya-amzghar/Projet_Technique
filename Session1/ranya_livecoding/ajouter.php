<?php
require 'config.php';
$sql1='SELECT * FROM section';
$stmt = $pdo->query($sql1);
$sections = $stmt->fetchAll(PDO::FETCH_ASSOC);
if($_SERVER['REQUEST_METHOD']=== 'POST'){
    if(isset($_POST['action']) && $_POST['action'] ==='ajouter'){
        $titre= $_POST['titre'];
        $contenu = $_POST['contenu'];
        $section = $_POST['section'];
        $status = $_POST['status'];
        if(!empty($titre) && !empty($contenu) && !empty($section)){
            $sql2= "INSERT INTO article(titre_article,contenu_article,id_section,status) VALUES (:titre_article,:contenu_article,:id_section,:status)";
            $st = $pdo->prepare($sql2);
            $st->execute([
                'titre_article' => $titre,
                'contenu_article' => $contenu,
                'id_section' => $section,
                'status' => $status
            ]);
            header('Location: index.php');
            exit;
        }else{
            echo 'Remplissez tout les champs';
        }
    }else{
        header('Location: index.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="post">
        <label for="titre">Titre</label>
        <input type="text" name="titre" id="titre">
        <label for="contenu">Contenu</label>
        <textarea name="contenu" id="contenu" cols="30" rows="10"></textarea>
        <label for="section">Section</label>
        <select name="section" id="section">
            <?php
                foreach($sections as $s){
                    echo "<option value='".$s['id_section']."'>".$s['section_nom']."</option>";
                }        
            ?>
        </select>
        <label for="status">Status</label>
        <select name="status" id="status">
            <option value="brouillon">Brouillon</option>
            <option value="publier">Publier</option>
        </select>
        <button name='action' value='ajouter'>Ajouter</button>
        <button name='action' value='annuler'>Annuler</button>
    </form>
</body>
</html>