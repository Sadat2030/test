<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box;}

body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

body {
 margin: 0;
 padding: 1em 0;
 color: #fff;
 background: #0080d2;
 font-family: Georgia, Times New Roman, serif;
}

.header {
  overflow: hidden;
  background-color: #f1f1f1;
  padding: 20px 10px;
}

.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;
}

.header a:hover {
  background-color: #ddd;
  color: black;
}

.header a.active {
  background-color: dodgerblue;
  color: white;
}

.header-right {
  float: right;
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }
}

img {
  width: 6%;
  height: auto;
}


</style>
</head>
<body>


<div class="header">

 <img src="logo\iitlogo.png" height="5%">

  <div class="header-right">
    <a class="active" href="#home">Home</a>
    <a class="faculty" fref="#faculty">Faculty</a>
    <a href="students.php"></i>Student</a>
    <a href="updateservice.php">Service</a>
    <a href="reg_verify.php">Verify Student Account</a>
    <a href="#contact">Contact</a>
    <a href="#about">About</a>
   
  </div>
  

</div>



<div style="padding-left:20px">
  <h3>Institute of Information Technology (IIT), University of Dhakas</h3>

</div>

</body>
</html>
