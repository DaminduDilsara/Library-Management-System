<!DOCTYPE html>

<head>
    <title>Online Library Management System | </title>

    <!-- CUSTOM STYLE  -->
    <link href="../style/style-Damindu.css" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">


</head>

<body>
	
	<?php include('header.php');?>
	
	<?php include('navbar.php');?>

	<div class="row">
	
		<div class="leftcolumn">
			
			<div class="card2">
				This is tha Policies Page
			</div>
		</div>
	  
		<div class="rightcolumn">
			<div class="card">
				
				<?php include('userLogin.php');?>
				<?php include('userRegister.php');?>
				<?php include('adminLogin.php');?>
				
				
			</div>
			
			<div class="card3">
				<p><img src="../images/phone.png" style="width:30px;height:25px;"/><sup> +94 76 549 1495</sup></p>
				<p><img src="../images/email.png" style="width:30px;height:30px;"/><a href="https://google.com/" target="_blank" style="text-decoration:none"><sup> lib.justinwige@gmail.com</sup></a> </p>
			</div>
			
			<div class="card">
				<?php include('slideShowQuotes.php');?>
			</div>
		</div>
	  
	</div>

	<?php include('footer.php');?>
	
</body>
</html>
