<?php
session_start();

require 'liste_perso.php ';
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $query = "DELETE FROM `personnel` WHERE id = $id  ";
    $res = mysqli_query($conn, $query);
}
?>