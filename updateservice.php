
<?php
	include ("config.php");
	error_reporting(0);

	if(isset($_GET['submit'])){
		$reg_no = $_GET['reg_no'];
		$session = $_GET['session'];
		$student_nm = $_GET['student_nm'];
		$rqst_doc = $_GET['rqst_doc'];
		$rqst_dt = $_GET['rqst_dt'];
		$rqst_excute = $_GET['rqst_excute'];
		$rqst_excute_dt = $_GET['rqst_excute_dt'];

		$query1 = "UPDATE service_rqst SET rqst_excute='$rqst_excute', rqst_excute_dt='$rqst_excute_dt'  WHERE reg_no='$reg_no' && rqst_doc='$rqst_doc'";
		$data1 = mysqli_query($conn, $query1);
		if($data1){
			echo "<font color='green'> one request approved.<a href='updateservice.php'>Check Updated List Here</a> ";
		}else{
			echo "request not found";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">

<style type="text/css">

body {
	margin: 0;
	padding: 1em 0;
	color: blue;
	background: rgb(192,192,192);
	font-family: Georgia, Times New Roman, serif;
}
	
#img1 {
	position: absolute;
	width: 8%;
	height: auto;
	left: 90%;
	padding: 6px 5px;
}
#img2 {
	width: 5%;
	height: auto;
	left: 5%;
}


}
.header{
	overflow: hidden;
	background-color: #f1f1f1;
	padding: 5px 5px;

}

h3{
	position: absolute;
	left: 35%;
	top: 0%;
	color: green;
	text-align: center;
}


</style>


</head>
<div class="header">
	<img id="img1" src="logo\iitlogo.png" height="5%">
  	<img id="img2" src="logo\dulogo.jpg" height="5%">
	<h3>Request Approval Form</h3>
</div>
<body>
	<br>

<form  action="" method="GET" class="offset-md-3 col-md-6">
	
		<input type="text" name="reg_no" value="<?php echo $_GET['reg_no']?>" placeholder="University Reg. No." class="form-control">
		<input type="text" name="student_nm" value="<?php echo $_GET['student_nm']?>" placeholder="Student Name" class="form-control">
		<input type="text" name="email" value="<?php echo $_GET['email']?>" placeholder="Email" class="form-control">

		<div class = "row">	
			<div class="col-md-6">
				<input type="text" name="rqst_doc" value="<?php echo $_GET['rqst_doc']?>" placeholder="Request Doc" class="form-control">
			</div>

			<div class="col-md-6">
				<input type="date" name="rqst_dt" value="<?php echo $_GET['rqst_dt']?>" class="form-control">
			</div>
		</div>

		<div class = "row">
			<div class="col-md-6">
				<input type="text" name="rqst_excute" value="<?php echo $_GET['rqst_excute']?>" placeholder="Type 1 here to approve request." class="form-control">
		</div>
			<div class="col-md-6">
				<input type="date" name="rqst_excute_dt" value="<?php echo $_GET['rqst_excute_dt']?>" placeholder="Approve date"><br>
			</div>
		</div>
			<input type="submit" name="submit" value="Request Approved" class="btn btn-success btn-lg btn-block">
</form>

<script type="text/javascript" src="js/bootstra.min.js"></script>

</body>
</html>

<!--fetch data to form while onclick 'Ok' -->
<?php
	include ("config.php");
	error_reporting(0);

	$query = "SELECT * from serviceview";
	$data = mysqli_query($conn,$query);
	$total = mysqli_num_rows($data);

	if($total !=0){
	?>


			<table border="1" style="font-size:12px" id="col-width" class="container"> <br>
				
				<th>Reg No</th>
				<th>Session</th>
				<th>Student Name</td>
				<th>Request Doc</th>
				<th>Request date</th>
				<th>Req Exe.</th>

				<th colspan=2>Action</td>
				
				<?php

				while($result = mysqli_fetch_assoc($data)){
					echo "<tr>
							<td>".$result['reg_no']."</td>
							<td>".$result['session']."</td>
							<td>".$result['student_nm']."</td>
							<td>".$result['rqst_doc']."</td>
							<td>".$result['rqst_dt']."</td>
							<td>".$result['rqst_excute']."</td>

							<td><a href='updateservice.php?reg_no=$result[reg_no]&email=$result[email]&student_nm=$result[student_nm]&rqst_doc=$result[rqst_doc]&rqst_dt=$result[rqst_dt]&rqst_excute=$result[rqst_excute]'>OK</a>
							</td>

						</tr>";
				}
			}
			else{
				echo "No record found";
			}
				?>

	</div>

	<font color='green'><a href='dashboard.php'>Back to dashboard</a>