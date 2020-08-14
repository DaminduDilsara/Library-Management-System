<?php 
session_start();
include('../include/dbconnection.inc.php');
include('../controller/usercontroller.controller.php');
error_reporting(0);



$memNo=$_SESSION['memNo'];


$obuser=UserController::getInstance();
$result=$obuser->assignInfo($memNo);

         
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
    <a class="active" href="testing/Library.php"><i class="fa fa-fw fa-home"></i> Home</a>
    <a href="#"><i class="fa fa-fw fa-envelope"></i> Contact Us</a>
    <a href="#"> Advanced search</a> 
  </div>
 <div class="row">
  <div class="leftcolumn">
    <div class="card">
      
      <div class="fakeimg" style="height:250px;">
        <img src="../images/heyy.jpg" style="height: 200px; width: 100%;">
        
      </div>
      
    </div>
    
      
      <div class="fakeimg" style="height:260px;"><div class="medium-text" style="font-size: 22px;" >   Hello, <?php echo ($obuser->getName());?> <br> Welcome to your account</br></div></div> 
    
    
    
  </div>
  <div class="rightcolumn">
    <div class="card" style="height:600px;" >
      
      <div class="fakeimg" style="height:500px;  ">
        <img src="../images/1.png" style="height: 100px; width: 100px; margin-left: 50px;">
         <ul class="vertical-list" style="margin-top: 0px;">
    
    <li><a href='issuedbooks.view.php' class='button'>Issued Books</a></li>
    <li><a href='personaldetails.view.php' class='button'>Personal details</a></li>
    <li><a href='changepassword.view.php' class='button'>Change password</a></li>
    <li><a href='logout.view.php' class='button'>Log out</a></li>
    
    <li><a href='/' class='button'>Reserve book</a></li>
    <li><a href='creation.view.php' class='button'>Add creations</a></li>
</ul>
</div>
       
    </div>
    
    
  </div>
</div>
  
</body>
</html>