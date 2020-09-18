Just for test purpose

<!-- <?php
include ('db_connection.php');

$output=array();
//$query="SELECT * FROM smssave";
$query="SELECT Count(phone_num)
FROM smssave;";
//$query="SELECT * FROM smssave;";
// $query2 .="SELECT COUNT(id) FROM smssave;";
 //$query3.="SELECT COUNT(phone_num) FROM smssave;";
$result=mysqli_query($conn,$query);
if (mysqli_num_rows($result)>0) {
while($row=mysqli_fetch_array($result))
{
echo $result;}
}
// //echo json_encode($output);
// }
// }

?>
 -->


<!-- <?php
 include ('db_connection.php');

 $output=array();
 $query="SELECT * FROM smssave;";
 // $query2 .="SELECT COUNT(id) FROM smssave;";
  //$query3.="SELECT COUNT(phone_num) FROM smssave;";

 if ($conn->multi_query($query))
 {
   $result=$conn->store_result();
   echo "Total record".$result->num_rows;
 }

  ?>

-->
