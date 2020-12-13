<?php
	session_start();
	include "../include/dbconnection.inc.php";
	include "../controller/adminController.controller.php";
	if(strlen($_SESSION['userName'])==NULL){   
		header('../mainPageView/index.php');
	}else{
		$controller=AdminController::getinstance(); 
		if(isset($_POST['removeBook'])){

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
			$date=$_POST['date'];
			$pages=$_POST['pages'];
			$price=$_POST['price'];
			$dim=$_POST['dim'];
			$cd=$_POST['cd'];
			$categary=$_POST['categary'];
		
			
			$book=Book::getInstance($barcode);
			$book->setBook($barcode,$isbn,$subject,$title,$sub,$author,$editor,$publisher,$section,$place,$date,$pages,$price,$dim,$cd,$categary);
			$msg=$controller->remove($book);
			$_SESSION['msg']=$msg;
		}elseif(isset($_POST['removeNewspaper'])){ 
			
			$id=$_POST['id'];
			$name=$_POST['name'];
			$time=$_POST['time'];
			
			$newspaper=Newspaper::getInstance($id);
			$newspaper->setNewspaper($id,$name,$time);
			$msg=$controller->remove($newspaper);
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
	<title>Removing Page</title>
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
	<h2>Removing Page</h2>

<div class="container" id="container">
	<div class="form-container newspaper-container">
		<form method="post">
			
			<h1>Remove Newspaper</h1>
			
			<input type="text"name='id' placeholder="NewspaperID"required />
			<input type="hidden"name='name' placeholder="NewspaperName" />
			<input type="hidden"name='time' placeholder="NewspaperTime" />
					
			<button  name="removeNewspaper" type=submit onclick="return confirmDelete()">Remove</button>
		</form>		
	</div>
	
	<div class="form-container book-container">
		<form method="post">
		
			<h1>Remove Book</h1>
			
			<input name="barcode"type="number" placeholder="BarcodeNo" required />
			<input type="hidden" name="isbn"placeholder="ISBN" />
			<input type="hidden" name="subject"placeholder="Subject" />
			<input type="hidden" name="title"placeholder="Title" />
			<input type="hidden" name="sub"placeholder="Subtitle" />
			<input type="hidden" name="author"placeholder="Author" />
			<input type="hidden" name="editor"placeholder="Editor" />
			<input type="hidden" name="publisher"placeholder="Publisher" />
			<input type="hidden" name="section"placeholder="Section" />
			<input type="hidden" name="place"placeholder="Published Place" />
			<input type="hidden" name="date" />
			<input type="hidden" name="pages"placeholder="Number of Pages" />
			<input type="hidden" name="price"placeholder="Price" />
			<input type="hidden" name="dim"placeholder="Dimensions" />
			<input type="hidden" name="cd"placeholder="CD_Include" />
			<input type="hidden" name="categary"placeholder="Categary"/>
			
			
			
			<button name=removeBook type=submit onclick="return confirmDelete()">Remove</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Want to remove a Book?</h1>
				
				<button class="button" id="book">Remove Book</button>
				
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Want to remove a Newspaper?</h1>
				
				<button class="button" id="newspaper">Remove Newspaper</button>
				
			</div>
		</div>
	</div>
</div>
<div id="id01" class="modal">
  				<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
  				<form class="modal-content" method=post>
    				<div class="container_a">
      					<h1>Delete the entry</h1>
      					<p>Are you sure you want to delete this entry?</p>
    
      					<div class="clearfix">
        					<button name="cancel"type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        					<button name="delete"type="button" onclick="document.getElementById('id01').style.display='none'" class="deletebtn">Delete</button>
      					</div>
    				</div>
  				</form>
			</div>
</br></br></br>
<button onclick="document.location='admin.view.php'">Homepage</button>
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