<?php
include 'db_connection.php';
require __DIR__.'/vendor/autoload.php';

  //twilio
  $postdata=file_get_contents("php://input");
 $request=json_decode($postdata);
 $userMobile=$request->userMobile;
 $userMessage=$request->userMessage;
  $sid='AC81b0d283b78f5080d970710ad3c174bb';
  $token='d9a6927f1e224e35f85a52611df515e0';
  $client=new Twilio\Rest\Client($sid,$token);
  $message=$client->messages->create($userMobile,
    array(

      'from'=>'+12406164512',
      'body'=>$userMessage,

    )
  );
  if($message->sid){
    echo "Message Sent";}
    $userMobile=mysqli_real_escape_string($conn,$request->userMobile);
$userMessage=mysqli_real_escape_string($conn,$request->userMessage);
$query="INSERT INTO message_sent(sent_to,message) VALUES('$userMobile','$userMessage');";
if(mysqli_query($conn,$query)){
  $data["message"]="Data Inserted..";

}



?>


<!--<?php



$conn = new mysqli($servername, $username, $password,$dbname);



$form_data=file_get_contents("php://input");
  $request=json_decode($form_data);
  $userMobile=$request->userMobile;
  $userMessage=$request->userMessage;
  echo $userMobile;
  echo$userMessage;

$url = "https://semysms.net/api/3/sms.php"; //Url address for sending SMS
$device = '124194';  //  Device code
 $token = 'fb6ab2ee173df5da883a952246b5671e';  //  Your token (secret)
  $data=array(
    "userMobile"=>$userMobile,
    "userMessage"=>$userMessage,
        "device" => $device,
        "token" => $token
  );

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    $output = curl_exec($curl);
    curl_close($curl);


    $userMobile=mysqli_real_escape_string($conn,$request->userMobile);
$userMessage=mysqli_real_escape_string($conn,$request->userMessage);
$query="INSERT INTO smssave(phone_num,message) VALUES('$userMobile','$userMessage')";
if(mysqli_query($conn,$query)){
  $data["message"]="Data Inserted..";
echo $output;
}

  //echo json_encode($data);
?>-->
  <!--$url = "https://semysms.net/api/3/sms.php"; //Url address for sending SMS
 //$phone = '+7920123xxxx'; // Phone number
 if(isset($_POST['submitButton']))
 {
 $textMessage=$_POST["userMessage"];
 $mobileNumber=$_POST["userMobile"];
 $apiKey = urlencode('fb6ab2ee173df5da883a952246b5671e');

    // Message details
    $numbers = array($mobileNumber);
    $sender = urlencode('TXTLCL');
    $message = rawurlencode($textMessage);
    $numbers = implode(',', $numbers);
    // Prepare data for POST request
    $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
    // Send the POST request with cURL
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    // Process your response here
    echo $response;
 }
 ?>-->
