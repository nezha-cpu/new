<?php
require 'config.php';
$sql = "SELECT dmd.id , dmd.RA , dmd.cin , dmd.nom , dmd.prénom , dmd.Sdate , dmd.email , dmd.intérim , dmd.Edate ,
type.congé FROM  `dmd` INNER JOIN type ON type.cin=dmd.cin group by dmd.cin  " ; 
if(!empty($_GET['a'])){
    $sql= " SELECT dmd.RA , dmd.cin , dmd.nom , dmd.prénom , dmd.Sdate , dmd.email , dmd.intérim , dmd.Edate, 
    type.congé FROM  `dmd` INNER JOIN type ON 
    type.cin=dmd.cin AND dmd.prénom LIKE \"%".$_GET['a']."%\"  " ; 
}
$results = mysqli_query($conn , $sql) or die ("bad query");
    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns:o="urn:schemas-microsoft-com:office:office" __expr-val-dir="ltr" lang="fr-fr" dir="ltr">
<html>
<head>
        <title>Historique</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="histori.css">
       
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



<h1>Les demandes effectuées</h1>

<form action="" >
        <input type="text" class="form-control" name="a" placeholder="Rechercher par prénom" style="width:280px;">
        <button class="btn btn-primary" id="search">Rechercher</button>
</form>
<table >
    <thead>
        <tr>
            <th>Prénom</th>
            <th>Email</th>
            <th>Intérim</th>
            <th>Date de sortie</th>
            <th>Date de retour</th>
            <th>Type</th>
            <th>Action</th>
            <th>Etat</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($results as $result):?>
        <tr>
            <th><?= $result['prénom']?></th>
            <th><?= $result['email']?></th>
            <th><?= $result['intérim']?></th>
            <th><?= $result['Sdate']?></th>
            <th><?= $result['Edate']?></th>
            <th><?= $result['congé']?></th>
            <th>
            <a href="Annul.php?delete=<?php echo $result['id'] ; ?>" class="btn btn-danger">Annuler</a>
            </th> 
            <th><?php if($result['RA'] == -1):?>
            <i class="fa fa-spinner" aria-hidden="true" style="color: #696969 ;"></i> <?php echo "Pas encore traitée" ; ?>
            <?php elseif($result['RA'] == 1):?>
            <i class="fa fa-check" aria-hidden="true" style="color: green ;"></i> <?php echo "Demande acceptée" ; ?>
            <?php elseif($result['RA'] == 0):?>
                <i class="fa fa-times" aria-hidden="true" style="color: red ;"></i> <?php echo "Demande refusée" ; ?>
            <?php endif ; ?>
            </th>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>  
</body>