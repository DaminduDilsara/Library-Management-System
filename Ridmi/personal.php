
<?php 
session_start();
include('dbconnection.php');
error_reporting(0);
global $con;

 
$memNo=$_SESSION['memNo'];

$sql="SELECT membershipNo,Name,Address,Birthday,school,Age,Telephone,Email,MembershipDate, ExpirationDate from  members  where membershipNo=:memNo ";
$query = $con->prepare($sql);
$query-> bindParam(':memNo', $memNo, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{    }}          
  ?> 


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<section class="header-section">
		<div class="header-2">
			Justin Wijewardhana Public Library <br> Godagama - Matara
		</div>
		<div class="header-4">
			<div class="medium-text">Library</div>
			<div class="small-text">Management System</div>
		</div>
		<div class="header-1">
			<img src="images/emblem.png" style="float:left;width:100px;height:90px;"/>
		</div>
		<div class="header-3">
			<img src="images/management.png" style="float:left;width:130px;height:90px;"/>
		</div>
</section>

	<section class="footer-section">
		<div class="col-md-12">
		<img src="images/book.gif" style="float:left;width:100px;height:70px;"/>
		
		<div class="quote-text">
		“Think before you speak. Read before you think.”<br>-------- Fran Lebowitz --------
		</div>
		</div>
		<div class="left-allign">
		   &copy; Library Management System for Justin Wijewardhana Public Library - Godagama |<a href="team.php" target="_blank"> Designed by : Team Errors @ Mora CSE</a> 
		</div>
	</section>
	

  <div class="navbar">
    <a class="active" href="testing/Library.php"><i class="fa fa-fw fa-home"></i> Home</a>
    <a href="#"><i class="fa fa-fw fa-envelope"></i> Contact Us</a>
    <a href="#"> Advanced search</a> 
  </div>
  
 <div class="row" >
  <div class="leftcolumn">
    <div class="card" style="height: 1150px;">
      
      <div class="fakeimg" style="height:1150px;">
        
       
      <h3>Library</h3>
      <div class="fakeimg" style="background: white;"><div class="small-text">Registration No:  <?php echo htmlentities($result->membershipNo);?> </div></div><br>
      <div class="fakeimg" style="background: white;"><div class="small-text">Registration date : <?php echo htmlentities($result->MembershipDate);?> </div></div><br>
      <div class="fakeimg" style="background: white;"><div class="small-text">Expiration Date :   <?php echo   htmlentities($result->ExpirationDate);?></div></div><br>
      <div class="fakeimg" style="background: white;"><div class="small-text">Home Library : Justin Wijewardhana Public Library/ Godagama-Matara </div></div>
      <h3>Identity</h3>
      <div class="fakeimg" style="background: white;"><div class="small-text">Name :    <?php echo htmlentities($result->Name);?></div></div><br>
      <div class="fakeimg" style="background: white;"><div class="small-text">Date of birth : <?php echo htmlentities($result->Birthday);?></div></div><br>
      <div class="fakeimg" style="background: white;"><div class="small-text">Age :   <?php echo htmlentities($result->Age);?></div></div><br>
      <div class="fakeimg" style="background: white;"><div class="small-text">Address : <?php echo htmlentities($result->Address);?></div></div><br>
      <div class="fakeimg" style="background: white;"><div class="small-text">School/Institute :  <?php echo htmlentities($result->School);?></div></div><br>
      <h3>Contact Details</h3>
      <div class="fakeimg" style="background: white;"><div class="small-text">Phone No. :   <?php echo htmlentities($result->Telephone);?></div></div><br>
      <div class="fakeimg" style="background: white;"><div class="small-text">Email address : <?php echo htmlentities($result->Email);?></div></div><br>
      </div>
      
    </div>
    
    
    
    
  </div>

  <div class="rightcolumn">
    <div class="card" style="height:1100px;" >
      
      <div class="fakeimg" style="height:1100px;  ">
       <h3>About Me </h3>
       <img src="images/1.png" style="height: 100px; width: 100px; margin-left: 50px;">
       <div class="small-text" >    <b><?php echo htmlentities($result->Name);?></b></div>
</div>
       
    </div>
    
    
  </div>
</div>
  
</body>
</html>
