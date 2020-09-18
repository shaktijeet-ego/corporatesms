
<div class="container">
  <form method="Post" action="reporttest.php">
    StartDate:<input type="date" name="startdate"><br>
    End Date:<input type="date" name="enddate"><br>
<input type="submit" class="btn btn-primary" name="export" value="Generate Report">
</form>
</div>
<?php
//export.php
$connect = mysqli_connect("localhost", "root", "", "corporatesms");
$output = '';
if(isset($_POST["export"]))
{
  $startdate=$_POST['startdate'];
  $enddate=$_POST['enddate'];
 //$query = "SELECT * FROM smssave";
 $query="SELECT * from message_received where received_date between '$startdate' and '$enddate' order by received_date";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">
                    <tr>
                         <th>id</th>
                         <th>message</th>
                         <th>phoneNumber</th>
       <th>Time</th>
       <th>Received date</th>

                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>
                         <td>'.$row["message_id"].'</td>
                         <td>'.$row["received_from"].'</td>
                         <td>'.$row["date_received"].'</td>
       <td>'.$row["received_msg"].'</td>
       <td>'.$row["received_date"].'</td>

                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
?>
