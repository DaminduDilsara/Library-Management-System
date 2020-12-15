<?php
	session_start();
	if (isset($_POST['Submit'])){   header("Location: admin.view.php");   }
	include "../include/dbconnection.inc.php";
	include "../controller/adminController.controller.php";
	if(strlen($_SESSION['userName'])==NULL){   
		header('../mainPageView/index.php');
	}else{
		$controller=AdminController::getinstance(); 
		$id=0;
		$name=NULL;
		$time=00-00-0000;
		$newspaper=Newspaper::getInstance($id,$name,$time);
		$message=$controller->expire($newspaper);
		
		$storeArray=$controller->load($newspaper);
		
		if(isset($_POST['chk1'])){
			$checkbox1=$_POST['chk1'];
			foreach ($checkbox1 as $key => $value){
				$msg=$controller->updateNewspaper($newspaper,$value);
				$_SESSION['msg']=$msg;
			}
		}
		if (isset($_SESSION['msg'])){ 
			$msg=$_SESSION['msg'];
			echo "<script type='text/javascript'>alert('$msg');</script>";
		
			
			unset($_SESSION['msg']); 
		}
			
			
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
<div class="header">

<?php
include "../include/header.inc.php";
include	"../include/adminNavbar.inc.php";
?>
</div>


<div>
<br><br><br><br><br><br>
<h2> NewspaperList </h2>
<br><br><br>

<form method="post" > 
<?php
//display the expired newspapers to tick
	if ($storeArray!=NULL){ 
		foreach ($storeArray as $value){
			echo("<input type='checkbox' name='chk1[]'value='$value'>$value<br>") ;
		}
	}
?>	
	
<?php

?>
<br />  

<br>  
<input type="submit" name="Submit" value="Submit">  
</form> 
</div>
</br></br></br>

</br></br></br>	 


<div class="footer">
	<?php
	include "../include/footer.inc.php";
	?>
</div>

</body>


</html>
<style>
	.footer {
  		position: fixed;
   		left: 0;
   		bottom: 0;
   		width: 100%;
	}
	.header{
  position: fixed;
  left: 0;
  top: 0;
  width: 100%;
}
	
</style>
