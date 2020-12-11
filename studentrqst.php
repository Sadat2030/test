<?php
	include ("config.php");
	error_reporting(0);

	$_GET['reg_no'];
	$_GET['rqst_doc'];
	$_GET['description'];
	$_GET['email'];
?>

<html>
<head>
	<title>Student Request</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	<style type="text/css">

		body {font-family: Arial, Helvetica, sans-serif;}

		form{
				background-color: rgb();
				border-radius: 5px;
			}

		input[type=text], input[type=password], select[type=text], textarea[type=text] {
				 
				  width: 60%;
				  padding: 2px 2px;
				  margin: 8px 0;
				  display: inline-block;
				  border: 1px solid #ccc;
				  box-sizing: border-box;
				
			}

		.wraper{
					position: absolute;
					top: 50%;
					left: 50%;
					transform: translate(-60%, -50%);
					background: rgb(184,248,186);
					padding: 20px;
					border-radius: 5%;
					box-shadow: 4px 4px 2px rgb(254, 236, 165,1)
				}
		h3{
					position: absolute;
					left: 27%;
					top: 0%;
					color: green;
					text-align: center;
				}

		.submitbtn {background-color: yellow;}
		.backbtn{background-color: #f44336;}
		.container {padding: 26px;
					width: 650px;
				}
				.text{
					padding-left: 60px;
				}

		img {
  				width: 6%;
  				height: auto;

		}
		.header{
  				overflow: hidden;
  				background-color: #f1f1f1;
  				padding: 5px 5px;
		}



	</style>



</head>
<div class="header">
	<img src="logo\iitlogo.png" height="5%">
	<h3>Student Request Submission Form</h3>
</div>
<body>
	<div class="wraper">
		<form class="container" action="" method="GET">
			
			<div class="text">
			<input type="text" name="reg_no" value="" placeholder="Registration no."><br>
			<input type="text" name="email" value="" placeholder="Email"><br>
				<select type="text" name="rqst_doc">
					<option></option>
					<option>Testimonial</option>
					<option>Certificate</option>
					<option>Marksheet</option>
				</select><br>
						<input type="text" name="bdt" placeholder="Deposite amount">
						<input type="text" name="slip_no" placeholder="Slip number">
						Date: <input type="date" name="slip_dt" placeholder="Slip date">
						<textarea type="text" rows="5" cols="60" name="description" placeholder="Descrip your request"></textarea><br>
			
			<input type="submit" class="submitbtn" name="submit" value="Submit">
			<INPUT TYPE="button" VALUE="Back" class="backbtn" onClick="history.go(-1);">
			</div>
		</form>
	</div>

<script type="text/javascript" src="js/bootstra.min.js"></script>
</body>
<font color='blue'><a href='login-studentportal.php'>Back to dashboard</a>
</html>

<?php
	if($_GET['submit']){
		$reg_no = $_GET['reg_no'];
		$rqst_doc = $_GET['rqst_doc'];
		$description = $_GET['description'];
		$email = $_GET['email'];
		$bdt = $_GET['bdt'];
		$slip_no = $_GET['slip_no'];
		$slip_dt = $_GET['slip_dt'];

//check student profile in the students table
		$sql1 = mysqli_query($conn, "SELECT * FROM users_students_view WHERE reg_no='$reg_no' && email='$email'");
		if(mysqli_num_rows($sql1)==0){
			
			exit('<script>alert("Invalid registration no and/or email accunt... ")</script>');
		}
		elseif(verified == NULL){
			exit('<script>alert("Your mobile yet to be verified... ")</script>');
		}

//check previous request, if exist new data can not be entered.
		$sql2 = mysqli_query($conn,"SELECT * FROM service_rqst WHERE reg_no='$reg_no' && rqst_doc='$rqst_doc'");

		if(mysqli_num_rows($sql2)>0){
				exit('<script>alert("This request exist ")</script>');
		}


		else
			{
				$sql3=mysqli_query($conn,"INSERT INTO service_rqst(reg_no, rqst_doc, description,email,bdt,slip_no,slip_dt) VALUES('$reg_no', '$rqst_doc', '$description', '$email',$bdt,'$slip_no','$slip_dt')");
					echo '<script>alert("One request Submitted")</script>';
					unset($_SESSION['success']);
			}
	}
	?>
