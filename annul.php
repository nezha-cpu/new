<?php
session_start();

require 'new_histo.php ';
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $query = "DELETE dmd.* , type.* FROM dmd INNER JOIN type ON type.cin=dmd.cin
            WHERE dmd.id= $id ";
    $res = mysqli_query($conn, $query);
}
?>