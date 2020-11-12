<?php
 require 'config.php' ;
 if(isset($_POST['modifier'])){
    $id = $_GET['id'];
    $newcin=$_POST['cin'] ; 
    $newnom = $_POST['nom'] ;
    $newprénom = $_POST['prénom'] ;
    $newtel = $_POST['tel'] ;  
    $newemail= $_POST['email'];
    $newadresse = $_POST['adresse'];
    $newgrade = $_POST['grade'];
    $newdivision = $_POST['division'] ;
    $newjourstot = $_POST['jourstot'];
    $newjoursrest = $_POST['joursrest'];
    $qry = "UPDATE personnel SET cin= '".$newcin."',nom='".$newnom."', prénom='".$newprénom."' ,grade='".$newgrade."' ,division='".$newdivision."', tel='".$newtel."', adresse='".$newadresse."' , jourstot= '".$newjourstot."' , joursrest='".$newjoursrest."' , email='".$newemail."' WHERE id='".$id."' ";
    $exec = mysqli_query($conn, $qry);
    echo "ok" ;
    if($exec){
        header("location:liste_perso.php") ;
    }
}

?>