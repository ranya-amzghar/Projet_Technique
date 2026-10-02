<?php
require 'config.php';
$sql= 'SELECT a.*, s.section_nom FROM article a JOIN section s ON a.id_section = s.id_section';
$stmt= $pdo->query($sql);
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Gestion des News</h3>
    <a href="ajouter.php">Ajouter un article</a>
    <table border='1'>
        <tr>
            <th>Titre</th>
            <th>Section</th>
            <th>Date</th>
            <th>Status</th>
        </tr>
        <?php
            foreach($articles as $article){
                echo '<tr>
                        <td>'.$article['titre_article'].'</td>
                        <td>'.$article['section_nom'].'</td>
                        <td>'.$article['date_creation'].'</td>
                        <td>'.$article['status'].'</td>
                    </tr>';
            }
        ?>
    </table>
</body>
</html>