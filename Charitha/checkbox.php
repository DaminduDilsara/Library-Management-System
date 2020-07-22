<!doctype html>

<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style/checkbox.css"type="text/css"/>
	<link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
	<title>NewspaperList</title>
</head>
<body>
<header>


<?php
include "header.php";
?>


<div>
<h2> NewspaperList </h2>
</header>
<form action="check.php" method="post">  
<input type="checkbox" name="chkl[ ]" value="Aruna">Aruna<br />  
<input type="checkbox" name="chkl[ ]" value="Lankadeepa">Lankadeepa<br />  
<input type="checkbox" name="chkl[ ]" value="Diwatina">Diwatina<br />  
<input type="checkbox" name="chkl[ ]" value="Mawbima">Mawbima<br />  
  
<br>  
<input type="submit" name="Submit" value="Submit">  
</form>  
</body>
<br><br><br><br><br><br><br><br><br>
<footer>
	<?php
	include "footer.php";
	?>
</footer>

</html>
