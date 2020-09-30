<?php
    
  	//include_once('../includes/connect.php');
	include_once("donreq.con.php");
if(isset($_POST['submit'])){

		$name=$_POST['name'];
		$address=$_POST['address'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$type=$_POST['type'];
		$des=$_POST['des'];
	

	$objct = new Donation($name,$address,$email,$phone,$type,$des); 
	$objct->insertTo($name,$address,$email,$phone,$type,$des);

	

	
}
	

  ?>
	
<!DOCTYPE html>
<html>
<head>
	<title>Donation Requests</title>
	<link href="../css/style.css" rel="stylesheet" />
</head>
<body>
	<?php include('header.php'); ?>
	
	<div class="middle">
		
		<div class="left"> Donation Forum
				<form action="" method="post">

				Full Name:<br>
				<input type="text" name="name" placeholder="Your Name..." >	<br>
				Address:<br>
				<input type="text" name="address" placeholder="Your Address..."><br>
				Email:<br>
				<input type="text" name="email" placeholder="Your Email..."><br>
				Telephone:<br>
				<input type="text" name="phone" placeholder="Contact Number..."><br>
				Donation Type:<br>
				<input type="text" name="type" placeholder="Money / Books"><br>
				Description:<br>
				<input type="text" name="des" placeholder="Say something about donation..." style="height: 150px;"><br>
				        <button type="submit"  name="submit">Submit</button>
				</form>

				
				</div>
				<div class="right-up">
					
				</div>
				<div class="right-down"></div>
				</div>
			<?php

    include('footer.php');



  ?>


  


  
	
</body>
</html>