<!doctype html>
<html lang="en">
<?php
    include "config.php";
?>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style/author.css"type="text/css"/>
	<link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
	<title>Authors Page</title>
</head>
<body>

<?php
include "header.php";
?>


    <h2>Authors Page</h2>
    <div class="bg-img">
  <form action="/action_page.php" class="container">
    <h1>Authors Area</h1><br><br><br>

    <label for="first"><b>First Name</b></label>
    <input type="text" placeholder="Enter First Name" name="first" required>

    <label for="last"><b>Last Name</b></label>
    <input type="text" placeholder="Enter Last Name" name="last" required>

    <button type="submit" class="btn">Check</button><br><br>
    
  </form>
  <button class="home" onclick="document.location='admin.php'">Home</button>
</div>



    <?php
    include "footer.php";
    ?>

</body>
</html> 