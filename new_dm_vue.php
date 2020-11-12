<?php
require('conf.php');
session_start();
if (isset($_POST['cin'] , $_POST['nom'] , $_POST['prénom'], $_POST['email'] , $_POST["Sdate"] ,  $_POST["Edate"],$_POST["intérim"] , $_POST["type"])) {
    
    $cin = $_POST["cin"];
    $nom = $_POST["nom"];
    $prénom = $_POST["prénom"];
    $email = $_POST["email"];
    $intérim = $_POST["intérim"];
    $Sdate = $_POST["Sdate"];
    $Edate = $_POST["Edate"];
    @$type= $_POST["type"];
}
include("type.php");
$req= $pdo->prepare("INSERT INTO type (congé , cin ) VALUES(? , '$cin')");
$req-> execute(array(implode("|" ,$type)));  
if(!empty($_FILES)){
    include("type.php");
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    $fileExt = explode('.' , $fileName);
    $fileActualExt = strtolower(end($fileExt));
        if($fileError === 0){ 
            $fileNameNew = uniqid('' , true).".".$fileActualExt;
            $fileDestination = 'uploads/'.$fileName ;
            move_uploaded_file( $fileTmpName , $fileDestination);
            $rqt=$pdo->prepare("INSERT INTO files(cin , name , file_url , new ) VALUES('$cin' , ?,? , '$fileName')");
            $rqt->execute(array($fileNameNew, $fileDestination));
        }
        else{
            echo "<script>alert(\"une erreur est survenue lors du téléchargement\")</script>";
        }
}

$query = "INSERT into `dmd` (cin, nom, prénom , email , Edate ,Sdate , intérim , RA  )
VALUES ('$cin', '$nom', '$prénom' , '$email' ,'$Edate', '$Sdate' ,  '$intérim' , -1  )";
$res = mysqli_query($con, $query);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns:o="urn:schemas-microsoft-com:office:office" __expr-val-dir="ltr" lang="fr-fr" dir="ltr">
<html>
    <head>
        <title>Demande_vue</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="jquery.js"></script>
        <link rel="stylesheet" type="text/css" href="jquery.css">
    </head>
    <body>
        <nav id="navigation">
            <ul class="parent">
                <li><a href="index_coll.php" ><i class="fa fa-home" aria-hidden="true"></i> Accueil</a></li>
                <li><a href="new_dm.php" ><i class="fa fa-clone" aria-hidden="true"></i> Demandes </a></li>
                <li><a href="new_histo.php" ><i class="fa fa-clock-o" aria-hidden="true" ></i> Historique</a></li>
                <li><a href="github/index.php"><i class="fa fa-calendar-check-o" aria-hidden="true" ></i> Agenda</a>
                <li><a href="logout.php" ><i class="fa fa-sign-out" aria-hidden="true" ></i> Déconnexion</a></li>
            </ul>
        </nav>
        <link rel="stylesheet" type="text/css" href="new_dm.css">
    <div class="form">
    <h3 class="titre">Votre demande :</h3>
    <?php
    echo '<b><font color="#28930a">Cin :</font></b>' .$cin  ; 
    echo  "<br>".'<b><font color="#28930a">Prénom & nom :</font></b>'.$prénom. "\t".$nom ;
    echo  "<br>".'<b><font color="#28930a">Email :</font></b>'."\t\t\t\t\t".$email ;
    echo "<br>".'<b><font color="#28930a">Date de sortie :</font></b>'. $Sdate . "&nbsp; &nbsp;"."\n".'<b><font color="#28930a">Date d\'entrée:</font></b>' ."\t". $Edate ;

if(!empty($_POST['Sdate']) && !empty($_POST['Edate'])):
    $Sdate = new DateTime($_POST['Sdate']);
    $Edate = new DateTime($_POST['Edate']);
    $interval = $Sdate->diff($Edate);
    $durée= $interval->m."\t"."mois" ."\t".$interval->d."\t"."jours" ;
    echo "<br>".'<b><font color="#28930a">La durée est : </font></b>'.$interval->m."Mois, ".$interval->d."Jours";
    $qy = "INSERT into `duration` (cin, durée  ) VALUES ('$cin', '$durée' )";
$rs = mysqli_query($con, $qy);
endif;
echo "<br>".'<b><font color="#28930a">Nombre des intérims : </font></b>'. $intérim;
foreach($_POST['type'] as $type ):
    echo "</br>".'<b><font color="#28930a">Vous voulez un :</font></b>'.$type;
endforeach;$type;
$nom_dossier = 'uploads/';
$dossier = opendir($nom_dossier);

/* while($fichier = readdir($dossier))
 {

    if($fichier != '.' && $fichier != '..')

{echo "</br>".'<b><font color="#28930a">Vos fichiers joints: </font></b>'. $fileName;}
}*/
echo "</br>".'<b><font color="#28930a">Vos fichiers joints: </font></b>'. $fileName ;
//closedir($dossier);
        
?>
<footer>
</br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="submit" class="btn" id="envoyer" onclick="togglePopup()" value="Valider" /> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; <a href="ajout_perso.php"><input type="reset"  class="btn" value="Rétablir" /></a>
  
    </footer>  
</div>
<link rel="stylesheet" type="text/css" href="pop.css">
<div class="popup" id="popup-1">
  <div class="overlay"></div>
  <div class="content">
    <div class="close-btn" onclick="togglePopup()">&times;</div>
    <i for="envoyer" class="fa fa-check" aria-hidden="true"></i>
    <p class="dm">La demande a bien été ajoutée!</p>
  </div>
</div>
<script>
function togglePopup(){
  document.getElementById("popup-1").classList.toggle("active");
}
</script>
