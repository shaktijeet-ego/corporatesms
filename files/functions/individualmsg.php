//Test Purpose

<!-- <?php
 include ('db_connection.php');

 $output=array();
 //$query="SELECT * FROM smssave ORDER BY datestamp DESC";

 $query="SELECT phone_num from smssave Group by phone_num WHERE phone_num=phone_num";
 $result=mysqli_query($conn,$query);

 if (mysqli_num_rows($result)>0) {
   while($row=mysqli_fetch_array($result)){
     $output[]=array("id"=>$row['id'],"name"=>$row['phone_num'],"message"=>$row['message'],"date"=>$row['datestamp']);
   }
   echo json_encode($output);
 }
  ?> -->
