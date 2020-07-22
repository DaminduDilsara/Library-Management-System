<!doctype html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style/MembersArea.css"type="text/css"/>
	<link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
	<title>Members Area</title>
</head>
<body>
	<header>
	<?php
	include "header.php";
	?>

		<h2>Members Area</h2>
	</header>
	<div class="tab">
		<button class="button" onclick="openTab(event,'Add')"id="default">AddMember</button>
		<button class="button" onclick="openTab(event,'Remove')">RemoveMember</button>
		<button class="button" onclick="openTab(event,'Renew')">RenewMembership</button>
	</div>
	<div id="Add" class="content">
		<form action="insertmember.php"method="post">
			</br></br></br>
			<h1>Add member</h1>
			<input type="number" name="membershipNo" placeholder="MembershipNo"required/>
			<input type="text" name="name"placeholder="Name" required/>
			<input type="text" name="address"placeholder="Address"required />
			<input type="text" name="birthday"placeholder="Birthday" required/>
			<input type="text" name="school"placeholder="School" />
			<input type="number" name="age"placeholder="Age"required />
			<input type="tel" name="tele"placeholder="Telephone" />
			<input type="email" name="email"placeholder="Email" />
			<input type="date" name="membershipdate"placeholder="MembershipDate" required/>
			<input type="text" name="deposite"placeholder="Deposite"required />
			
			
			<button type="submit">Add</button>
			
		</form>
	</div>
	<div id="Remove" class="content">
		<form action="#">
			</br></br></br>
			<h1>Remove Member</h1>
			
			<input type="text" placeholder="MembershipId" />
			<input type="text" placeholder="Name" />
			
			
			
			<button>Remove</button>
			
		</form>
	</div>
	<div id="Renew" class="content">
		<form action="#">
			</br></br></br>
			<h1>Renew Membership</h1>
			
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
	<?php
	include "footer.php";
	?>

</footer>
</body>
</html>
