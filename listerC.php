<!DOCTYPE html>
<html >
<head>
    <title>Document</title>
</head>
<body>
    <?php
try{
    $pdo= new PDO('mysql:host=localhost,dbname=immobilier','root','');
}
catch(exeption $e){
    echo 'erreur'.' ' echo $e->getmessage();
}    $sqlstate=$pdo->prepare('SELECT * FROM client');
    $sqlstate->execute();
    print_r($sqlstate->fetchAll(PDO::FETCH_ASSOC));

    ?>
    <table width="100%" border="1">
        <thead>
            <tr>
            <th>id_client</th>
            <th>cin</th>
            <th>nom</th>
            <th>prenom</th>
            <th>email</th>
            <th>password</th>
            </tr>
        
        <?php
        foreach($clients as $client){
            ?>
            <tr>
                <td><?php echo $client['id_client']?></td>
                <td><?php echo $client['cin']?></td>
                <td><?php echo $client['nom']?></td>
                <td><?php echo $client['prenom']?></td>
                <td><?php echo $client['email']?></td>
                <td><?php echo $client['password']?></td>
                <td><a href="supprimer.php" id=<?php echo $client['id_client']?> onclick="return confirm('voulez vous vraiment supprimer le client ?' )">supprimer</a></td>

            </tr>
            <?php

        }

        ?>
        </thead>




    </table>
    <a href="ajouter.php">ajouter client</a>
</body>
</html>