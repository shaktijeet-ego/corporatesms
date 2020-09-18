<?php
session_start();

require_once 'root.php';
require_once 'password_hashing.php';
require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();
// User id Global Variable
$user_id = NULL;
require_once 'oauth.php';
function verify_parameters($required_data, $request_parameters)
{
    $error      = false;
    $info_error = "";
    foreach ($required_data as $req_data) {
        if (!isset($request_parameters->$req_data) || strlen(trim($request_parameters->$req_data)) <= 0) {
            $error = true;
            $info_error .= $req_data . ', ';
        }
    }
    if ($error) {
        $response            = array();
        $app                 = \Slim\Slim::getInstance();
        $response["status"]  = "Failed";
        $response["message"] = 'Required Fields ' . substr($info_error, 0, -2) . ' are empty';
        response_out(200, $response);
        $app->stop();
    }
}

function verify_newpassword($oldpassword, $newpassword, $confirmpassword){
    //check old password

    $db = new dataRoot();
    $user = $db->getOneRecord("SELECT * FROM user_data WHERE user_id=".$_SESSION["user_id"]);
    $user = (object) $user;
    if(!password_verify($oldpassword, $user->user_password)){
        $app                 = \Slim\Slim::getInstance();
        $response["status"]  = "error";
        $response["message"] = 'Please enter correct current Password ';
        response_out(200, $response);
        $app->stop();
    }
    if(trim($newpassword) !== trim($confirmpassword)){
        $app                 = \Slim\Slim::getInstance();
        $response["status"]  = "error";
        $response["message"] = 'Confirm password does not match to new password';
        response_out(200, $response);
        $app->stop();
    }
}

function response_out($status_code, $response)
{
    $app = \Slim\Slim::getInstance();
    $app->status($status_code);
    $app->contentType('application/json');
    echo json_encode($response);
}


$app->run();
?>
