<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns:o="urn:schemas-microsoft-com:office:office" __expr-val-dir="ltr" lang="fr-fr" dir="ltr">
<html>
    <head>
        <title>Espace_Validateur</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="list_dm.css">
    </head>
    <body>
        <nav id="navigation">
            <ul class="parent">
                <li><a href="index_val.php"><i class="fa fa-home" aria-hidden="true"></i> Accueil</a></li>
                <li><a href="liste_demandes.php" ><i class="fa fa-clone" aria-hidden="true"></i> Liste des demandes</a></li>
                <li><a href="liste_perso.php" ><i class="fa fa-clone" aria-hidden="true"></i> Liste des personnels</a></li>
                <li><a href="ajout_perso.php" ><i class="fa fa-plus" aria-hidden="true"></i> Ajouter un personnel</a></li>
                <li><a href="github/index2.php"><i class="fa fa-calendar-check-o" aria-hidden="true" ></i> Agenda</a>
                <li><a href="logout.php" ><i class="fa fa-sign-out" aria-hidden="true" ></i> Déconnexion</a></li>
            </ul>
        </nav>
    
    </body>
</html> 
<?php
require 'config.php';
if(isset($_GET['idA'])){
    $id = $_GET['idA'];
    $qry = "UPDATE dmd SET RA = 1  WHERE id='".$id."' ";
    $exec = mysqli_query($conn, $qry);
    }
$sql = "SELECT * FROM  `dmd`  " ; 
if(!empty($_GET['a'])){
    $sql=$sql ." WHERE prénom LIKE \"%".$_GET['a']."%\"" ; 
}
$results = mysqli_query($conn , $sql) or die ("bad query");
?>
<h1>Les demandes effectuées</h1>

<form action="" >
        <input type="text" class="form-control" name="a" placeholder="Rechercher par prénom" style="width:280px;">
        <button class="btn btn-primary" id="search">Rechercher</button>
</form>
<table >
    <thead>
        <tr><div class="nom">
            <th>Prénom</th>
            <th>Date de sortie</th>
            <th>Date d'entrée</th>
            <th>Nbr des intérims</th>
            <th>Action</th>
            </div>
        </tr>
    </thead>
    <tbody>
    <?php foreach($results as $result):?> 
        <tr>
            <th><?= $result['prénom']?></th>
            <th><?= $result['Sdate']?></th>
            <th><?= $result['Edate']?></th>
            <th><?= $result['intérim']?></th>
            <th>
            <?php 
            if($result['RA'] == 1){
                echo "<br>"."Demande acceptée";
            }
            else if($result['RA'] == 0){
                echo "<br>"."Demande refusée";
            }
            ?>
            <br><button class="btn btn-success">
                <a href="accept.php?idA=<?= $result['id']; ?>" style="text-decoration: none ; "> Accepter</a>
                </button>
                <br> &nbsp;<button class="btn btn-danger">
                 <a href="refuse.php?idR=<?= $result['id']; ?>" style="text-decoration: none ; "> Refuser</a>
                </button>
            </th>   
        </tr>
        <?php endforeach ?> 
        </form>
    </tbody>
</table>
<style>
thead tr{
    color:  #2d8dfd;
    text-align: left;
}
</style>