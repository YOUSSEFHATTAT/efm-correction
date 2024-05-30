<!DOCTYPE html>
<html>
<head>
  
    <title>Document</title>
</head>
<body>
    <form method="post">
        <label >email</label>
        <input type="email" name="email">
        <label >password</label>
        <input type="password" name="password">
        <input type="submit" value="connexion" name="connexion">

    </form>
    <?php
    try{
        $pdo= new PDO('mysql:host=localhost,dbname=immobilier','root','');
    }
    catch(exeption $e){
        echo 'erreur'.' ' echo$e->getmessage();
    }
    if(!empty($_POST['email'])&& !empty($_POST['password'])){
    $email=htmlspecialchars($_POST['email']);
    $password=htmlspecialchars($_POST['password']);
    $sqlstate=$pdo->prepare('SELECT *  FROM client WHERE email=? AND password= ?');
    $sqlstate->execute([$email,$password]);
    if($sqlstate->rowCount()>=1){
        session_start();
        $_SESSION['user']=$sqlstate->fetch(PDO::FETCH_ASSOC);
        header('location:locationEncours.php')

    }else{
        echo'login ou mot de passe incorrecte.'
    }
    }
    else{
        echo'tous les champs sont obligatoires';
    }
    ?>
    
</body>
</html>