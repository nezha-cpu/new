<?php
require 'config.php';
$sql = "SELECT * FROM  `personnel` " ; 
if(!empty($_GET['a'])){
    $sql="SELECT * FROM `personnel` WHERE prénom LIKE \"%".$_GET['a']."%\"" ; 
}
$results = mysqli_query($conn , $sql) or die ("bad query");
    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns:o="urn:schemas-microsoft-com:office:office" __expr-val-dir="ltr" lang="fr-fr" dir="ltr">
<html>
    <head>
        <title>Liste des personnels</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
        <link rel="stylesheet" href="liste_perso.css">            
    </head>
<body>
 
<nav id="navigation">
    <ul class="parent">
        <li><a href="index_val.php"><i class="fa fa-home" aria-hidden="true"></i> Accueil</a></li>
        <li><a href="liste_demandes.php" ><i class="fa fa-clone" aria-hidden="true"></i> Liste des demandes</a></li>
        <li><a href="#" ><i class="fa fa-clone" aria-hidden="true"></i> Liste des personnels</a></li>
        <li><a href="ajout_perso.php" ><i class="fa fa-plus" aria-hidden="true"></i> Ajouter un personnel</a></li>
        <li><a href="github/index2.php"><i class="fa fa-calendar-check-o" aria-hidden="true" ></i> Agenda</a>
        <li><a href="logout.php" ><i class="fa fa-sign-out" aria-hidden="true" ></i> Déconnexion</a></li>
    </ul>
</nav>


<h1>Liste des personnels</h1>

<form action="" >
        <input type="text" class="form-control" name="a" placeholder="Rechercher par prénom" style="width:280px;">
        <button class="btn btn-primary" id="search">Rechercher</button>
</form>
<table >
    <thead>
        <tr>
            <th>CIN</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Téléphone</th>
            <th>Adresse</th>
            <th>Grade</th>
            <th>Division</th>
            <th>Nbr jours total</th>
            <th>Nbr jours restant</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($results as $result):?>
        <tr>
            <th><?= $result['cin']?></th>
            <th><?= $result['nom']?></th>
            <th><?= $result['prénom']?></th>
            <th><?= $result['tel']?></th>
            <th><?= $result['adresse']?></th>
            <th><?= $result['grade']?></th> 
            <th><?= $result['division']?></th>
            <th><?= $result['jourstot']?></th>
            <th><?= $result['joursrest']?></th>
            <th>
            <a href="Edit.php?edit=<?php echo $result['id'] ; ?>" class="btn btn-info" ><i class="fa fa-bars" aria-hidden="true"></i></a>
            <a href="Actio.php?delete=<?php echo $result['id'] ; ?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
            </th>  
        </tr>
    <?php endforeach ?>
    </tbody>
</table>  
</body>


