<?php
 include ('db_connection.php');

 $output=array();
 $where = " WHERE 1=1 ";
 $group_by = "Group by sent_to";
 if(isset($_GET["number"]) && !empty($_GET["number"])){
     $where .= " AND sent_to = '{$_GET['number']})'";
     $group_by = '';
 }



 //$query="SELECT * FROM smssave ORDER BY datestamp DESC";

 $query="SELECT * from message_sent $where $group_by";
 $result=mysqli_query($conn,$query);

 if (mysqli_num_rows($result)>0) {
   while($row=mysqli_fetch_array($result)){
     $output[]=array("id"=>$row['sent_id'],"name"=>$row['sent_to'],"datesent"=>$row['date_sent'],"message"=>$row['message'],"date"=>$row['sent_date']);
   }
   echo json_encode($output);
 }
  ?>
