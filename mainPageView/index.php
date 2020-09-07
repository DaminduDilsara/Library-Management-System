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
	

	  
		<div class="rightcolumn">
			<div class="card">
                <?php include('adminLogin.php');?>
				<?php include('userLogin.php');?>
                <?php include('userRegister.php');?>
			</div>
			
			<div class="card3">
				<p><img src="../images/phone.png" style="width:30px;height:25px;"/><sup>+94 76 782 3793</sup></p>
				<p><img src="../images/email.png" style="width:30px;height:30px;"/><a href="https://lib.justinwigewardhana@gmail.com/" target="_blank" style="text-decoration:none"><sup> lib.justinwigewardhana@gmail.com</sup></a> </p>
			</div>
			
			<div class="card">
				<?php include('slideShowQuotes.php');?>
			</div>
		</div>

        <div class="leftcolumn">
            <div class="card1">
                <?php include('mainSlide.php');?>
            </div>
            <div class="card2">

            </div>
        </div>
	  
	</div>

	<?php include('footer.php');?>
	
</body>
</html>
