<!doctype html>


<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style/add.css"type="text/css"/>
	<link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
	<title>Adding Page</title>
</head>

<body>

<?php
include "header.php";
?>

<div class="box">

</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
<h2>Adding Page</h2>
<div class="container" id="container">
	<div class="form-container newspaper-container">
		<form action="insertNewspaper.php" method="post">
			</br></br></br>
			<h1>Add Newspaper</h1>
			
			<input type="text" name="id"placeholder="ID"required />
			<input type="text" name="name"placeholder="Name" required/>
			<input type="day" name="time"placeholder="Time Period"required />
			<button type="submit">Add</button>
			</br></br></br></br></br>
			</br></br></br></br></br>
			</br></br></br></br></br>
			</br></br></br></br></br>
			</br></br></br></br></br>
			</br></br></br></br></br>
		</form>
	</div>
	<div class="form-container book-container">
		<form action="insertBook.php"method="post">
			<h1>Add Book</h1>
			<input type="number" name="barcode"placeholder="Barcode No" required/>
			<input type="text" name="isbn"placeholder="ISBN" required/>
			<input type="text" name="subject"placeholder="Subject" required/>
			<input type="text" name="title"placeholder="Title"required />
			<input type="text" name="sub"placeholder="Subtitle" />
			<input type="text" name="author"placeholder="Author ID" />
			<input type="text" name="editor"placeholder="Editor" />
			<input type="text" name="publisher"placeholder="Publisher"required />
			<input type="text" name="section"placeholder="Section" required/>
			<input type="text" name="place"placeholder="Published Place" />
			<input type="date" name="date" />
			<input type="number" name="pages"placeholder="Number of Pages" />
			<input type="number" name="price"placeholder="Price" />
			<input type="text" name="dim"placeholder="Dimensions" />
			<input type="number" name="cd"placeholder="CD_Include" />
			
			<button type="submit">Add</button>
		</form>
	
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Want to add a Book?</h1>
				
				<button class="button" id="book">Add Book</button>
				</br></br></br></br></br>
			</br></br></br></br></br>
			</br></br></br></br></br>
			</br></br></br></br></br>
			</br></br></br></br></br>
			</br></br></br></br></br>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Want to add a Newspaper?</h1>
				
				<button class="button" id="newspaper">Add Newspaper</button>
				</br></br></br></br></br>
			</br></br></br></br></br>
			</br></br></br></br></br>
			</br></br></br></br></br>
			</br></br></br></br></br>
			</br></br></br></br></br>
			</div>
		</div>
	</div>
</div>
</br></br></br>
<button onclick="document.location='admin.php'">Homepage</button>
</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
</div>

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
</body>
<footer>
	<?php
	include "footer.php";
	?>
</footer>



</html> 