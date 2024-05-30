<?php
try{
    $pdo= new PDO('mysql:host=localhost,dbname=immobilier','root','');
}
catch(exeption $e){
    echo 'erreur'.' ' echo $e->getmessage();
}
$id = $_GET['id'];
    $sqlstate=$pdo->prepare('DELETE  FROM client WHERE id_client=?');
    $sqlstate->execute([$id]);
header('location:listerC.php')
?>