<?php
	session_start();
	include "../include/dbconnection.inc.php";
	include "../controller/adminController.controller.php";
	if(strlen($_SESSION['userName'])==NULL){   
		header('../mainPageView/index.php');
	}else{
		$controller=AdminController::getinstance(); 
		if(isset($_POST['addbook'])){
			
			$barcode=$_POST['barcode'];
			$isbn=$_POST['isbn'];
			$subject=$_POST['subject'];
			$title=$_POST['title'];
			$sub=$_POST['sub'];
			$author=$_POST['author'];
			$editor=$_POST['editor'];
			$publisher=$_POST['publisher'];
			$section=$_POST['section'];
			$place=$_POST['place'];
			$date=date_create($_POST['date']);
			$date=date_format($date,"Y/m/d H:i:s");
			$pages=$_POST['pages'];
			$price=$_POST['price'];
			$dim=$_POST['dim'];
			$cd=$_POST['cd'];
			$categary=$_POST['categary'];
		
			
			$book=Book::getInstance($barcode);
			$book->setBook($barcode,$isbn,$subject,$title,$sub,$author,$editor,$publisher,$section,$place,$date,$pages,$price,$dim,$cd,$categary);
			$msg=$controller->insert($book);
			$_SESSION['msg']=$msg;
		}elseif(isset($_POST['addnewspaper'])){ 

			
			$id=$_POST['id'];
			$name=$_POST['name'];
			$time=$_POST['time'];
			
			
			$newspaper=Newspaper::getInstance($id);
			$newspaper->setNewspaper($id,$name,$time);
			$msg=$controller->insert($newspaper);
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
	<title>Adding Page</title>
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

</br></br></br></br></br></br></br></br></br>
<h2>Adding Page</h2>
<div class="container" id="container">
	<div class="form-container newspaper-container">
		<form method="post" >
			</br></br></br>
			<h1>Add Newspaper</h1>
			</br></br></br>
			<input style=padding-left:25px type="text" name="id"placeholder="ID"required />
			<input style=padding-left:25px type="text" name="name"placeholder="Name" required/>
			<input style=padding-left:25px type="day" name="time"placeholder="Time Period(No: of days)"required />
			<button name="addnewspaper" type="submit">Add</button>
			
		</form>
	</div>
	<div class="form-container book-container">
		<form method="post">
			</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
			<h1>Add Book</h1>
			</br></br></br>
			<input style=padding-left:25px type="number" name="barcode"placeholder="Barcode No" required/>
			<input style=padding-left:25px type="text" name="isbn"placeholder="ISBN" required/>
			<input style=padding-left:25px type="text" name="subject"placeholder="Subject" />
			<input style=padding-left:25px type="text" name="title"placeholder="Title"required />
			<input style=padding-left:25px type="text" name="sub"placeholder="Subtitle" />
			<input style=padding-left:25px type="text" name="author"placeholder="Author" required/>
			<input style=padding-left:25px type="text" name="editor"placeholder="Editor" />
			<input style=padding-left:25px type="text" name="publisher"placeholder="Publisher"required />
			<input style=padding-left:25px type="text" name="section"placeholder="Section" required/>
			<input style=padding-left:25px type="text" name="place"placeholder="Published Place" />
			<input style=padding-left:25px type="text" name="date" placeholder="Published Date(YYYY-MM-DD)" />
			<input style=padding-left:25px type="number" name="pages"placeholder="Number of Pages" />
			<input style=padding-left:25px type="number" name="price"placeholder="Price" />
			<input style=padding-left:25px type="text" name="dim"placeholder="Dimensions" />
			<input style=padding-left:25px type="number" name="cd"placeholder="CD_Include" />
			<input style=padding-left:25px type="text" name="categary"placeholder="Categary"required />
			
			<button name="addbook"type="submit">Add</button>
			<br><br><br>
			
		</form>
	
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				
				<h1>Want to add a Book?</h1>
				
				<button class="button" id="book">Add Book</button>
				
			</div>
			<div class="overlay-panel overlay-right">
			
				<h1>Want to add a Newspaper?</h1>
				
				<button class="button" id="newspaper">Add Newspaper</button>
				
			</div>
		</div>
	</div>
</div>
<br><br><br>

</br></br></br></br></br></br>
</div>

<script>
//slide the panels in the flexbox
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
	//footer
	include "../include/footer.inc.php";
	?>

</body>


</html>