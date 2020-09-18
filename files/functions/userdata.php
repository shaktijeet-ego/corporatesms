<?php
 include ('db_connection.php');

 $output=array();


 //$query="SELECT * FROM smssave ORDER BY datestamp DESC";

 $query="SELECT user_id,user_name, role from user_data where role='user'";
 $result=mysqli_query($conn,$query);

 if (mysqli_num_rows($result)>0) {
   while($row=mysqli_fetch_array($result)){
     $output[]=array("id"=>$row['user_id'],"name"=>$row['user_name'],"role"=>$row['role']);
   }
   echo json_encode($output);
 }
  ?>
