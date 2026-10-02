<?php
require 'config.php';
$sql = "SELECT a.*, s.section_nom FROM article a JOIN section s ON a.id_section = s.id_section;";
$stmt = $pdo->query($sql);
$articles = $stmt->fetchAll(PDO:: FETCH_ASSOC);
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
    <header>
        <h3>Gestion des Articles</h3>
        <a href="ajouter.php">Ajouter un article</a>
    </header>
    <table border='1'>
        <tr>
            <th>Titre</th>
            <th>Date</th>
            <th>Section</th>
            <th>Status</th>
        </tr>
        <?php
        foreach($articles as $article){
            echo '<tr>
                <td>'.$article['titre_article'].'</td>
                <td>'.$article['date_creation'].'</td>
                <td>'.$article['section_nom'].'</td>
                <td>'.$article['status'].'</td>
            </tr>';
        }
        ?>
        
    </table>
</body>
</html>