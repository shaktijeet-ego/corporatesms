<?php
session_start();
$is_admin = true;
if(!isset($_SESSION) || $_SESSION['role'] != 'admin'){
 $is_admin = false;
}

include "db_connection.php";
$data=json_decode(file_get_contents("php://input"));
if($is_admin){
 $id=$data->id;
 $query="DELETE FROM user_data WHERE user_id=".$id;

 $conn->query($query);

}

 ?>
