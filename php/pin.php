<?php
session_start();
include 'config.php';
$con = mysqli_connect($host, $userName, $userPassword);
$db = mysqli_select_db($con, $dataBaseName);


$todo_id = $_REQUEST['todo_id'];

if (isset($_SESSION['user_id'])) {

    $sql = "SELECT * from pins where todo_id = " . $todo_id . " AND user_id = '" . $_SESSION["user_id"] . "';";
    $results = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($results, MYSQLI_ASSOC);
    $count = mysqli_num_rows($results);

    echo $count;

    if ($count == 0) {

        $sql = "INSERT INTO `pins`( `todo_id`, `user_id`) VALUES (" . $todo_id . ",'" . $_SESSION["user_id"] . "');";
        mysqli_query($con, $sql);
    } else {
        $sql = "DELETE FROM `pins` WHERE `todo_id` = '" . $todo_id . "' AND `user_id` = '" . $_SESSION["user_id"] . "';";
        mysqli_query($con, $sql);
    }
}
