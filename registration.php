
<!DOCTYPE html>
<html>
<head>

<style>
		body {
			 margin: 0;
			 padding: 1em 0;
			 color: #fff;
			 background: #0080d2;
			 font-family: Georgia, Times New Roman, serif;
		}

		form{background-color: rgb(31,240,163);
		  border-radius: 5px;

		}

		input[type=text], input[type=password] {
		  width: 100%;
		  padding: 12px 20px;
		  margin: 8px 0;
		  display: inline-block;
		  border: 1px solid #ccc;
		  box-sizing: border-box;
		}

		button:hover {opacity: 0.8;}

		.cancelbtn, .loginbtn, .regbtn {
		  width: auto;
		  height: 100%;
		  padding: 10px 18px;
		  border-radius: 5px;
		  color: white;
		  cursor: pointer;
		}

		.cancelbtn {background-color: #f44336;}
		.regbtn, .loginbtn{background-color: green;}
		.container {padding: 16px;}

		.wraper{
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			max-width: 300%;
			background: #fff;
			padding: 25px;
			border-radius: 5%;
			box-shadow: 4px 4px 2px rgb(254, 236, 165,1)
		} 

		.wraper #btn{
			background-color: yellow;
		}
		h3{
			position: absolute;
			left: 40%;
			top: 10%;
		}

		#img1 {
			 position: absolute;
			width: 8%;
			height: auto;
		      left: 90%;
		      padding: 20px 5px;
		}
		#img2 {
			width: 5%;
			height: auto;
			left: 5%;
		}



		.header{
  		overflow: hidden;
  		background-color: #f1f1f1;
  		padding: 5px 5px;
		}


</style>

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

<?php
include ("config.php");
error_reporting(0);

if(isset($_POST['reg'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$mobile = $_POST['mobile'];
		$password = $_POST['password'];
		$cpassword = $_POST['cpassword'];

		$mt_err = array();
		if($name == NULL){
			$mt_err['name'] = "First name is missing";
		}
		if($email==NULL){
			$mt_err['email'] = "Email is missing";
		}
		if($mobile == NULL){
			$mt_err['mobile'] = "Mobile is missing";
		}
		if($password == NULL){
			$mt_err['password'] = "Password is missing";
		}elseif(strlen($password)<=2){
			$mt_err['password'] = "Password should at least 3 characters";
		}

		if($password != $cpassword){
			$mt_err['password'] = "passwords mitchmatch!";
		}

		//Check whether a valid student.
		$ck_student = mysqli_query($conn, "SELECT * FROM students where email='$email' ");
		if(mysqli_num_rows($ck_student)==0){
			echo "<font color='red'>You are no longer a student.<a href='login-studentportal.php'>Click here and go back...</a>";
		}

		//check all field entered
		if(count($mt_err)!=0){
			echo "<font color='red'>All fields are required.<a href='login-studentportal.php'>Click here and go back...</a>";

			 
		}

		// if not register before, update users table 
		if(count($mt_err)==0){
			$sql = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");
			if(mysqli_num_rows($sql)>0){
				echo '<script>alert("This email already been registered ...")</script>';
			}else if (mysqli_num_rows($ck_student)>0){
				$sql1=mysqli_query($conn,"INSERT INTO users(name,email,mobile,password) VALUES('$name','$email','$mobile','$password')");
				echo '<script>alert("Registration has been succeeded. Your email account will be active in 24 hours, please wait for that...")</script>';
			}
		} 
}

if(isset($_POST['login'])){
		header("location:login-studentportal.php");
}

?>

</head>

<div class="header">
	  <img id="img1" src="logo\iitlogo.png" height="5%">
  	  <img id="img2" src="logo\dulogo.jpg" height="5%">
</div>

<body>
<h3>Registration Form</h3>
<div class="wraper">
<form action="" method="post" class="container" onsubmit="checkforblank()">

  <div class="imgcontainer">
  </div id="text">
		<div>
			<input type="text" placeholder="Your Name" name="name">
		    <input type="text" placeholder="Your registered email" name="email">
		    <input type="text" placeholder="You Mobile No." name="mobile">
		    <input type="password" placeholder="Enter Password" name="password"><br>
		    <input type="password" placeholder="Confirm Password" name="cpassword"><br>
		</div>

		<div id="btn">
			<input type="submit" name="reg" class="regbtn" value="Register">
			<input type="submit" name="login" class="loginbtn" value="Login">
			<input type="button" name="cancel" class="cancelbtn" value="Cancel" onClick="window.close();">

			

		</div>
</form> 
</div>


</body>
</html>
<font color='green'><a href='login-studentportal.php'>Back to student portal</a>