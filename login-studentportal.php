<!DOCTYPE html>
<html>
<head>
	<title>validation</title>

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
			left: 45%;
			top: 20%;
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



<script type="text/javascript">
		
	function validate(){
		var email = document.getElementById("email");
		var password = document.getElementById("pass");

		if(email.value.trim()=="" || password.value.trim()==""){
			alert("No blank values allowed");
			return false;
		} else{
				return true;
		  }
	}

</script>

<?php
include ("config.php");
error_reporting(0);


if(isset($_POST['login'])){

	$email = $_POST['email'];
	$password = $_POST['pass'];

	$sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' && password='$password' && verified is not null");	

		if(mysqli_num_rows($sql)>0){
			$sql1=(mysqli_query($conn, "INSERT INTO login(email, password) VALUES('$email', '$password')"));
			header("location:studentportal.php");
		} else{
			echo '<script>alert("This is not a verified email account...")</script>';
		}
}



if(isset($_POST['reg'])){
		header("location:registration.php");
}

?>


</head>

	<div class="header">
  <img id="img1" src="logo\iitlogo.png" height="5%">
  <img id="img2" src="logo\dulogo.jpg" height="5%">
	</div>


<body>
<h3>Login Form</h3>

<div class="wraper">
	<form action="" method="post" class="container">

		<div class="imgcontainer">
			<input type="text" name="email" id="email" placeholder="Registered email address"/><br>
			<input type="password" name="pass" id="pass" placeholder="password"/><br>
			<input type="checkbox" checked="checked" name="remember"> Remember me
		</div>
		<div>
			<input type="submit" name="login" class="loginbtn" onclick="validate()" value="Login">
			<input type="submit" name="reg" class="regbtn" value="Registration">
			<input type="button" name="cancel" class="cancelbtn" value="Cancel" onClick="history.go(-1);">
		    <span class="psw">Forgot <a href="#">password?</a></span>
		</div>

	</form>
</div>

</body>
</htm>





