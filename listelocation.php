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
        echo 'erreur'.' ' echo$e->getmessage();
    }
    $sqlstate=$pdo->prepare('SELECT * FROM location 
                            INNER JOIN immobilier ON location.id_immobilier=immobilier.id_immobilier
                            INNER JOIN client ON client.id_client=location.id_client
                            WHERE ?');
        $sqlstate->execute($where);
        $location=$sqlstate->fetchAll(PDO::FETCH_ASSOC);

        if(isset($_GET['rechercher'])){
            $date1=$_GET['date1'];
            $date2=$_GET['date2'];
            $where='location.date_debut_location < $date1 and location.date_fin_location >$date2';
        }
        

    ?>
    <form method="get">
        <label >Date début</label>
        <input type="date" name="date1">
        <label >Date fin</label>
        <input type="date" name="date2">
        <input type="submit" value="rechercher" name="rechercher">
    </form>
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