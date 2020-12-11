<?php
include("config.php");
error_reporting(0);

$reg_no = $_GET['reg_no'];

if($reg_no){

	$query = "DELETE FROM students WHERE reg_no='$reg_no'";

	$data = mysqli_query($conn, $query);
	if($data){
		echo "<font color='green'>Record deleted...";
	} else{
		echo "<font color='red'>Record failed to delete...";
	}
}


$email = $_POST['email'];
if($email){
	$query = "DELETE FROM users WHERE email='$email'";
	$data = mysqli_query($conn, $query);
	if($data){
		echo "<font color='green'>Record deleted...";
	} else{
		echo "<font color='red'>Record failed to delete...";
	}
}

header("location: dashboard.php");

?>