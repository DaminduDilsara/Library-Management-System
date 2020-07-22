<!doctype html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style/remove.css"type="text/css"/>
	<link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
	<title>Removing Page</title>
</head>
<body>
<header>
<?php
	include "header.php";
?>
</header>
<div class="box">
</br></br></br></br></br></br>
	<h2>Removing Page</h2>

<div class="container" id="container">
	<div class="form-container newspaper-container">
		<form action="#">
			</br></br></br>
			<h1>Remove Newspaper</h1>
			
			<input type="text" placeholder="ID" />
			<input type="text" placeholder="Name" />
			
			<button>Remove</button>
			
		</form>
	</div>
	<div class="form-container book-container">
		<form action="#">
			<h1>Remove Book</h1>
			
			<input type="text" placeholder="ISBN" />
			<input type="text" placeholder="Title" />
			
			<button>Remove</button>
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
</br></br></br>
<button onclick="document.location='admin.php'">Homepage</button>
</br></br></br></br></br></br>
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

	<?php
	include "footer.php";
	?>

</body>
</html> 