<?php
 
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["username"])){
    header("Location: login_ges.php");
    exit(); 
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns:o="urn:schemas-microsoft-com:office:office" __expr-val-dir="ltr" lang="fr-fr" dir="ltr">
<html>
    <head>
        <title>Espace_Gestionnaire</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="ResH.css">
    
        
        
    </head>
    <body>
        <nav id="navigation">
            <ul class="parent">
                <li><a href="index_ges.php"><i class="fa fa-home" aria-hidden="true"></i> Accueil</a></li>
                <li><a href="liste_RH.php" ><i class="fa fa-clone" aria-hidden="true"></i> Liste des demandes </a></li>
                <li><a href="#" ><i class="fa fa-clock-o" aria-hidden="true" ></i> Historique</a></li>
                <li><a href="github/index1.php"><i class="fa fa-calendar-check-o" aria-hidden="true" ></i> Agenda</a>
                <li><a href="logout.php" ><i class="fa fa-sign-out" aria-hidden="true" ></i> Déconnexion</a></li>
            </ul>
        </nav>
        <?php
require 'config.php';
$sql = "SELECT dmd.cin , dmd.nom , dmd.prénom , dmd.Sdate , dmd.email , dmd.intérim , dmd.Edate , personnel.grade, 
personnel.cin , personnel.division, type.congé FROM  `dmd`INNER JOIN `type` ON dmd.cin=type.cin INNER JOIN `personnel` 
ON personnel.cin = dmd.cin WHERE dmd.RA= 1 group by dmd.cin" ; 
if(!empty($_GET['a'])){
    $sql= "SELECT dmd.cin , dmd.nom , dmd.prénom , dmd.Sdate , dmd.email , dmd.intérim , dmd.Edate , personnel.grade, 
    personnel.cin , personnel.division, type.congé FROM  `dmd`INNER JOIN `type` ON dmd.cin=type.cin INNER JOIN `personnel` 
    ON personnel.cin = dmd.cin WHERE dmd.RA= 1  AND dmd.prénom LIKE \"%".$_GET['a']."%\"  " ; 
}
$results = mysqli_query($conn , $sql) or die ("bad query");
?>
<h1>Les demandes validées</h1>

<form action="" >
        <input type="text" class="form-control" name="a" placeholder="Rechercher par prénom" style="width:280px;">
        <button class="btn btn-primary" id="search">Rechercher</button>
</form>
<table >
    <thead>
        <tr><div class="nom">
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date de sortie</th>
            <th>Email</th>
            <th>Nbr des intérims</th>
            <th>Durée</th>
            <th>Grade</th> 
            <th>Type</th> 
            <th>Action</th>   
</div></tr>
    </thead>
    <tbody>
    <?php foreach($results as $result):
        $nom =  $result['nom'] ; 
        $prénom =  $result['prénom'] ; 
        $Sdate =  $result['Sdate'] ;
        $email =  $result['email'] ;
        $intérim =  $result['intérim'] ;
        ?>
        <tr>
            <th><?= $result['nom']?></th>
            <th><?= $result['prénom']?></th>
            <th><?= $result['Sdate']?></th>
            <th><?= $result['email']?></th>
            <th><?= $result['intérim']?></th>
            <th>
            <?php 
            
                $Sdate = new DateTime($result['Sdate']);
                $Edate = new DateTime($result['Edate']);
                $interval = $Sdate->diff($Edate);
                $durée= $interval->m."\t"."mois" ."\t".$interval->d."\t"."jours" ; 
                echo $interval->m."Mois, ".$interval->d."Jours";
            ?>
            </th> 
            <th><?= $result['grade']?></th> 
            <th><?= $result['congé']?></th>
            <th><button class="btn btn-primary" >Valider</button></th>
        </tr>
        <?php endforeach ?> 
    </tbody>
</table>


