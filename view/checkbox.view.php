<?php
session_start();
include "../include/dbconnection.inc.php";
include "../controller/adminController.controller.php";
if(strlen($_SESSION['userName'])==NULL){   
	header('../index.php');
}else{
	$controller=AdminController::getinstance(); 
}
?>
<!doctype html>

<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../style/checkbox.charitha.css"type="text/css"/>
	<link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
	<title>NewspaperList</title>
</head>
<body>
<header>


<?php
include "../include/header.inc.php";
?>
</header>

<div>
<h2> NewspaperList </h2>


<form method="post"> 
	<input type="hidden" name="id"placeholder="ID" />
	<input type="hidden" name="name"placeholder="Name" />
	<input type="hidden" name="time"placeholder="Time Period"/>
	<?php
		$id=$_POST['id'];
		$name=$_POST['name'];
		$time=$_POST['time'];
		$newspaper=Newspaper::getInstance($id,$name,$time);
		$storeArray=$controller->load($newspaper);
		foreach($storeArray as $value){
			

			
		}
		

	?> 
<input type="checkbox" name="chkl[ ]" value="Aruna">Aruna<br />  
<input type="checkbox" name="chkl[ ]" value="Lankadeepa">Lankadeepa<br />  
<input type="checkbox" name="chkl[ ]" value="Diwatina">Diwatina<br />  
<input type="checkbox" name="chkl[ ]" value="Mawbima">Mawbima<br />  
  
<br>  
<input type="submit" name="Submit" value="Submit">  
</form> 
</div>
</br></br></br>
<button onclick="document.location='admin.view.php'">Homepage</button>
</br></br></br>	 



	<?php
	include "../include/footer.inc.php";
	?>
</body>
</html>