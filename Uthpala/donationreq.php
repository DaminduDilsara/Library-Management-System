
<!DOCTYPE html>
<html>
<head>
	<title>Donation Requests</title>
	<link href="style.css" rel="stylesheet" />
</head>
<body>
	<?php include('header.php');?>
	<div class="middle">
		<div class="left">
			<div class="left-middle">
				"Qoute"
			</div>
			
		</div>
		<div class="right" style=";">
				<form action="connect.php" method="post">

				Full Name:<br>
				<input type="text" name="name">	<br>
				Address:<br>
				<input type="text" name="address"><br>
				Email:<br>
				<input type="text" name="email"><br>
				Telephone:<br>
				<input type="text" name="phone"><br>
				Donation Type:<br>
				<input type="text" name="type"><br>
				Description:<br>
				<input type="text" name="des"><br>
				<input type="submit" name="Confirm" style="width: 20%; background-color: white; float: right;margin-top: 5%;margin-right: 5%;">
				</form>

				
			</div>
	</div>
	<?php include('footer.php');?>
</body>
</html>