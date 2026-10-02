<?php
$host = 'localhost';
$dbname= 'NewsBlog';
$user= 'root';
$password = 'nez8ko$$';
try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname",$user,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $a){
    echo "Error: ". $a->getMessage();
}
?>