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
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username); 
  $email = stripslashes($_REQUEST['email']);
  $email = mysqli_real_escape_string($conn, $email);

  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);

    $query = "INSERT into `users2` (username, email, password)
              VALUES ('$username', '$email', '".hash('sha256', $password)."')";
  // Exécuter la requête sur la base de données
    $res = mysqli_query($conn, $query);
    if($res){
       echo "<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='login_val.php'>connecter</a></p>
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
    <p class="box-register">Déjà inscrit? <a href="login_val.php">Connectez-vous ici</a></p>
</form>
<?php } ?>
</div>
</body>
</html>