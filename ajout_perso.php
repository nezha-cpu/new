<?php
require('conf.php');
if (isset($_REQUEST['cin'], $_REQUEST['nom'], $_REQUEST['prénom'], $_REQUEST['email'], $_REQUEST['tel'] , $_REQUEST['adresse'] ,$_REQUEST['division'],$_REQUEST['grade'] , $_REQUEST['jtot'] , $_REQUEST['jrest'] )){
    $cin = stripslashes($_REQUEST['cin']);
    $cin = mysqli_real_escape_string($con, $cin); 
    $nom = stripslashes($_REQUEST['nom']);
    $nom = mysqli_real_escape_string($con, $nom);
    $prénom = stripslashes($_REQUEST['prénom']);
    $prénom = mysqli_real_escape_string($con, $prénom);
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con, $email);
    $tel = stripslashes($_REQUEST['tel']);
    $tel = mysqli_real_escape_string($con, $tel);
    $adresse = stripslashes($_REQUEST['adresse']);
    $adresse = mysqli_real_escape_string($con, $adresse);
    $division = stripslashes($_REQUEST['division']);
    $division = mysqli_real_escape_string($con, $division);
    $grade = stripslashes($_REQUEST['grade']);
    $grade = mysqli_real_escape_string($con, $grade);
    $jtot = stripslashes($_REQUEST['jtot']);
    $jtot = mysqli_real_escape_string($con, $jtot);
    $jrest = stripslashes($_REQUEST['jrest']);
    $jrest = mysqli_real_escape_string($con, $jrest);
   
 
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns:o="urn:schemas-microsoft-com:office:office" __expr-val-dir="ltr" lang="fr-fr" dir="ltr">
<html>
    <head>
        <title>Espace_Validateur</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
        <script src="jquery.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="valid.css">
        <link rel="stylesheet" type="text/css" href="form5.css">
        <style>
            .titre{
                position: absolute; 
                top:10%;
                left:14%;
            }
        </style>
    </head>
    <body>
        <nav id="navigation">
            <ul class="parent">
                <li><a href="index_valid.php"><i class="fa fa-home" aria-hidden="true"></i> Accueil</a></li>
                <li><a href="liste_demandes.php" ><i class="fa fa-clone" aria-hidden="true"></i> Liste des demandes</a></li>
                <li><a href="liste_perso.php" ><i class="fa fa-clock-o" aria-hidden="true" ></i> Liste des personnels</a></li>
                <li><a href="ajout_perso.php" ><i class="fa fa-plus" aria-hidden="true"></i> Ajouter un personnel</a></li>
                <li><a href="github/index1.php"><i class="fa fa-calendar-check-o" aria-hidden="true" ></i> Agenda</a>
                <li><a href="logout.php" ><i class="fa fa-sign-out" aria-hidden="true" ></i> Déconnexion</a></li>
            </ul>
        </nav>
    
    </body>
    <div class="form">
    <legend><img class="pers" src="pers.png"></legend><h3 class="titre">Ajouter un personnel</h3>
    <form method="post" action="vue.php">
            <label>CIN:</label>
            <input type="text" name="cin" id="cin" required/>
            <label>Nom:</label>
            <input type="text" name="nom" id="nom" required/>
            <label>Prénom:</label>
            <input type="text" name="prénom" id="prénom" required/>
            <br><br><label>Tél:</label>
            <input type="text" name="tel" id="tel" required/>
            <label for="email" >Email:</label>
            <input type="email" id="email" name="email">
         	<label>Adresse :</label>
            <input type="text" name="adresse" id="adresse" required/>
            <br><br><label>Grade:</label>
            <input type="text" name="grade" id="grade" required/>
            <label>Division:</label>
            <input type="text" name="division" id="division" required/>
         	<br><br><label>Nombre des Jours Total</label>
            <input type="number" id="jtot" name="jtot" max="30" min="0" required/>
         	<label>Nombre des Jours Restant</label>
             <input type="number" name="jrest" id="jrest" max="30" min="0" required />
        
    <footer>
    </br></br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="submit" class="btn"   value="Ajouter le personnel" name="Ajouter"/> 
    &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; <input type="reset" class="btn" value="Rétablir" />
    </footer>
    </form>
</div>
</html>
