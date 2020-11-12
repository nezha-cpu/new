<?php
require '../config.php';
$sql = "SELECT dmd.id, dmd.cin , dmd.nom , dmd.prénom , dmd.Sdate , dmd.email , dmd.intérim , dmd.Edate , personnel.grade ,
         personnel.cin , personnel.division , type.congé , duration.durée FROM  `dmd` INNER JOIN `type` ON dmd.cin=type.cin
         INNER JOIN `personnel` ON personnel.cin = dmd.cin INNER JOIN `duration` ON dmd.cin=duration.cin AND dmd.RA=1 
          group by personnel.cin  " ; 
if(!empty($_GET['a'])){
    $sql= " SELECT dmd.id, dmd.cin , dmd.nom , dmd.prénom , dmd.Sdate , dmd.email , dmd.intérim , dmd.Edate , personnel.grade ,
    personnel.cin , personnel.division , type.congé , duration.durée FROM  `dmd` INNER JOIN `type` ON dmd.cin=type.cin
    INNER JOIN `personnel` ON personnel.cin = dmd.cin INNER JOIN `duration` ON dmd.cin=duration.cin AND dmd.RA=1 
     AND dmd.prénom LIKE \"%".$_GET['a']."%\" group by dmd.cin   " ; 
}
$results = mysqli_query($conn , $sql) or die ("bad query");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns:o="urn:schemas-microsoft-com:office:office" __expr-val-dir="ltr" lang="fr-fr" dir="ltr">
<html>
    <head>
        <title>Espace_Gestionnaire</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../ResH.css">
    
        
        
    </head>
    <body>
        <nav id="navigation">
            <ul class="parent">
                <li><a href="../index_ges.php"><i class="fa fa-home" aria-hidden="true"></i> Accueil</a></li>
                <li><a href="index.php" ><i class="fa fa-clone" aria-hidden="true"></i> Liste des demandes </a></li>
                <li><a href="histo_ges.php" ><i class="fa fa-clock-o" aria-hidden="true" ></i> Historique</a></li>
                <li><a href="../github/index1.php"><i class="fa fa-calendar-check-o" aria-hidden="true" ></i> Agenda</a>
                <li><a href="../logout.php" ><i class="fa fa-sign-out" aria-hidden="true" ></i> Déconnexion</a></li>
            </ul>
        </nav>
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
        <th>Type de congé</th>
        <th>Durée</th>
        <th>Grade</th> 
        <th>Action</th>
</div>
</tr>
    </thead>
    <?php foreach($results as $result): ?>
    <tbody>
        <tr>
            <th><?= $result['nom']?></th>
            <th><?= $result['prénom']?></th>
            <th><?= $result['Sdate']?></th>
            <th><?= $result['email']?></th>
            <th><?= $result['intérim']?></th> 
            <th><?= $result['congé']?></th>
            <th><?= $result['durée']?></th>
            <th><?= $result['grade']?></th>
            <th><a href="validate.php?valid=<?php echo $result['id'] ; ?>" class="btn btn-primary" >Valider</a></th>
        </tr>
        <?php endforeach ?> 
    </tbody>
</table>
</form>