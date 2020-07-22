<!doctype html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style/Lend.css"type="text/css"/>
	<link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
	<title>Lending Session</title>
</head>
<body>
	<header>
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

		<h2>Lending Session</h2>
	</header>
	<div class="tab">
		<button class="button" onclick="openTab(event,'Lend')"id="default">Lend</button>
		<button class="button" onclick="openTab(event,'Return')">Return</button>
		<button class="button" onclick="openTab(event,'Fine')">Pay Fine</button>
	</div>
	<div id="Lend" class="content">
		<form action="#">
			</br></br></br>
			<h1>Lend Book</h1>
			
			<input type="text" placeholder="MembershipID" />
			<input type="text" placeholder="ISBN" />
			<input type="Date" placeholder="Date" />
					
			<button>LEND</button>
			
		</form>
	</div>
	<div id="Return" class="content">
		<form action="#">
			</br></br></br>
			<h1>Return Book</h1>
			
			<input type="text" placeholder="MembershipId" />
			<input type="text" placeholder="ISBN" />
			
			
			
			<button>Return</button>
			
		</form>
	</div>
	<div id="Fine" class="content">
		<form action="#">
			</br></br></br>
			<h1>Pay Fine</h1>
			
			<input type="text" placeholder="MembershipId" />
			<input type="text" placeholder="Name" />
			<input type="text" placeholder="Deposite" />
			
			
			
			<button>Renew</button>
			
		</form>
	</div>
	
</br></br></br>
<button onclick="document.location='admin.html'">Homepage</button>
</br></br></br>	
	
</body>

<script>
document.getElementById("default").click();

function openTab(evt, Name) {
  
  var i, content, button;

  
  content = document.getElementsByClassName("content");
  for (i = 0; i < content.length; i++) {
    content[i].style.display = "none";
  }

  
  button = document.getElementsByClassName("button");
  for (i = 0; i < button.length; i++) {
    button[i].className = button[i].className.replace(" active", "");
  }

  
  document.getElementById(Name).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
<footer>
	<section class="footer-section">
		<div class="col-md-12">
		<img src="book.gif" style="float:left;width:100px;height:70px;"/>
		
		<div class="quote-text">
		“Think before you speak. Read before you think.”<br>-------- Fran Lebowitz --------
		</div>
		</div>
		<div class="left-allign">
		   &copy; Library Management System for Justin Wijewardhana Public Library - Godagama |<a href="team.php" target="_blank"> Designed by : Team Errors @ Mora CSE</a> 
		</div>
	</section>
</footer>

