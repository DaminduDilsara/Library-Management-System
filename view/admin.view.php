<?php

error_reporting(0);
?>
<!doctype html>

<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Admin Homepage </title>
	<link rel="stylesheet" href="../style/admin.charitha.css"type="text/css"/>
	<link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
	
	
</head>
<body>
	<header>
		
		<?php
		include "../include/header.inc.php";
		?>
		 
		<h2 id="demo">Admin Homepage</h2>
		
		
		
	</header>
	
	<div class="slideshow-container">
		<div class="mySlides fade">
			
			<img src="../images/library.jpg"style="width:100%">
				
		</div>
		<div class="mySlides fade">
			
			<img src="../images/library2.jpg"style="width:100%">
				
		</div>
	</div>
	<br>
	<div style="text-align:center">
		<span class="dot"></span>
		<span class="dot"></span>
		<span class="dot"></span>
	</div>
		
	
	<!-- Add icon library -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<div class="icon-bar">
  		<a class="active" href="../index.php"><i class="fa fa-home"></i></a>
  		<a href="#"><i class="fa fa-search"></i></a>
  		<a href="#"><i class="fa fa-envelope" id="noti_number"></i></a>
  		<a href="#"><i class="fa fa-info-circle"></i></a>
  		<a href="#"><i class="fa fa-trash"></i></a>
	</div>


	<script type="text/javascript">
		function loadDoc() {

			setInterval(function(){
				var xhttp = new XMLHttpRequest();
  				xhttp.onreadystatechange = function() {
    			if (this.readyState == 4 && this.status == 200) {
     				document.getElementById("noti_number").innerHTML = this.responseText;
    		}
  		};
  		xhttp.open("GET", "../controller/creationController.controller.php", true);
  		xhttp.send();


			},1000);
  
}
loadDoc();
	</script>


	<style>
	.icon-bar {
  width: 100%; /* Full-width */
  background-color: #990000; /* Dark-grey background */
  overflow: auto; /* Overflow due to float */
}

.icon-bar a {
  float: left; /* Float links side by side */
  text-align: center; /* Center-align text */
  width: 20%; /* Equal width (5 icons with 20% width each = 100%) */
  padding: 12px 0; /* Some top and bottom padding */
  transition: all 0.3s ease; /* Add transition for hover effects */
  color: white; /* White text color */
  font-size: 36px; /* Increased font size */
}

.icon-bar a:hover {
  background-color: #000; /* Add a hover color */
}

.active {
  background-color: #330000; /* Add an active/current color */
}
</style>
<div class=row>
	<div class="column side">
 	</div>	
<div class="column buttons">		
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
	<br><br><br><br>
	<button class="fa fa-plus btn btn-sep btn-1" onclick="document.location='add.view.php'" >Adding Area</button>
	<button class="fa fa-minus btn btn-sep btn-2" onclick="document.location='../Charitha/remove.php'">Removing Area</button>
	<br><br><br><br><br><br><br>
	<button class="fa fa-users btn btn-sep btn-1" onclick="document.location='../Charitha/MembersArea.php'">Members Area</button>
	<button class="fa fa-book btn btn-sep btn-2"onclick="document.location='../Charitha/Lend.php'">Lending Session</button>
	<br><br><br><br><br><br><br>
	<button class="fa fa-male btn btn-sep btn-1"onclick="document.location='author.view.php'">Authors Area</button>
	<button class="fa fa-check btn btn-sep btn-2"onclick="document.location='../Charitha/checkbox.php'">Newspapers Register</button>
	<br><br><br><br><br><br><br>
	<button class="fas fa-handshake-o btn btn-sep btn-1" onclick="document.location='default.asp'">Donations</button>
	<button class="fa fa-file btn btn-sep btn-2"onclick="document.location='default.asp'">Creations</button>
	<br><br><br><br><br><br><br>
	<button class="fa fa-user btn btn-sep btn-1" onclick="document.location='../Charitha/staff-member.php'">Staff Information</button>
	
</div>
<div class="column side">
</div>
</div>
<style>
	.column.buttons{
		background-image: url("https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQ3LnKVot9O4jdIpKxjFrPWq50cuxB4G8CFRQ&usqp=CAU");
  		background-size: cover;
  		width: 1000px;
  		height: 750px;
  		display: inline-block;
  		position: relative;
	}
	.btn{
	border: none;
	font-family: 'Lato';
	font-size: inherit;
	color: inherit;
	background: none;
	cursor: pointer;
	padding: 75px 80px;
	display: inline-block;
	margin: 15px 30px;
	text-transform: uppercase;
	letter-spacing: 1px;
	font-weight: 700;
	outline: none;
	position: relative;
	-webkit-transition: all 0.3s;
	-moz-transition: all 0.3s;
	transition: all 0.3s;
}
.btn:before {
	font-family: 'FontAwesome';
	
	font-style: normal;
	font-weight: normal;
	font-variant: normal;
	text-transform: none;
	line-height: 1;
	position: relative;
	-webkit-font-smoothing: antialiased;
}


/* Icon separator */
.btn-sep {
	padding: 25px 60px 50px 120px;
}

.btn-sep:before {
	background: rgba(0,0,0,0.15);
}
.btn-1 {
	background: #4d0000;
	color: #fff;
	float:left;
	border:2px solid #330000;
}

.btn-1:hover {
	background: #330000;
}

.btn-1:active {
	background: #1a0000;
	top: 2px;
}

.btn-1:before {
	position: absolute;
	height: 100%;
	left: 0;
	top: 0;
	line-height: 3;
	font-size: 140%;
	width: 60px;
}
.btn-2 {
	background: #4d0000;
	color: #fff;
	float:right;
	border:2px solid #330000;
}

.btn-2:hover {
	background: #330000;
}

.btn-2:active {
	background: #1a0000;
	top: 2px;
}

.btn-2:before {
	position: absolute;
	height: 100%;
	left: 0;
	top: 0;
	line-height: 3;
	font-size: 140%;
	width: 60px;
}
.btn-3 {
	background: #4d0000;
	color: #fff;
	float:none;
	border:2px solid #330000;
}

.btn-3:hover {
	background: #330000;
}

.btn-3:active {
	background: #1a0000;
	top: 2px;
}

.btn-3:before {
	position: absolute;
	height: 100%;
	left: 0;
	top: 0;
	line-height: 3;
	font-size: 140%;
	width: 60px;
}

/* Create three unequal columns that floats next to each other */
.column {
  float: left;
  padding: 10px;
}

/* Left and right column */
.column.side {
  width: 15%;
}

/* Middle column */
.column.button {
  width: 70%;
  
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column.side, .column.button {
    width: 100%;
  }
}
</style>
	<div id="box" class="modal">
		<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">
	
	</div>
	
	
	<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
 
  slides[slideIndex-1].style.display = "block";  
  
  setTimeout(showSlides, 5000);
}
</script> 
<div>
<footer>
	<?php
	include "../include/footer.inc.php";
	?>
</footer>
</div>
</body>

</html>