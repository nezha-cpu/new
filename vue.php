<?php
require('conf.php');
session_start();

if (isset($_POST['cin'] , $_POST['nom'] , $_POST['prénom'], $_POST['email'] ,  $_POST['tel'],  $_POST['adresse'],$_POST['grade'],$_POST['division'],$_POST['jtot'], $_POST['jrest'])) {
    
    $cin = $_POST["cin"];
    $nom = $_POST["nom"];
    $prénom = $_POST["prénom"];
    $email = $_POST["email"];
    $tel = $_POST['tel'];
    $adresse = $_POST['adresse'];
    $grade = $_POST['grade'];
    $division = $_POST['division'];
    $jtot = $_POST['jtot'];
    $jrest = $_POST['jrest'];
    
}
$query = "INSERT into `personnel` (cin, nom, prénom , email , tel , adresse , division, grade , jourstot , joursrest)
VALUES ('$cin', '$nom', '$prénom' , '$email' ,'$tel', '$adresse' ,  '$division' , '$grade' , '$jtot' , '$jrest')";
$res = mysqli_query($con, $query);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns:o="urn:schemas-microsoft-com:office:office" __expr-val-dir="ltr" lang="fr-fr" dir="ltr">
<html>
    <head>
        <title>Ajout d'un personnel</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
        <script src="jquery.js"></script>
        <link rel="stylesheet" type="text/css" href="valid.css">
        <link rel="stylesheet" type="text/css" href="pop.css">
    </head>
    <body>
        <nav id="navigation">
            <ul class="parent">
                <li><a href="index_val.php"><i class="fa fa-home" aria-hidden="true"></i> Accueil</a></li>
                <li><a href="liste_demandes.php" ><i class="fa fa-clone" aria-hidden="true"></i> Liste des demandes</a></li>
                <li><a href="liste_perso.php" ><i class="fa fa-clock-o" aria-hidden="true" ></i> Liste des personnels</a></li>
                <li><a href="ajout_perso.php" ><i class="fa fa-plus" aria-hidden="true"></i> Ajouter un personnel</a></li>
                <li><a href="github/index2.php"><i class="fa fa-calendar-check-o" aria-hidden="true" ></i> Agenda</a>
                <li><a href="logout.php" ><i class="fa fa-sign-out" aria-hidden="true" ></i> Déconnexion</a></li>
            </ul>
        </nav>
        <link rel="stylesheet" type="text/css" href="form5.css">
    <div class="form">
    <h3 class="titre">Le personnel à ajouter:</h3>
    <?php 
    echo '<b><font color="#28930a">Cin :</font></b>' .$cin  ; 
    echo "<br>";
    echo  '<b><font color="#28930a">Prénom & nom :</font></b>'.$prénom. "\t".$nom ;
    echo  "<br>".'<b><font color="#28930a">Email :</font></b>'."\t\t\t\t\t".$email ;
    echo "<br>".'<b><font color="#28930a">Téléphone :</font></b>'. $tel ;
    echo "<br>". '<b><font color="#28930a">Adresse:</font></b>' ."\t". $adresse ;
    echo "<br>". '<b><font color="#28930a">Grade:</font></b>' ."\t". $grade ;
    echo "<br>". '<b><font color="#28930a">Division:</font></b>' ."\t". $division ;
    echo "<br>". '<b><font color="#28930a">Nombre des jours total:</font></b>' ."\t". $jtot ;
    echo "<br>". '<b><font color="#28930a">Nombre des jours restant:</font></b>' ."\t". $jrest ;
    ?>
    <footer>
    </br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="submit" class="btn" id="envoyer" onclick="togglePopup()" value="Ajouter le personnel" /> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; <a href="ajout_perso.php"><input type="reset"  class="btn" value="Rétablir" /></a>
  
    </footer>  
</div>
<div class="popup" id="popup-1">
  <div class="overlay"></div>
  <div class="content">
    <div class="close-btn" onclick="togglePopup()">&times;</div>
    <i for="envoyer" class="fa fa-check" aria-hidden="true"></i>
    <p class="dm">Le personnel a bien été ajouté!</p>
  </div>
</div>
<script>
function togglePopup(){
  document.getElementById("popup-1").classList.toggle("active");
}
</script>

