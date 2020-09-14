<!doctype html>

<html lang="en">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="icon-bar">
      <a class="active" href="../view/admin.view.php"><i class="fa fa-home"></i></a>
      <a href="#"><i class="fa fa-search"></i></a>
      <a href="#"><i class="fa fa-envelope" id="noti_number"></i></a>
      <a href="../mainPageView/ContactUsSecondPage.php"><i class="fa fa-info-circle"></i></a>
      <a href="logout.view.php"><i class="fa fa-sign-out">logout</i></a>
</div>
<style>
    .icon-bar {
	width: 100%; /* Full-width */
	background-color: #990000; 
	overflow: auto; /* Overflow due to float */
  }
  
  .icon-bar a {
	float: left; /* Float links side by side */
	text-align: center; /* Center-align text */
	width: 20%; /* Equal width (5 icons with 20% width each = 100%) */
	padding: 12px 0; /* Some top and bottom padding */
	transition: all 0.3s ease; /* Add transition for hover effects */
	color: white; /* White text color */
	font-size: 36px; /* Increased font size */
  }
  
  .icon-bar a:hover {
	background-color: #000; /* Add a hover color */
  }
  
  .active {
	background-color: #330000; /* Add an active/current color */
  }
</style>
</html>