<?php
session_start();
include 'config.php';
$con = mysqli_connect($host, $userName, $userPassword);
$db = mysqli_select_db($con, $dataBaseName);

class ReturnData
{
    public $sent;
}

$send = new ReturnData();
$send->sent = false;

$title = $_REQUEST['title'];
$content = $_REQUEST['content'];

$sql = "INSERT INTO `todo`(`user_id`,`title`, `content`, `time`) VALUES ('" . $_SESSION["user_id"] . "', '" . $title . "' , '" . $content . "',CURRENT_TIMESTAMP);";

if (mysqli_query($con, $sql)) {
    $send->sent = true;
} else {
    $returnData->errorDump = "Errors in the INSERT query: ";
    $send->sent = false;
}
echo json_encode($send);
