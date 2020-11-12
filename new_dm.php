<?php
require('conf.php');
if (isset($_REQUEST['cin'], $_REQUEST['nom'], $_REQUEST['prénom'], $_REQUEST['email'], $_REQUEST['intérim'] ,$_REQUEST['type'])){
    $cin = stripslashes($_REQUEST['cin']);
    $cin = mysqli_real_escape_string($con, $cin); 
    $nom = stripslashes($_REQUEST['nom']);
    $nom = mysqli_real_escape_string($con, $nom);
    $prénom = stripslashes($_REQUEST['prénom']);
    $prénom = mysqli_real_escape_string($con, $prénom);
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con, $email);
    $Edate = stripslashes($_REQUEST['Edate']);
    $Edate = mysqli_real_escape_string($con, $Edate);
    $Sdate = stripslashes($_REQUEST['Sdate']);
    $Sdate = mysqli_real_escape_string($con, $Sdate);
    $intérim = stripslashes($_REQUEST['intérim']);
    $intérim = mysqli_real_escape_string($con, $intérim);
    $type = stripslashes($_REQUEST['type']);
    $type = mysqli_real_escape_string($con, $type); 
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
        <link rel="stylesheet" type="text/css" href="jquery.css">
        <link rel="stylesheet" type="text/css" href="new_dm.css">
        <style>
            .titre{
                position: absolute;
                top:7%;
                left:14%; 
            }
        </style>
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
    </body> 
    <div class="form">
    <legend><img class="pers" src="dd3.png"></legend><h3 class="titre">Poser votre demande</h3>
    <form method="POST" action="new_dm_vue.php" enctype="multipart/form-data">
            <label>Prénom:</label>
            <input type="text" name="prénom" id="prénom" required/>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Nom:</label>
            &nbsp;<input type="text" name="nom" id="nom" required/>
            </br><label>CIN:</label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="cin" id="cin" required/>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="email" >Email:</label>
            <input type="email" id="email" name="email">
            </br>
            <label for="date">Date de sortie:</label>
            <input type="date" id="Edate" name="Edate" required>
            &nbsp; &nbsp;&nbsp; &nbsp;<label for="date">Date d'entrée:</label>
            <input type="date" id="Sdate" name="Sdate" required></br>
            </br><label>Fichiers joints:</label>
            <input type="file" name="file" id="file" />
            <br>
            </br><label >Vous voulez un : </label></br>
            &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="radio" name="type[]" value="Congé administratif annuel">Congé administratif annuel<br/>
            &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="radio" name="type[]" value="Congé de maternité"        >Congé de maternité<br/>
            &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="radio" name="type[]" value="Congé de pèlerinage"       >Congé de pèlerinage<br/>
            &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="radio" name="type[]" value="Congé de maladie"          >Congé de maladie<br/>
            &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="radio" name="type[]" value="Congé exceptionnel"        >Congé exceptionnel<br/>
            <label >Nombre des intérims:</label>
            <input type="number"  min="0" max="3" id="intérim" name="intérim" required><br>
  
 
        
    <footer>
    </br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="submit" class="btn" value="Valider" name="valider"/> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; <input type="reset" class="btn" value="Rétablir" />
    </footer>
  
    </form>
</div>
</html>
 