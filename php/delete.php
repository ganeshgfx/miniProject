<?php
session_start();
include 'config.php';
$con = mysqli_connect($host, $userName, $userPassword);
$db = mysqli_select_db($con, $dataBaseName);

class ReturnData
{
    public $deleted;
}

$send = new ReturnData();
$send->deleted = false;

$id = $_REQUEST['id'];

$sql = "DELETE FROM `todo` WHERE `todo_id` = " . $id . " AND `user_id` = '" . $_SESSION["user_id"] . "'";

if (mysqli_query($con, $sql)) {
    $send->deleted = true;
} else {
    $returnData->errorDump = "Errors in the INSERT query: ";
    $send->deleted = false;
}

echo json_encode($send);
