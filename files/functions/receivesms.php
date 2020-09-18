<?php
// Get the PHP helper library from https://twilio.com/docs/libraries/php

include 'db_connection.php';
require_once 'vendor/autoload.php'; // Loads the library
use Twilio\Twiml;


$number=$_POST['From'];
$body=$_POST['Body'];

header('content-type:text/xml');

?>

<Response>
  <Message>
    Hello <?php echo $number;?>
    You said <?php echo $body;?>
  </Message>
</Response>


$response = new Twiml;
$response->message("The Robots are coming! Head for the hills!");
print $response;

$query="INSERT INTO message_received(received_from, received_msg,received_date) VALUES($userMobile,$msg,now())";
if(mysqli_query($conn,$query)){
$data["message"]="Data Inserted..";
echo $output;
}

?>
