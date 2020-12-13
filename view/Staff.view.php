<?php
	session_start();
	include "../include/dbconnection.inc.php";
	include "../controller/adminController.controller.php";
	if(strlen($_SESSION['userName'])==NULL){   
		header('../mainPageView/index.php');
	}else{
		$controller=AdminController::getinstance(); 
		if(isset($_POST['registerMember'])){

			$id=$_POST['id'];
			$name=$_POST['name'];
			$post=$_POST['post'];
			$address=$_POST['address'];
			$contactNo=$_POST['contactNo'];
			$username=$_POST['username'];
			$password=$_POST['pass'];
			
			$staff=Staff::getInstance($id);
			$staff->setStaff($id,$name,$post,$address,$contactNo,$username,$password);
			$msg=$controller->insert($staff);
			$_SESSION['msg']=$msg;
		}elseif(isset($_POST['removeStaff'])){ 
			
			$id=$_POST['id'];
			$name=$_POST['name'];
			$post=$_POST['post'];
			$address=$_POST['address'];
			$contactNo=$_POST['contactNo'];
			$username=$_POST['username'];
            $password=$_POST['pass'];
            
			$staff=Staff::getInstance($id);
			$staff->setStaff($id,$name,$post,$address,$contactNo,$username,$password);
			$msg=$controller->remove($staff);
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
	<link rel="stylesheet" href="../style/remove.charitha.css"type="text/css"/>
	<link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
	<title>Staff Register</title>
</head>
<body>
<header>
<?php
	include "../include/header.inc.php";
?>
</header>
<?php
		include	"../include/adminNavbar.inc.php";
	?>
	<br><br>
<div class="box">
</br></br></br></br></br></br>
	<h2>Staff Register</h2>

<div class="container" id="container">
	<div class="form-container newspaper-container">
		<form method="post">
			
			<h1>Remove Staffmember</h1>
			
			<input type="number"name='id' placeholder="StaffID"required />
			<input type="hidden"name='name' placeholder="Name" />
			<input type="hidden"name='post' placeholder="Post" />
            <input type="hidden"name='address' placeholder="Address" />
			<input type="hidden"name='contactNo' placeholder="Contact No:" />
            <input type="hidden"name='username' placeholder="Username" />
			<input type="hidden"name='pass' placeholder="Password" />
					
			<button  name="removeStaff" type=submit onclick="return confirmDelete()">Remove</button>
		</form>		
	</div>
	
	<div class="form-container book-container">
		<form method="post">
		
			<h1>Register Staffmember</h1>
			
			<input type="number"name='id' placeholder="StaffID"required />
			<input type="text"name='name' placeholder="Name" />
			<input type="text"name='post' placeholder="Post" />
            <input type="text"name='address' placeholder="Address" />
			<input type="text"name='contactNo' placeholder="Contact No:" />
            <input type="text"name='username' placeholder="Username" />
			<input type="text"name='pass' placeholder="Password" />
			
			
			
			<button name=registerMember type=submit >Register</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Want to register?</h1>
				
				<button class="button" id="book">Register</button>
				
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Want to remove a Staffmember?</h1>
				
				<button class="button" id="newspaper">Remove</button>
				
			</div>
		</div>
	</div>
</div>

</br></br></br>

</br></br></br></br></br></br>
</div>
<script>
function confirmDelete() {
  return confirm("Are you sure you want to delete?");
}
</script>



<script>
const NewspaperButton = document.getElementById('newspaper');
const BookButton = document.getElementById('book');
const container = document.getElementById('container');

NewspaperButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

BookButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});
</script>

	<?php
	include "../include/footer.inc.php";
	?>

</body>
</html> 