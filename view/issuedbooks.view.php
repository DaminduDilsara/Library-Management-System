<?php 
session_start();
include('../include/dbconnection.inc.php');
include('../controller/usercontroller.controller.php');
error_reporting(0);
?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<?php
    include('../include/header.inc.php');
    include('../include/footer.inc.php');

  ?>
  
	
 
  <div class="navbar">
  	<a class="active" href="#"><i class="fa fa-fw fa-home"></i> Home</a>
  	<a href="#"><i class="fa fa-fw fa-envelope"></i> Contact Us</a>
  	<a href="#"> Advanced search</a> 
  </div>
  <div class="row" >
  
    <div class="card" style="height: 400px; ">
      
      <div class="fakeimg" style="height:400px;">
      	<h3>Managed Issued Books</h3>
      <table id="customers">
  <tr>
    <th>Book Name</th>
    <th>ISBN</th>
    <th>Issued Date</th>
    <th>Expiration Date</th>
    <th>Return Date</th>
    <th>Fine in (Rs.)</th>
  </tr>
  <tr>
  	<td></td>
  	<td></td>
  	<td></td>
  	<td></td>
  	<td></td>
    <td></td>
  </tr>
      </div>
      </div>
      </div>	
</body>
</html>