<?php

	include ("config.php");
	error_reporting(0);

		$reg_no = $_GET['reg_no'];
		$session = $_GET['session'];
		$student_nm = $_GET['student_nm'];
		$hall = $_GET['hall'];
		$dept = $_GET['dept'];
		$dob = $_GET['dob'];
		$gender = $_GET['gender'];
		$email = $_GET['email'];
		$mobile = $_GET['mobile'];
		$nid = $_GET['nid'];

	// New record entry - student information
	if(isset($_GET['submit'])){
		$sql = mysqli_query($conn,"SELECT * FROM students WHERE reg_no='$reg_no' OR email='$email' OR mobile='$mobile'");
		if(mysqli_num_rows($sql)>0){
				echo '<script>alert("Exist registration no./email account/mobile no.")</script>';
		}else{
				$sql1=mysqli_query($conn,"INSERT INTO students(reg_no, session,student_nm,hall,dept,dob,gender,email,mobile,nid) VALUES('$reg_no','$session','$student_nm','$hall','$dept','$dob','$gender','$email','$mobile','$nid')");
					//echo '<script>alert("Submitted one student")</script>';


					echo "<font color='green'> Record entry successfuly.<a href='students.php'>Check here to refresh</a> ";
					//unset($_SESSION['success']);
			
			}
	}

	// Update/edit student records
	if(isset($_GET['update'])){
		$query = "UPDATE students SET reg_no='$reg_no',session='$session',student_nm='$student_nm',hall='$hall',dept='$dept',dob='$dob',gender='$gender',email='$email',mobile='$mobile',nid='$nid'  WHERE reg_no='$reg_no' ";

		$data = mysqli_query($conn, $query);
		if($data){
			echo "<font color='green'> Record updated successfuly.<a href='students.php'>Check Updated List Here</a> ";
		}
		else{
			echo "<font color='red'>Record not updated.<a href='students.php'>Check Updated List Here</a>";
		}
	}

	// Go to service request approval form
	if(isset($_GET['Service'])){

		header("location: updateservice.php");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Student Entry Form</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">


<style type="text/css">

	body {
			 margin: 0;
			 padding: 1em 0;
			 color: blue;
			 background: #0080d2;
			 font-family: Georgia, Times New Roman, serif;
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

</head>

<div class="header">
  <img id="img1" src="logo\iitlogo.png" height="5%">
  <img id="img2" src="logo\dulogo.jpg" height="5%">
</div>

<body>
	<div class="container">
		<form action="#" method="GET" class="offset-md-3 col-md-6">

		<h4>Studet Entry</h4>
	
			<div class="row">
				<div class="col-md-6">
					<input type="text" name="reg_no" value="<?php echo $_GET['reg_no']?>" placeholder="Reg. No." class="form-control">
				</div>
				<div class="col-md-6">
					<input type="text" name="session" value="<?php echo $_GET['session']?>" placeholder="Academic session" class="form-control">
				</div>
			</div>
					<input type="text" name="student_nm" value="<?php echo $_GET['student_nm']?>" placeholder="Student Name" class="form-control">
					<input type="text" name="email" value="<?php echo $_GET['email']?>" placeholder="Your Email" class="form-control">

			<div class="row" >
				<div class="col-md-6">
					<select name="hall" value="<?php echo $_GET['hall']?>" class="form-control">
						 <option value="">hall</option>
						 <option value="Shahidullah">Shahidullah</option>
						 <option value="SM">SM</option>
						 <option value="Rokeya">Rokeya</option>
					</select>
				</div>

				<div class="col-md-6">
					<select name="dept" value="<?php echo $_GET['dept']?>" class="form-control">
						 <option value="">department</option>
						 <option value="IIT">IIT</option>
						 <option value="Physics">Physics</option>
						 <option value="Math">Math</option>
					</select>
				</div>	
			</div>

			<div class="row">
				<div class="col-md-6">
						<input type="date" name="dob" value="<?php echo $_GET['dob']?>" placeholder="Date of birth" class="form-control">
				</div>
				<div class="col-md-6">
					<select name="gender" value="<?php echo $_GET['gender']?>" class="form-control">
						<option value="">gender</option>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
						<option value="Other">Other</option>
					</select>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
						<input type="text" name="mobile" value="<?php echo $_GET['mobile']?>" placeholder="Your Mobile no." class="form-control">
				</div>
				<div class="col-md-6">
						<input type="text" name="nid" value="<?php echo $_GET['nid']?>" placeholder="NID" class="form-control"><br>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
						<input type="submit" name="submit" value="Submit" class="btn btn-success btn-lg btn-block">
				</div>				
				<div class="col-md-6">
						<input type="submit" name="update" value="Update" class="btn btn-success btn-lg btn-block">
				</div>
			</div>
		</form>
	</div>

		<table border="1" style="font-size:14px" class="container"> <br>
		<tr>
			<th>Reg No</th>
			<th>Session</th>
			<th>Student Name</td>
			<th>Hall</th>
			<th>Department</th>
			<th>Birth dt.</th>
			<th>Gender</th>
			<th>Email</th>
			<th>Mobile</th>
			<th>NID</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
<?php
		$sql2 = "SELECT * FROM students";
		$data1 = mysqli_query($conn,$sql2);

		while($result = mysqli_fetch_assoc($data1))
		{
			echo "<tr>
					<td>".$result['reg_no']."</td>
					<td>".$result['session']."</td>
					<td>".$result['student_nm']."</td>
					<td>".$result['hall']."</td>
					<td>".$result['dept']."</td>
					<td>".$result['dob']."</td>
					<td>".$result['gender']."</td>
					<td>".$result['email']."</td>
					<td>".$result['mobile']."</td>
					<td>".$result['nid']."</td>
					<td><a href='students.php?reg_no=$result[reg_no]&session=$result[session]&student_nm=$result[student_nm]&hall=$result[hall]&dept=$result[dept]&dob=$result[dob]&gender=$result[gender]&email=$result[email]&mobile=$result[mobile]&nid=$result[nid]'>Edit</a></td>

					<td><a href='delete.php?reg_no=$result[reg_no]' onclick='checkdelete()'>Delete</a></&td>
				</tr>";
		}
?>

		</table>

<script type="text/javascript" src="bootstra.min.js"></script>


</body>
</html>


<?php

	if(isset($_GET['Service'])){

		header('location:updateservice.php');
	}
?>
<font color='yellow'><a href='dashboard.php'>Back to dashboard</a>