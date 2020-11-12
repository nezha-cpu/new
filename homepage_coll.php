<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns:o="urn:schemas-microsoft-com:office:office" __expr-val-dir="ltr" lang="fr-fr" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <title>Homepage</title>
        <link rel="stylesheet" text="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="new.css" />
    </head>
    <header class="banner">
        <div id="entete">
            <h1><img src="royaume.png"></h1>
            <h2>
                Royaume du maroc</h2>
            <h3>
                Ministère de l’Equipement, du Transport<br />
                de la Logistique et de l’eau</h3>
            <h4><img src="minis.png"></h4>
        </div>
    </header>
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
    $query = "INSERT into `users` (username, email, password)
              VALUES ('$username', '$email', '".hash('sha256', $password)."')";
  // Exécuter la requête sur la base de données
    $res = mysqli_query($conn, $query);
    if($res){
       echo "<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p> Connectez-vous s'il vous plaît</p>
       </div>" ;
    }
}else{
?>
<style>

.box-left{
    position: absolute;
    top:60% ; 
    left:50% ;
    transform: translate(-98% , -40%);
    width: 350px ;
    padding: 40px ;
    background: rgba(0,0,0,0.8);
    box-sizing: border-box ;
    box-shadow: 0 15px 35px rgba(0,0,0,.5);
    border-radius: 20px ;
}
.box-left h3{
    padding: 0 ;
    margin: 0 0 20px ;
    color: #1E7FCB;
    text-align: center;

}
.fa{
    color: #1E7FCB;
}
.box-left .form_input{
    position:relative;
}
.box-left .form_input input{
    width: 90%;
    padding : 5px 5px ;
    font-size: 16px;
    color: #fff;
    letter-spacing:1px;
    margin-bottom: 30px;
    border: none;
    border-bottom: 1px solid #fff;
    outline: none;
    background: transparent ;   
          
}
.box-left .form_input label{
    position: absolute;
    top:0;
    left:0;
    padding: 10px 0 ;
    font-size:15px;
    color:#fff;
    letter-spacing:1px;
    pointer-events: none;
    transition: .5s
}

.box-left .form_input input:focus ~ label,
.box-left .form_input input:valid ~ label{
    top: -35px;
    left:0;
    color: #03a9f4;
    font-size:12px;
}
.box-left .btn{
    background: transparent ;
    border: none;
    outline: none ; 
    color: #fff ; 
    background: #03a9f4;
    padding: 10px 20px ;
    cursor: pointer ;
    border-radius: 5px ;
}
.box-left-register{
    color: #fff ; 
}

</style>
<div class="box-left">
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
    
</form>
<?php } ?>
</div>

    </body>
    <?php
//require('config.php');
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
<style>
.box-right{
    position: absolute;
    top:50% ; 
    left:50% ;
    transform: translate(1.5% , -25%);
    width: 350px ;
    padding: 40px ;
    background: rgba(0,0,0,0.8);
    box-sizing: border-box ;
    box-shadow: 0 15px 25px rgba(0,0,0,.5);
    border-radius: 10px ;
}
.box-right h3{
    padding: 0 ;
    margin: 0 0 30px ;
    color: #1E7FCB;
    text-align: center;

}
.fa{
    color: #1E7FCB;
}
.box-right .form_input{
    position:relative;
}
.box-right .form_input input{
    width: 100%;
    padding : 15px 5px ;
    font-size: 16px;
    color: #fff;
    letter-spacing:1px;
    margin-bottom: 30px;
    border: none;
    border-bottom: 1px solid #fff;
    outline: none;
    background: transparent ;           
}
.box-right .form_input label{
    position: absolute;
    top:0;
    left:0;
    padding: 10px 0 ;
    font-size:15px;
    color:#fff;
    letter-spacing:1px;
    pointer-events: none;
    transition: .5s
}


.box-right .form_input input:focus ~ label,
.box-right .form_input input:valid ~ label{
    top: -35px;
    left:0;
    color: #03a9f4;
    font-size:12px;
}
.box-right .btn{
    background: transparent ;
    border: none;
    outline: none ; 
    color: #fff ; 
    background: #03a9f4;
    padding: 10px 20px ;
    cursor: pointer ;
    border-radius: 5px ;
}
.errorMessage{
    color: #fff ;
}
.box-right-register{
    color:#fff;
}
</style>
<div class="box-right">
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
<p>                                                                 </p>
<?php if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
<?php } ?>
</form>
</div>
</body>
</html>