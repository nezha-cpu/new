<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" text="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="style_login.css" />
</head>
<body>
<?php
require('config.php');
if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password'])){
  // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username); 
  // récupérer l'email et supprimer les antislashes ajoutés par le formulaire
  $email = stripslashes($_REQUEST['email']);
  $email = mysqli_real_escape_string($conn, $email);
  // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
  //requéte SQL + mot de passe crypté
    $query = "INSERT into `users1` (username, email, password)
              VALUES ('$username', '$email', '".hash('sha256', $password)."')";
  // Exécuter la requête sur la base de données
    $res = mysqli_query($conn, $query);
    if($res){
       echo "<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
       </div>" ;
    }
}else{
?>
<div class="box">
<form action="" method="post">
    <h3 class="box-title">S'inscrire</h3>
    <div class="form_input">
    <input type="text" class="box-input" name="username" required />
    <label>Nom d'utilisateur</label>
    </div>
    <div class="form_input">
    <input type="text" class="box-input" name="email" required />
    <label>E-mail</label>
    </div>
    <div class="form_input">
    <input type="password" class="box-input" name="password"  required />
    <label>Mot de passe</label>
    </div>
    <input type="submit" name="submit" value="S'inscrire"  class="btn"/>
    <p class="box-register">Déjà inscrit? <a href="login.php">Connectez-vous ici</a></p>
</form>
<?php } ?>
</div>
</body>
</html>