<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns:o="urn:schemas-microsoft-com:office:office" __expr-val-dir="ltr" lang="fr-fr" dir="ltr">
<html>
    <head>
        <title>Espace_Gestionnaire</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../ResH.css">
        <link rel="stylesheet" href="swiper.css">
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">        
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
<h1>Historique des congés validés</h1>
<form action="" >
        <input type="text" class="form-control" name="a" placeholder="Rechercher par prénom" style="width:280px;">
        <button class="btn btn-primary" id="search">Rechercher</button>
</form>
<?php 
require('../config.php') ; 
$sql = "SELECT dmd.id, dmd.cin , dmd.nom , dmd.prénom , dmd.Sdate , dmd.email , dmd.intérim , dmd.Edate , personnel.grade ,
         personnel.cin , personnel.division , personnel.adresse , personnel.joursrest,  type.congé , duration.durée FROM  `dmd` INNER JOIN `type` ON dmd.cin=type.cin
         INNER JOIN `personnel` ON personnel.cin = dmd.cin INNER JOIN `duration` ON dmd.cin=duration.cin AND dmd.RA=1 
          group by personnel.cin  " ; 
          if(!empty($_GET['a'])){
            $sql= " SELECT dmd.id, dmd.cin , dmd.nom , dmd.prénom , dmd.Sdate , dmd.email , dmd.intérim , dmd.Edate , personnel.grade ,
            personnel.cin , personnel.division , personnel.joursrest,type.congé , duration.durée FROM  `dmd` INNER JOIN `type` ON dmd.cin=type.cin
            INNER JOIN `personnel` ON personnel.cin = dmd.cin INNER JOIN `duration` ON dmd.cin=duration.cin AND dmd.RA=1 
             AND dmd.prénom LIKE \"%".$_GET['a']."%\" group by dmd.cin   " ; 
        }
        $results = mysqli_query($conn , $sql) or die ("bad query");
 $results = mysqli_query($conn , $sql) or die ("bad query");?>
  
       
<div class="testimonials">
    <div class="swiper-container">
        <div class="swiper-wrapper">
        <?php foreach($results as $result): ?>
            <div class="swiper-slide">
                <div class="card">
                    <div class="layer"></div>
                        <div class="content">
                            <p><font size="7"><?= $result['nom']?> <?= $result['prénom']?></font> </p>
                            <p><?= $result['nom']?> <?= $result['prénom']?> , <?= $result['grade']?> 
                            <?= $result['division']?> a eu un <strong><?= $result['congé']?></strong></p> 
                            <p> d'une durée de: <strong><?= $result['durée']?></strong></p>
                            <p>A partir du : <strong><?= $result['Sdate']?></strong></p>
                            <p>Ayant pour intérims : <strong><?= $result['intérim']?> intérims </strong></p>
                            <p>Son solde restant : <strong><?= $result['joursrest']?></strong> jours</p>
                            <p><I><strong><?= $result['email']?></strong></I></p>
                        </div>
                    </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</div>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper('.swiper-container', {
      effect: 'coverflow',
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: 'auto',
      coverflowEffect: {
        rotate: 0,
        stretch: 0,
        depth: 0,
        modifier: 1,
        slideShadows: true,
      },
     loop: true , 
    });
  </script>
