<?php
include_once("../controller/search.con.php");
session_start();
$memNo=$_SESSION['memNo'];

$object=new SearchCon();
$result=$object->showReservations($memNo);

if(isset($_GET['cancel_id']))
{
	$cancel_id=$_GET['cancel_id'];
	$msg=$object->toCancelReservations($cancel_id);
	echo '<script type="text/javascript">'; 
echo 'alert("' . $msg . '");';
echo 'window.location.href = "reservations.view.php";';
echo '</script>';
}

?>

<?php
include_once("../include/header.inc.php");
include('../include/navbar.inc.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>My Reservations</title>
	<link rel="stylesheet" type="text/css" href="s.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
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
<th>Expire Date</th>
<th>Do you want cancel?</th>

</tr>

 <?php
//Fetch Data form database
if($result->num_rows > 0){
 while($row = $result->fetch_assoc()){
 ?>
 <tr>
 <td><?php echo $row['MembershipNo']; ?></td>
 <td><?php echo $row['ExpirationDate']; ?></td>

 <td><input type="button" onClick="cancelme(<?php echo $row['ReserveID']; ?>)" name="Cancel" value="Cancel"></td>
 </tr>

 
 <?php
 }
}
else
{
 ?>
 <tr>
 <td colspan="4">No Reserved Books!!!</th>
 </tr>
 <?php

}


?>
</table>
</div>

<script language="javascript">
 
  function cancelme(cancelid)
 {
 if(confirm("Do you want cancel your reservation!")){
 window.location.href='reservations.view.php?cancel_id=' +cancelid+'';

 return true;
 }
 }
 </script>


<?php include_once("../include/footer.inc.php");?>
</body>
</html>