<?php
include 'header.php';
include 'files/functions/db_connection.php';
?>
<div class="dashboard">
<div class="col-xs-12 stats-bordered">

  <div class="dashboardDesign col-xs-4">
    <?php echo "<div class='stats'><h3>Date</h3><span class=date>".date("Y/m/d")."</span></div>";?>
</div>

 <div class="dashboardDesign col-xs-4">
 <?php
  // Check connection
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  }
  //$sql = "SELECT phone_num, message, datestamp FROM smssave";
$sql="SELECT count(*) as total from message_received";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
   // output data of each rowspan
   while($row = $result->fetch_assoc()) {
    echo  "<div class='stats'><h3>Total Messages</h3>".$row["total"]."</div>" ;
}

} else { echo "0 results"; }

?>
</div>


<!---users-->
<div class="dashboardDesign col-xs-4">
<?php
 // Check connection
 if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
 }
 //$sql = "SELECT phone_num, message, datestamp FROM smssave";
$sql="SELECT role,count(role) as role from user_data where role='user'";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
  // output data of each rowspan
  while($row = $result->fetch_assoc()) {
   echo  "<div class='stats'><h3>Total registered Users</h3>".$row["role"]."</div>" ;
}

} else { echo "0 results"; }

?>
</div>





<!--Total count of Messages saved in database on the basis of numbers-->

<div class="dashboardDesign col-xs-4">
<?php
 // Check connection
 if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
 }
 //$sql = "SELECT phone_num, message, datestamp FROM smssave";
$sql="SELECT received_msg,COUNT(received_msg)as received from message_received WHERE received_date = CURDATE()";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
  // output data of each rowspan
  while($row = $result->fetch_assoc()) {
   echo  "<div class='stats'><h3>Messages Today</h3>".$row["received"]."</div>" ;
}

} else { echo "0 results"; }

?>
</div>

</div>

<!--Total count of Messages saved in database on the basis of numbers-->

<div class='tableDesign table table-striped  '>
  <table class='table table-bordered'>

  <tr>
                         <th>Phone Number</th>
                         <th>Number of Messages</th>
                    </tr>
<?php
 // Check connection
 //$sql = "SELECT phone_num, message, datestamp FROM smssave";
$sql3="SELECT received_from, COUNT(received_from) as total FROM message_received
GROUP BY received_from
ORDER BY COUNT(received_from) DESC LIMIT 10;";
 $result3 = $conn->query($sql3);
 if ($result3->num_rows > 0) {
  // output data of each rowspan
  while($row = $result3->fetch_assoc()) {
   echo  "<tr><td>".$row["received_from"]."</td><td>".$row["total"]."</td><tr>" ;
}

} else { echo "0 results"; }

?>
</table>


<!--Display user data in table-->
<table class='table table-bordered test' ng-controller="tableController">
  <tr>
                        <th>Id</th>
                         <th>Username</th>
                         <th>Role</th>
                         <?php if($is_admin):?>


                         <th>Option</th>
                            <?php endif;?>
                    </tr>
<tr ng-repeat="x in usersdata">
  <td>{{x.id}}</td>
  <td>{{x.name}}</td>
  <td>{{x.role}}</td>

  <?php if($is_admin):?>
    <td><input type="button" class="btn btn-primary" value="Delete" ng-click="deleteUser(x.id);"></td>
  <?php endif;?>

</tr>
</div>
</table>












<!-- <div>
<table class='table table-bordered test'>

  <tr>
                         <th>Username</th>
                         <th>Role</th>
                         <th>Option</th>
                    </tr>
<?php
 // Check connection
 //$sql = "SELECT phone_num, message, datestamp FROM smssave";
$sql3="SELECT user_name, role FROM user_data
where role='user';";
 $result3 = $conn->query($sql3);
 if ($result3->num_rows > 0) {
  // output data of each rowspan
  while($row = $result3->fetch_assoc()) {
   echo  "<tr><td>".$row["user_name"]."</td><td>".$row["role"]."</td><td><tr>" ;
}

} else { echo "0 results"; }

?>
</table>
</div> -->


<!----Number of registered users normal--->




</div>

</div>


<!--PHP code for delete-->




<!--
<h1>Dashboard</h1>




<div>
  <div class="dashboardDesign" ng-show="x in names">
    <p class="stats">
      <span>Name:</span> <?php echo $result; ?>
    </p>
  </div>
  <div class="dashboardDesign">
    <p class="stats"></p>
  </div>
</div>

<div class="piechart" google-chart chart="chart" style="{{chart.cssStyle}}" on-ready="chartReady()">
</div>



results=(names | filter:isQuestionInRange.length) -->
