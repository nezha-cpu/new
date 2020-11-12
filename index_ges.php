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
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
        <script src="jquery.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="jquery.css">
        <link rel="stylesheet" type="text/css" href="Acc.css">
        
    </head>
    <body>
        <nav id="navigation">
            <ul class="parent">
                <li><a href="index_ges.php"><i class="fa fa-home" aria-hidden="true"></i> Accueil</a></li>
                <li><a href="pdf/index.php" ><i class="fa fa-clone" aria-hidden="true"></i> Liste des demandes </a></li>
                <li><a href="pdf/histo_ges.php" ><i class="fa fa-clock-o" aria-hidden="true" ></i> Historique</a></li>
                <li><a href="github/index1.php"><i class="fa fa-calendar-check-o" aria-hidden="true" ></i> Agenda</a>
                <li><a href="logout.php" ><i class="fa fa-sign-out" aria-hidden="true" ></i> Déconnexion</a></li>
            </ul>
        </nav>
        </br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<p class="Bien">Bienvenue <?php echo $_SESSION['username']; ?>!</p>
        <a href="Actualité/index.html" class="bt1">Ministère</a>
        <div class="horloge">
            <div class="heures"></div>
            <div class="date"></div>
        </div>
        <script src="hrlg.js"></script>
    </body>
    <footer>
    <div class="social">
        <a class="fb" href="https://web.facebook.com/EquipemenTTransport?_rdc=1&_rdr"><i class="fa fa-facebook-official fa-2x" aria-hidden="true"></i></a>
        <a class="yout" href="https://www.youtube.com/channel/UCwTLL-BGjCnRL-Tp6Cx3rpA"><i class="fa fa-youtube fa-2x" aria-hidden="true"></i></a>
    </div>
    </footer>
    
</html>
<style>

</style>
