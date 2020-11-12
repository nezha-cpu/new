<?php 
   require 'config.php' ;
   if(isset($_GET['edit'])){
   $id = $_GET['edit'];
   $query= "SELECT * FROM personnel WHERE id='$id' " ; 
   $results = mysqli_query($conn, $query);}
   ?>
   <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns:o="urn:schemas-microsoft-com:office:office" __expr-val-dir="ltr" lang="fr-fr" dir="ltr">
<html>
    <head>
        <title>Modifier le personnel</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
        <link rel="stylesheet" href="liste1.css">
        <link rel="stylesheet" type="text/css" href="Edit.css">
      
       
    </head> 
<body>
<?php foreach($results as $result):
$newcin=$result['cin'] ; 
$newnom = $result['nom'] ;
$newprénom = $result['prénom'] ;
$newtel = $result['tel'] ;  
$newemail= $result['email'];
$newadresse = $result['adresse'];
$newgrade = $result['grade'];
$newdivision = $result['division'] ;
$newjourstot = $result['jourstot'];
$newjoursrest = $result['joursrest'];
?>
<form method="post" action="update.php ? id=<?php echo $result['id'] ?>" class="modify">
<p class="titre">Modifier le personnel</p>
            <label>CIN:</label>
            <input type="text" name="cin" id="cin" value=" <?= $newcin?> "/>
            <label>Nom:</label>
            <input type="text" name="nom" id="nom" value="<?= $newnom?>" />
            <label>Prénom:</label>
            <input type="text" name="prénom" id="prénom" value="<?= $newprénom?>"/>
            <br><br><label>Tél:</label>
            <input type="text" name="tel" id="tel" value="<?= $newtel?> "/>
            <label for="email" >Email:</label>
            <input type="email" id="email" name="email" value="<?= $newemail?>" />
         	<label>Adresse :</label>
            <input type="text" name="adresse" id="adresse" value="<?= $newadresse ?>" />
            <br><br><label>Grade:</label>
            <input type="text" name="grade" id="grade" value="<?= $newgrade ?>"/>
            <label>Division:</label>
            <input type="text" name="division" id="division" value="<?= $newdivision ?>"/>
         	<br><br><label>Nombre des Jours Total</label>
            <input type="number" id="jourstot" name="jourstot" max="30" min="0" value="<?= $newjourstot ?>"/>
         	<label>Nombre des Jours Restant</label>
             <input type="number" name="joursrest" id="joursrest" max="30" min="0" value="<?= $newjoursrest ?>" />
    </br></br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
    <button class="btn btn-primary" name="modifier">Modifier</button>
    </form>
    <?php endforeach ?>