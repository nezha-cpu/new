<?php
try{
    $pdo=new PDO("mysql:host=localhost;dbname=congé" , "root" , "");
}
catch(PDOException $e){
    echo $e->getMessage();
}
?> 