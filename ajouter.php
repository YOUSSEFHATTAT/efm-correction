<!DOCTYPE html>
<html >
<head>
    
    <title>Document</title>
</head>
<body>
    <form method="post">
        <label>CIN</label>
        <input type="text" name="cin"><br>
        <label>Nom </label>
        <input type="text" name="nom"><br>
        <label>Prenom</label>
        <input type="text" name="prenom"><br>
        <label>Email</label>
        <input type="text" name="email"><br>
        <label>Password</label>
        <input type="text" name="password"><br>
        <input type="submit" value="ajouter">
    </form>
    <?php
    try{
        $pdo= new PDO('mysql:host=localhost,dbname=immobilier','root','');
    }
    catch(exeption $e){
        echo 'erreur'.' ' echo $e->getmessage();
    }
    if(!empty($_POST['cin']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email'])&& !empty($_POST['password'])){
        $cin=htmlspecialchars($_POST['cin']);
        $nom= htmlspecialchars($_POST['nom']);
        $prenom= htmlspecialchars($_POST['prenom']);
        $email= htmlspecialchars($_POST['email']);
        $password= htmlspecialchars($_POST['password']);
        $sqlstate=$pdo->prepare('INSERT INTO client VALUES( ?,?,?,?,?)');
        $sqlstate->execute([$$cin,$prenom,$email,$password]);
    }
    else{
        echo 'tous les champs sont obligatoires.' ;
    }
    ?>
        
</body>
</html>