<?php

include_once "config2.php";

$db_server = $conn['host'];
$db_user = $conn['user'];
$db_pass = $conn['pass'];
$db_name = $conn['db'];


$host=mysqli_connect($db_server,$db_user,$db_pass,$db_name);

?>