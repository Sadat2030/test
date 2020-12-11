<?php
	include ("config.php");
	error_reporting(0);

		if(isset($_POST['update'])){
			$reg_no = $_POST['reg_no'];
			$name = $_POST['name'];
			$email = $_POST['email'];
			$mobile = $_POST['mobile'];
			$verified = $_POST['verified'];
			$verified_dt = $_POST['verified_dt'];
		
			$query = "UPDATE users_students_view SET verified='$verified',verified_dt='$verified_dt' WHERE email='$email'";

			$data = mysqli_query($conn, $query);
			if($data){
				echo "<font color='green'> Student account verified.<a href='reg_verify.php'>Check Updated List Here</a> ";
			}
			else{
				echo "<font color='red'>Account does not verify.<a href='reg_verify.php'>Check Updated List Here</a>";
				}
		}

		if(isset($_POST['cancel'])){
				header("location:dashboard.php");
			}
?>

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

				form{
					background-color: rgb();
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
					top: 40%;
					left: 50%;
					transform: translate(-50%, -50%);
					max-width: 300%;
					background: #fff;
					padding: 25px;
					border-radius: 5%;
					box-shadow: 4px 4px 2px rgb(254, 236, 165,1)
				} 

				h3{
					position: absolute;
					left: 35%;
					top: 0%;
					color: green;
				}


				th{
				  background-color: rgb(0,183,91);
				  color: white;
				}

				td{
					background-color: rgb(234,233,182);
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
	</head>
	<div class="header">
		  <img id="img1" src="logo\iitlogo.png" height="5%">
  		  <img id="img2" src="logo\dulogo.jpg" height="5%">
	</div>

		<body>
			<h3>Registration Verification Form</h3>
			<div class="wraper">
				<form action="" method="post" class="container" onsubmit="checkforblank()">

					  <div class="imgcontainer">
					  </div id="text">
							<div>
								<input type="text" name="name" value="<?php echo $_GET['name']?>" placeholder="Name" disabled>

								<div class="row">
									<div class="col-md-6">
							    		<input type="text" name="email" value="<?php echo $_GET['email']?>" placeholder="Email">
							    	</div>
							    	<div class="col-md-6">
							    		<input type="text" name="mobile" value="<?php echo $_GET['mobile']?>" placeholder="Mobile no." disabled>
							    	</div>
							    </div>

							    <div class="row">
								    <div class="col-md-6">
										<select name="verified" class="form-control">
											<option value="">?</option>
											<option value="Y">Yes</option>
										</select>
								    </div>

								    <div class="col-md-6">
								    	<input type="date" name="verified_dt" placeholder="verified date">
								    </div>
								</div>
							</div>

							<div id="btn"><br>
								<input type="submit" name="update" class="regbtn" value="Update">
								<input type="button" name="cancel" class="cancelbtn" value="Cancel"  onClick="history.go(-1);">
							</div>

					<table border="1" style="font-size:14px" class="container"><br>
							<tr>
								<th>Reg. No.</th>
								<th>Name</th>
								<th>Email</th>
								<th>Mobile</th>
								<th>Verified?</th>
								<th>Verified Dt.</th>
								<th colspan=2>Actions</th>
							</tr>

							<?php
								$sql = "SELECT * FROM users_students_view WHERE verified is NULL || verified='' ";
								$data = mysqli_query($conn,$sql);

								while($result = mysqli_fetch_assoc($data)){
									echo "<tr>
											<td>".$result['reg_no']."</td>
											<td>".$result['name']."</td>
											<td>".$result['email']."</td>
											<td>".$result['mobile']."</td>
											<td>".$result['verified']."</td>
											<td>".$result['verified_dt']."</td>

											<td><a href='reg_verify.php?reg_no=$reg_no[reg_no]&name=$result[name]&email=$result[email]&mobile=$result[mobile]&verified=$result[verified]&verified_dt=$result[verified_dt]'>Ok</a></td>

											<td><a href='delete.php?email=$result[email]' onclick='checkdelete()'>Delete</a></&td>
										</tr>";
								}
							?>
					</table>
				</form> 
			</div>
		</body>
</html>
<font color='green'><a href='dashboard.php'>Back to dashboard</a>