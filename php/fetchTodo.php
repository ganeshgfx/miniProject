<?php
session_start();
include 'config.php';
$con = mysqli_connect($host, $userName, $userPassword);
$db = mysqli_select_db($con, $dataBaseName);

class ReturnData
{
    public $sent;
}
