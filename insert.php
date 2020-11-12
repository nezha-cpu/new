<?php  
 $connect = mysqli_connect("localhost", "root", "", "");  
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = ''; 
      $cin = mysqli_real_escape_string($connect, $_POST["cin"]); 
      $prénom = mysqli_real_escape_string($connect, $_POST["prénom"]);
      $nom = mysqli_real_escape_string($connect, $_POST["nom"]); 
      $email = mysqli_real_escape_string($connect, $_POST["email"]);  
      $adresse = mysqli_real_escape_string($connect, $_POST["adresse"]);  
      $tel = mysqli_real_escape_string($connect, $_POST["tel"]);  
      $grade = mysqli_real_escape_string($connect, $_POST["grade"]);  
      $division = mysqli_real_escape_string($connect, $_POST["division"]);
      $jourstot = mysqli_real_escape_string($connect, $_POST["jourstot"]);
      $joursrest = mysqli_real_escape_string($connect, $_POST["joursrest"]);  
      if($_POST["id"] != '')  
      {  
           $query = "  
           UPDATE personnel   
           SET nom='$nom',
           cin='$cin',
           prénom='$prénom',
           email='$email',   
           adresse='$adresse',   
           tel='$tel',   
           grade = '$grade',   
           division = '$division' 
           jourstot='$jourstot',
           joursrest='$joursrest',  
           WHERE id='".$_POST["id"]."'";  
           $message = 'Data Updated';  
      }  
      else  
      {  
           $query = "  
           INSERT INTO personnel(cin , prénom , nom, email, adresse, tel, grade, division , jourstot , joursrest)  
           VALUES('$cin' ,'$prénom' , '$nom', '$adresse', '$tel', '$grade', '$division' , '$jourstot' , '$joursrest' );  
           ";  
           $message = 'Data Inserted';  
      }  
      /*if(mysqli_query($connect, $query))  
      {  
           $output .= '<label class="text-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM personnel ORDER BY id DESC";  
           $result = mysqli_query($connect, $select_query);  
           $output .= '  
                <table class="table table-bordered">  
                     <tr>  
                          <th width="70%">Employee Name</th>  
                          <th width="15%">Edit</th>  
                          <th width="15%">View</th>  
                     </tr>  
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>' . $row["nom"] . '</td>  
                          <td><input type="button" name="edit" value="Edit" id="'.$row["id"] .'" class="btn btn-info btn-xs edit_data" /></td>  
                          <td><input type="button" name="view" value="view" id="' . $row["id"] . '" class="btn btn-info btn-xs view_data" /></td>  
                     </tr>  
                ';  
           }  
           $output .= '</table>';  
      } */ 
      echo $output;  
 }  
 ?>