<?php
session_start();
$is_admin = true;
if(!isset($_SESSION) || $_SESSION['role'] != 'admin'){
 $is_admin = false;
}

include "db_connection.php";
$data=json_decode(file_get_contents("php://input"));
$message = '';
if($is_admin){
 $id=$data->id;
 $query="DELETE FROM message_received WHERE message_id=".$id;
 $statement = $conn->prepare($query);
	if($statement->execute())
	{
		$output['message'] = 'Data Deleted';
	}

echo json_encode($output);

}

 ?>
