<?php
  session_start();
  include "../include/dbconnection.inc.php";
  include "../controller/adminController.controller.php";
	if(strlen($_SESSION['memNo'])==0){   
		header('../index.php');
	}else{
		$controller=new AdminController(); 
		if(isset($_POST['addauthor'])){
			
			$id=$_POST['id'];
			$fname=$_POST['fname'];
			$lname=$_POST['lname'];
						
			$author=new Author($id,$fname,$lname);
			$msg=$controller->insert($author);
			$_SESSION['msg']=$msg;
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
	<link rel="stylesheet" href="../style/author.charitha.css"type="text/css"/>
	<link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
	<title>Authors Page</title>
</head>
<body>

<?php
include "../include/header.inc.php";
?>


    <h2>Authors Page</h2>
    <div class="bg-img">
  <form method="post"class="container">
    <h1>Authors Area</h1><br><br><br>

    <label for="id"><b>AuthorID</b></label>
    <input type="text" placeholder="Enter ID" name="id" required>

    <label for="fname"><b>First Name</b></label>
    <input type="text" placeholder="Enter First Name" name="fname" required>

    <label for="lname"><b>Last Name</b></label>
    <input type="text" placeholder="Enter Last Name" name="lname" required>

    <button name="addauthor"type="submit" class="btn">Add</button><br><br>
    
  </form>
  <button class="home" onclick="document.location='admin.view.php'">Home</button>
</div>



    <?php
    include "../include/footer.inc.php";
    ?>

</body>
</html> 