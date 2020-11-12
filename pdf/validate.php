<?php
require '../config.php';
if(isset($_GET['valid'])){
$id = $_GET['valid'];
$sql = "SELECT dmd.id, dmd.cin , dmd.nom , dmd.prénom , dmd.Sdate , dmd.email , dmd.intérim , dmd.Edate , personnel.grade ,
        personnel.cin , personnel.division , type.congé , duration.durée FROM  `dmd` INNER JOIN `type` ON dmd.cin=type.cin
        INNER JOIN `personnel` ON personnel.cin = dmd.cin INNER JOIN `duration` ON dmd.cin=duration.cin AND dmd.RA=1 
        WHERE dmd.id='$id' group by personnel.cin  " ; 
$results = mysqli_query($conn , $sql) or die ("bad query");
foreach($results as $result):
    $division = $result['division'];
    $nom =  $result['nom'] ; 
    $prénom =  $result['prénom'] ; 
    $Sdate =  $result['Sdate'] ;
    $Edate =  $result['Edate'] ;
    $email =  $result['email'] ;
    $intérim =  $result['intérim'] ;
    $grade = $result['grade'] ; 
    $durée = $result['durée'] ;
    $congé = $result['congé'] ; 
    //current year
    $année = strftime("%Y"); 
    //d-m-Y
    $Sdate = strtotime($Sdate);
    $Sdate = date('d-m-Y' , $Sdate);
    $Edate = strtotime($Edate);
    $Edate = date('d-m-Y' , $Edate);
endforeach ;}
if($_POST){
    require('fpdf/fpdf.php');
    $title = 'DECIDE';
    $pdf = new FPDF();
    $pdf -> AddPage();
    $pdf->SetTitle($title);
    $pdf->SetFont('Arial','B',15);
    $w = $pdf->GetStringWidth($title)+6;
    $pdf->SetX((195-$w)/2);
    $pdf->Cell(75 , 15 ,'DECISION' , 0 , 0); 
    $pdf->SetX((150-$w)/2);
    $pdf->Cell(45, 45 ,'MINISTERE DE L\'EQUIPEMENT,', 0 , 0);
    $pdf->SetX((110-$w)/2);
    $pdf->Cell(58, 58 ,'DU TRANSPORT, DE LA LOGISTIQUE ET DE L\'EAU', 0 , 0);
    $pdf->SetFont('Arial','B',12);
    $pdf->SetX((55-$w)/2);
    $pdf->Cell(100, 100 ,iconv('UTF-8', 'windows-1252', 'Vu le Dahir n° 1.58.008 du 4 Chaabane 1377 (24 février 1958) portant statut général'), 0 , 0 );
    $pdf->SetX((55-$w)/2);
    $pdf->Cell(112, 112 ,iconv('UTF-8', 'windows-1252', 'de la Fonction Publique et les textes qui l\'ont modifié ou complété ;'), 0 , 0);
    $pdf->SetX((55-$w)/2);
    $pdf->Cell(124, 124 ,iconv('UTF-8', 'windows-1252', 'Vu la demande formulée par l\'intéressé(e) en date du '.$Edate.'.'), 0 , 0);
    $pdf->SetFont('Arial','U',17);
    $pdf->SetX((195-$w)/2);
    $pdf->Cell(175 , 175 ,'DECIDE' , 0 , 0);
    $pdf->SetFont('Arial','U',12);
    $pdf->SetX((55-$w)/2);
    $pdf->Cell(220, 220 ,'ARTICLE UNIQUE :', 0 , 0 );
    $pdf->SetFont('Arial','',12);
    $pdf->SetX((135-$w)/2);
    $pdf->Cell(220, 220,iconv('UTF-8', 'windows-1252', 'Un'), 0 , 0 );
    $pdf->SetX((148-$w)/2);
    $pdf->Cell(220, 220,iconv('UTF-8', 'windows-1252', $congé.' de '.$durée.' ouvrables, représentant ses droits'), 0 , 0 );
    $pdf->Ln(8);
    $pdf->Cell(220, 220,iconv('UTF-8', 'windows-1252', 'à congé au titre'), 0 , 0 );
    $pdf->SetFont('Arial','B',12);
    $pdf->SetX((106-$w)/2);
    $pdf->Cell(220,220,iconv('UTF-8','windows-1252','de l\'année '.$année ), 0 ,0);
    $pdf->SetFont('Arial','',12);
    $pdf->SetX((170-$w)/2);
    $pdf->Cell(220,220,iconv('UTF-8','windows-1252','est accordé à ' ), 0 ,0);
    $pdf->SetFont('Arial','B',12);
    $pdf->SetX((222-$w)/2);
    $pdf->Cell(220, 220,iconv('UTF-8', 'windows-1252', $nom.' '.$prénom), 0 , 0 );
    $pdf->SetFont('Arial','',12);
    $pdf->SetX((279-$w)/2);
    $pdf->Cell(220, 220,iconv('UTF-8', 'windows-1252', ' '.$grade.' Grade '.$division.','),0,0);
    $pdf->Ln(8);
    $pdf->Cell(220, 220,iconv('UTF-8', 'windows-1252','à la direction au Ministère de l\'Equipement, du Transport, de la logistique et de l\'Eau, à partir '),0,0);
    $pdf->Ln(8);
    $pdf->Cell(220, 220,iconv('UTF-8', 'windows-1252', 'du'),0,0);
    $pdf->SetFont('Arial','B',12);
    $pdf->SetX((60-$w)/2);
    $pdf->Cell(220, 220,iconv('UTF-8', 'windows-1252', $Sdate), 0 , 0 );
    $pdf->Output();
}

   ?>
   <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns:o="urn:schemas-microsoft-com:office:office" __expr-val-dir="ltr" lang="fr-fr" dir="ltr">
<html>
    <head> 
        <title>Envoyer au signataire</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
        <link rel="stylesheet" type="text/css" href="validate.css">
      
       
    </head> 
<body>
<form method="post" action="" class="modify">

<p class="titre">Envoyer au signataire</p>
            <label>Nom:</label>
            <input type="text" name="cin" id="nom" value=" <?= $nom?> " disabled="disabled" />
           
            &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;<label>Prénom:</label>
            <input type="text" name="prénom" id="prénom" value="<?= $prénom?>" disabled="disabled" />
     
            <br><br><label for="email" >Email:</label>
            <input type="email" id="email" name="email" value="<?= $email?>" disabled="disabled"  />
        
            &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;<label>Grade:</label>
            <input type="text" name="grade" id="grade" value="<?= $grade ?>" disabled="disabled" />

            <br><br><label>Intérim</label>
             <input type="number" name="intérim" id="intérim" value="<?= $intérim ?>"  disabled="disabled" />

             &nbsp; &nbsp;&nbsp; &nbsp;<label>Date de sortie:</label>
             <input type="text" name="Sdate" id="Sdate" value="<?= $Sdate ?>"  disabled="disabled" />

             <br><br><label>La durée:</label>
             <input type="text" name="durée" id="durée" value="<?= $durée ?>"  disabled="disabled" />

             &nbsp; &nbsp;<label>  Le type du congé:</label>
             <input type="text" name="congé" id="congé" value="<?= $congé ?>"  disabled="disabled" />


    </br></br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
    <button class="btn btn-primary" name="modifier">Envoyer</button>
</form>
</body>