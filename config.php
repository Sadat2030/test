<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "Assignment107";

$conn = mysqli_connect($host, $user, $pass, $db);

if($conn){
	//echo "Connection OK";
}
else{
	die("Connection failed because ".mysqli_connect_error());
}
?>