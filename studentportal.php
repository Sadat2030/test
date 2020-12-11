<?php
  include ("config.php");
  error_reporting(0);

  $email = email;
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<style>

  body {
       margin: 0;
       padding: 1em 0;
       color: #fff;
       background: #0080d2;
       font-family: Georgia, Times New Roman, serif;
    }

.sidebar {
  height: 100%;
  width: 160px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 16px;
}

.sidebar a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
}

.sidebar a:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 160px; /* Same as the width of the sidenav */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}

#img1 {
      width: 8%;
      height: auto;

      position: absolute;
      left: 90%;
      top: 0%;
       padding: 50px 5px;
  }
#img2 {
      width: 6%;
      height: auto;

      position: absolute;
      left: 12%;
      top: 3%;
       padding: 10px 5px;
  }


.header{
      overflow: hidden;
      background-color: #f1f1f1;
      padding: 60px 10px;

  }



</style>
</head>

<div class="header">
  <img id="img1" src="logo\iitlogo.png" height="5%">
  <img id="img2" src="logo\dulogo.jpg" height="5%">
</div>

  <body>
    <div class="sidebar">
      <a href="#home"><i class="fa fa-fw fa-home"></i> Home</a>
      <a href="studentrqst.php"><i class="fa fa-fw fa-wrench"></i>Services Request</a>
      <a href="approvedservices.php"><i class="fa fa-fw fa-wrench"></i>Services Delivered</a>
      <a href="#contact"><i class="fa fa-fw fa-envelope"></i> Contact</a>
    </div>

    <div class="main">
      <h2>Student Portal: University of Dhaka</h2>

      <p>Student of University of Dhaka gave the access of this portal. They will use this portal to have online services such as new semester enrollment, deposit session fees, migration, admission in hall, request for testimonial, marksheet and certificate, and many more things.</p>

      <div><INPUT TYPE="button" VALUE="Back" onClick="history.go(-1);"></div>
    </div>

<script type="text/javascript" src="bootstra.min.js"></script>
</body>
</html> 