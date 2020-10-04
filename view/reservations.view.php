<?php
include_once("../include/header.inc.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>My Reservations</title>
	<link rel="stylesheet" type="text/css" href="s.css">
	<style>
		th, td {
  			padding: 15px;
  			text-align: center;
  			border: 1px solid black;
  			border-color: white;
  		}
  		table {
  			border-collapse: collapse;
  			width: 1000px;
  			font-size: 20px;
		}
		th {
  			background-color: #8B0000;
  			color: white;
		}
		/**td:nth-child(even){
			background-color: white;
		} **/


}
	</style>
</head>
<body>
	<div class="body" style="height: 500px;
	background-color: #F9BDB4;
	margin: 10px;
	padding: 25px;">
<h1 align="center">My Book Reservations</h1>
<table align="center" style="line-height:50px;">
<tr>
<th>Title</th>
<th>Reserved Date</th>
<th>Expire Date</th>

</tr>

 <tr>
 <td colspan="3">No Reservations Found!!!</th>
 </tr>

</table>
</div>



<?php include_once("../include/footer.inc.php");?>
</body>
</html>