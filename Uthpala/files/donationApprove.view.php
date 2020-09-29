<?php
include_once("donationApprove.con.php");
include 'header.php';

$object=new donationController();
$result=$object->showDonations();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Approve Donations</title>
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
<h1 align="center">Waiting Donations</h1>
<table align="center" style="line-height:50px;">
<tr>
<th>Donation ID</th>
<th>Name</th>
<th>Description</th>
<th>Approve</th>
<th>Delete</th>

</tr>
<?php
//Fetch Data form database
if($result->num_rows > 0){
 while($row = $result->fetch_assoc()){
 ?>
 <tr>
 <td><?php echo $row['DonationID']; ?></td>
 <td><?php echo $row['Name']; ?></td>
 <td><?php echo $row['Description']; ?> </td>

                
 

 
 <td><input type="button" onClick="approveme(<?php echo $row['DonationID']; ?>)" name="Approve" value="Approve"></td>
 <td><input type="button" onClick="deleteme(<?php echo $row['DonationID']; ?>)" name="Delete" value="Delete"></td>
 </tr>

 
 <?php
 }
}
else
{
 ?>
 <tr>
 <td colspan="5">No Donations to Approve!!!</th>
 </tr>
 <?php

}


?>
</table>
</div>


<script language="javascript">
 function deleteme(delid)
 {
 if(confirm("Do you want Delete!")){
 window.location.href='deletedonation.php?del_id=' +delid+'';
 return true;
 }
 }

  function approveme(appid)
 {
 if(confirm("Do you want Approve!")){
 window.location.href='approvedonation.php?app_id=' +appid+'';

 return true;
 }
 }
 </script>
<?php include 'footer.php';?>
</body>
</html>