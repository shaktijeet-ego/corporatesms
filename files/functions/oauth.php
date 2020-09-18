<?php
$app->get('/session', function()
{
    $data_base              = new dataRoot();
    $session                = $data_base->getSession();
    $response["user_id"]    = $session['user_id'];
    $response["user_email"] = $session['user_email'];
    $response["user_name"]  = $session['user_name'];
    response_out(200, $session);
});

$app->post('/changepassword', function() use ($app)
{
    require_once 'password_hashing.php';
    $data_result = json_decode($app->request->getBody());
    $data_base = new dataRoot();
    $session = $data_base->getSession();
    verify_parameters(array(
        'oldpassword',
        'newpassword',
        'confirmpassword',
    ), $data_result->changepassword);
    verify_newpassword($data_result->changepassword->oldpassword, $data_result->changepassword->newpassword, $data_result->changepassword->confirmpassword);
    $update  = $data_base->updateByID('user_data','user_password', password_hashing::hash($data_result->changepassword->newpassword), 'user_id',$session['user_id']);
    if($update){
        $response['status']  = "success";
        $response['message'] = 'Successfully updated password';
    }else{
        $response['status']  = "Error";
        $response['message'] = 'Failed updating password';
    }
    response_out(200, $response);
});

$app->post('/login', function() use ($app)
{
    require_once 'password_hashing.php';
    $data_result = json_decode($app->request->getBody());
    verify_parameters(array(
        'user_email',
        'user_password'
    ), $data_result->customer);
    $response      = array();
    $data_base     = new dataRoot();
    $user_password = $data_result->customer->user_password;
    $user_email    = $data_result->customer->user_email;
    $user          = $data_base->getOneRecord("select user_id, user_name, user_password, role , user_email, created from user_data where (user_phone='$user_email' or user_email='$user_email')");
    if ($user != NULL) {
        if (password_hashing::compare_password($user['user_password'], $user_password)) {
            $response['status']     = "success";
            $response['message']    = 'You have successfully logged in.';
            $response['user_name']  = $user['user_name'];
            $response['user_id']    = $user['user_id'];
            $response['user_email'] = $user['user_email'];
            $response['createdAt']  = $user['created'];
            $response['role']  = $user['role'];
            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['user_id']    = $user['user_id'];
            $_SESSION['user_email'] = $user_email;
            $_SESSION['user_name']  = $user['user_name'];
            $_SESSION['role']  = $user['role'];
        } else {
            $response['status']  = "error";
            $response['message'] = 'Login Failed Due to Incorrect Credentials...';
        }
    } else {
        $response['status']  = "error";
        $response['message'] = 'No such user exists..';
    }
    response_out(200, $response);
});
$app->post('/signUp', function() use ($app)
{

    $response    = array();
    $data_result = json_decode($app->request->getBody());
    $data_result->role = 'user';
    verify_parameters(array(
        'user_email',
        'user_name',
        'user_password'
    ), $data_result->customer);
    require_once 'password_hashing.php';
    $data_base     = new dataRoot();
    $user_phone    = trim($data_result->customer->user_phone);
    $user_name     = $data_result->customer->user_name;
    $user_email    = trim($data_result->customer->user_email);
    $user_address  = $data_result->customer->user_address;
    $user_password = $data_result->customer->user_password;
    if(empty($user_phone)){
        $response["status"]  = "error";
        $response["message"] = "please enter phone";
        response_out(201, $response);
    }

    if(empty($user_email)){
        $response["status"]  = "error";
        $response["message"] = "please enter email";
        response_out(201, $response);
    }


    $isUserExists  = $data_base->getOneRecord("select 1 from user_data where user_phone='$user_phone' or user_email='$user_email'");

    if (!$isUserExists) {
        $data_result->customer->user_password = password_hashing::hash($user_password);
        $tabble_name                          = "user_data";
        $column_names                         = array(
            'user_phone',
            'user_name',
            'user_email',
            'user_password',
            'user_address'
        );
        $result                               = $data_base->insertIntoTable($data_result->customer, $column_names, $tabble_name);
        if ($result != NULL) {
            $response["status"]  = "success";
            $response["message"] = "Your account has been created successfully...";
            $response["user_id"] = $result;
            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['user_id']    = $response["user_id"];
            $_SESSION['user_phone'] = $user_phone;
            $_SESSION['user_name']  = $user_name;
            $_SESSION['user_email'] = $user_email;
            $_SESSION['role'] = 'user';
            response_out(200, $response);
        } else {
            $response["status"]  = "error";
            $response["message"] = "Failed to create account. Please try again...";
            response_out(201, $response);
        }
    } else {
        $response["status"]  = "error";
        $response["message"] = "The email address or phone you have entered is already registered...";
        response_out(201, $response);
    }
});
$app->get('/logout', function()
{

    $data_base           = new dataRoot();
    $session             = $data_base->destroySession();
    $response["status"]  = "info";
    $response["message"] = "You have successfully logged out!";
    response_out(200, $response);
});


$app->post('/send',function()
{
  $data_base=new dataRoot();
  $response["status"]="info";
  $response["message"]="Message Sent";
}
);




function message_send($userMobile,$userPhone){
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
      $userMobile=mysqli_real_escape_string($conn,$postdata->userMobile);
  $userMessage=mysqli_real_escape_string($conn,$postdata->userMessage);
  $query="INSERT INTO message_sent(sent_to,message) VALUES('".$userMobile."'.,'".$userMessage."');";
  if(mysqli_query($conn,$query)){
    $data["message"]="Data Inserted..";
  echo $output;
  }

}


?>
