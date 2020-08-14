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
			
			<div class="cardNew">
				
				<div class="visionMissionTextMedium">Our Vision</div><br>
				<div class="visionMissionTextSmall">Let's make an intelligent world through a reader society</div>
				<img src="../images/vision.png" style="width:350px;height:230px;" />
				
				<div class="visionMissionTextMedium">Our Mission</div><br>
				<div class="visionMissionTextSmall">Our mission is to collect books, distribute it among the readers, protect them, establish readers' societies to improve the knowledge and attitudes of the people and improve the reading interest of the readers in the Godagama sub office area of the Matara Pradeshiya Sabha.</div>
				<img src="../images/mission1.png" style="width:400px;height:280px;"/>
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
