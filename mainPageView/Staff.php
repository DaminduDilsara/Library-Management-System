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
			
			<div class="visionMissionTextMedium">Staff</div><br>
			<div class="visionMissionTextSmall">The library has a very friendly staff who will help you in every way at the library.</div><br>
			
			
				<div class="row">
				
					<div class="columnStaff">
						<div class="cardStaff">
						  <img src="../images/Staff1.jpg" alt="Mrs. Deepika" style="width:100%">
						  <div class="container">
							<div class="staffH2">Librarian </div><br><div class="staffH3">Mrs. Deepika Priyanthi Athapaththu</div>
							<p class="staffTiny">Diploma in Library Science - National Library Association</p>
							
						  </div>
						</div>
					</div>
					
					<div class="columnStaff">
						<div class="cardStaff">
						  <img src="../images/Staff3.jpg" alt="Mrs. Ranjanee" style="width:100%">
						  <div class="container">
							<div class="staffH2">Library Assistant </div><br><div class="staffH3">Mrs. Ranjanee Hewapathirana</div>
							<p class="staffTiny">Higher Diploma in Library Science - University of Kelaniya</p>
						  </div>
						</div>
					</div>
					
					<div class="columnStaff">
						<div class="cardStaff">
						  <img src="../images/Staff2.jpg" alt="Ms. Thanuja" style="width:100%">
						  <div class="container">
							<div class="staffH2">Library Assistant </div><br><div class="staffH3">Ms. Thanuja Dilrukshi Hewa Alegoda</div>
							<p class="staffTiny">Diploma in Library Science - University of Kelaniya</p>
						  </div>
						</div>
					</div>
					
				
				</div>
			</div>
		</div>
	  
		<div class="rightcolumn">
			<div class="card">

                <?php include('adminLogin.php');?>
                <?php include('userLogin.php');?>
                <?php include('userRegister.php');?>
				
				
			</div>

            <div class="card3">
                <p><img src="../images/phone.png" style="width:30px;height:25px;"/><sup> +94 76 782 3793</sup></p>
                <p><img src="../images/email.png" style="width:30px;height:30px;"/><a href="https://lib.justinwigewardhana@gmail.com/" target="_blank" style="text-decoration:none"><sup> lib.justinwigewardhana@gmail.com</sup></a> </p>
            </div>
			
			<div class="card">
				<?php include('slideShowQuotes.php');?>
			</div>
		</div>
	  
	</div>

	<?php include('footer.php');?>
	
</body>
</html>
