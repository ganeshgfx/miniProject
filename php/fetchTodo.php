<?php
session_start();
include 'config.php';
$con = mysqli_connect($host, $userName, $userPassword);
$db = mysqli_select_db($con, $dataBaseName);

class Todo
{
    public $todo;
    public $pins;
}

$sql = 'SELECT * FROM todo';
$return = [];
if ($result = $mysqli->query($sql)) {
    while ($obj = $result->fetch_object()) {
        $temp = new Todo();
        $temp->todo = $obj;

        $sql = "select * from pins where todo_id = '$obj->todo_id';";
        $results = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($results, MYSQLI_ASSOC);
        $count = mysqli_num_rows($results);
        $temp->pins = $count;

        $return[] = $temp;
    }
}

echo json_encode($return);
