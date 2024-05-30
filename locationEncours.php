<!DOCTYPE html>
<html >
<head>
    
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
    echo 'bonjour'.' ' . $_SESSION['user']['nom'].''.$_SESSION['user']['prenom'];
    $id= $_SESSION['user']['id_client'];
    try{
        $pdo= new PDO('mysql:host=localhost,dbname=immobilier','root','');
    }
    catch(exeption $e){
        echo 'erreur'.' ' echo$e->getmessage();
    }
    $sqlstate=$pdo->prepare('SELECT * FROM location 
                            INNER JOIN immobilier ON location.id_immobilier=immobilier.id_immobilier
                            INNER JOIN client ON client.id_client=location.id_client
                            WHERE id_client = ?');
        $sqlstate->execute($id);
        $location=$sqlstate->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <table width="100%" border="1">
        <thead>
            <tr>
                <th>Titre Location</th>
                <th>Nom du client</th>

            </tr>
            <?php
            foreach($locations as $location){
                ?>
                <tr>
                    <td><?php echo $location['id_immobilier'] ?></td>
                    <td><?php echo $location['id_client'] ?></td>
                </tr>
                <?php
            }
             ?>
        </thead>

    </table>
    
</body>
</html>