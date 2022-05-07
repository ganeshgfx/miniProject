<?php
include 'config.php';
$con = mysqli_connect($host, $userName, $userPassword);
$db = mysqli_select_db($con, $dataBaseName);

class ReturnData
{
    public $loggedIn;
}

$send = new ReturnData();
$send->loggedIn = false;

$user_id = $_REQUEST['user_id'];
$password = $_REQUEST['password'];

$sql = "SELECT * FROM user WHERE user_id = '$user_id' AND password = '$password';";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);

if ($count == 1) {
    $send->loggedIn = true;
    $_SESSION["user_id"] = $user_id;
} else {
}
echo json_encode($send);
