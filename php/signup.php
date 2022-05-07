<?php
include 'config.php';
$con = mysqli_connect($host, $userName, $userPassword);
$db = mysqli_select_db($con, $dataBaseName);

class ReturnData
{
    public $alreadyExist;
    public $created;
}

$send = new ReturnData();
$send->alreadyExist = true;
$send->created = false;

$user_id = $_REQUEST['user_id'];
$password = $_REQUEST['password'];

$sql = "select * from user where user_id = '$user_id';";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);

if ($count == 0) {
    $send->alreadyExist = false;


    $sql = "INSERT INTO `user`( `user_id`, `password`) VALUES ('" . $user_id . "','" . $password . "');";

    if (mysqli_query($con, $sql)) {
        $send->created = true;
        $_SESSION["user_id"] = $user_id;
    } else {
        $returnData->errorDump = "Errors in the INSERT query: ";
        $send->created = false;
    }
} else {
    $send->alreadyExist = true;
    $send->created = false;
}
echo json_encode($send);
