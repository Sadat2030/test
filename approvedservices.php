
<!DOCTYPE html>
<html>
<head>
	
<link rel="stylesheet" type="text/css" href="print.css" media="print">

<style type="text/css">
	img {
  		width: 6%;
  		height: auto;
		}
	.header {
  		overflow: hidden;
  		background-color: #f1f1f1;
  		padding: 5px 5px;
	}
</style>


</head>

	<div class="header">
		<img src="logo\iitlogo.png" height="5%">
	</div>


<body>
	<form action="" method="GET">
		<input type="text" name="email" placeholder="Your Email" required><br>
		<input type="password" name="password" placeholder="password" required><br><br>
		<input type="submit" name="Ok" value="Ok">
		<INPUT TYPE="button" VALUE="Back" onClick="history.go(-1);"><br><br>
	</form>

</body>
<font color='green'><a href='login-studentportal.php'>Back to student portal</a>
</html>

<?php
include ("config.php");
error_reporting(0);

if(isset($_GET['Ok'])){

	$email = $_GET['email'];
	$password = $_GET['password'];
	$sql = mysqli_query($conn,"SELECT * from users WHERE email='$email' && password='$password'");
	
	if(mysqli_num_rows($sql)==0){
		echo '<script>alert("This is not a valid email and/or password...")</script>';
	}

	if(mysqli_num_rows($sql)>0){
		echo '<script>alert("valid email")</script>';
		$data = mysqli_query($conn,"SELECT * FROM service_app_view WHERE email = '$email'");

		while($result = mysqli_fetch_assoc($data)){

			echo 
			"<tr>
				<td>".$result['reg_no']."</td>
				<td>".$result['session']."</td>
				<td>".$result['student_nm']."</td>
				<td>".$result['rqst_doc']."</td>
				<td>".$result['rqst_excute_dt']."<td>
				<td>".$result['hall']."<td>
				<td>".$result['dept']."<td>

				<td><a href='testimonial.php?
						reg_no=$result[reg_no]&session=$result[session]&student_nm=$result[student_nm]&rqst_doc=$result[rqst_doc]&
						rqst_excute_dt=$result[rqst_excute_dt]&hall=$result[hall]&dept=$result[dept]'>Download</a></td>
				<br>
			</tr>";
		}
	}
}?>			


