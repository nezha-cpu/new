<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" text="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="style_login.css" />
</head>
<body>
<?php
require('config.php');
session_start();
if (isset($_POST['username'])){
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username);
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM `users` WHERE username='$username' and password='".hash('sha256', $password)."'";
  $result = mysqli_query($conn,$query) or die(mysql_error());
  $rows = mysqli_num_rows($result);
  if($rows==1){
      $_SESSION['username'] = $username;
      header("Location: index_coll.php");
  }else{
    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
  }
}
?>
<div class="box">
<form  action="" method="post" name="login">
<h3>Connexion</h3>
<div class="form_input">
<input type="text" name="username" class="form-control" required/>
<label>Nom d'utilisateur</label>
</div>
<div class="form_input">
<input type="password" name="password" class="form-control" required/>
<label>Mot de passe</label>
</div>
<input type="submit" name="submit" value="Se connecter"  class="btn"/>

<p class="box-register">Vous êtes nouveau ici? <a href="register.php">S'inscrire</a></p>
<?php if (! empty($message)) { ?>
    <p style="color:#fff"><?php echo $message; ?></p>
<?php } ?>
</form>
</div>
</body>
</html>