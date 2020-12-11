<?php
	//include ("config.php");
	error_reporting(0);

?>

<html>
<head>
	<title>Testimonial</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	
	<form class="container" action="" method="GET">
		<div class="logo">
			<br><br ><br><img src="logo\iitlogo.png" height="10%"/><br><br><br><br ><br>
		</div>



		<h5><u><b>TO WHOM IT MAY CONCERN</b></u></h5><br>

		<div class="txt">
		<p>
			This is certified that <?php echo $_GET['student_nm']?> student of University of Dhaka studied under <?php echo $_GET['dept']?> department, resident of <?php echo $_GET['hall']?> hall whose university registration no. and session were <?php echo $_GET['reg_no']?> and session <?php echo $_GET['session']?> respectively. To the best of my knowledge and belief <?php echo $_GET['student_nm']?> has good moral and characteristics and bears no negative factors against the country or the individuals.

		</p>
		<p>
			 I wish him/her every success.
		</p><br>

		<p>
			<img src="logo\signature.jpg" height="10%"/>
		</p>
		 <p>
		 	Chairman, Department of <?php echo $_GET['dept']?>
		 </p>
		<P> 	
		 	University of Dhaka
		</P>
		<br>
		</div>

	</form><br><br><br><br>
			<button onclick="window.print();" id="print-btn" class="btn btn-primary">Dowmload</button>
			<INPUT TYPE="button" VALUE="Back" onClick="history.go(-1);">

<script type="text/javascript" src="js/bootstra.min.js"></script>
</body>
</html>