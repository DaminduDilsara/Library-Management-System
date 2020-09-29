<?php
include_once("../controller/creationApprove.con.php");
include_once("../include/header.inc.php");

$object=new creationController();
$result=$object->showCreations();

if(isset($_GET['app_id']))
{
	$app_id=$_GET['app_id'];
	$object->toApproveCreations($app_id);
	header("Location: creationApprove.view.php");
}

if(isset($_GET['del_id']))
{
	$del_id=$_GET['del_id'];
	$object->toApproveCreations($del_id);
	header("Location: creationApprove.view.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Approve Creations</title>
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
<h1 align="center">Waiting Creations</h1>
<table align="center" style="line-height:50px;">
<tr>
<th>Membership No</th>
<th>Title</th>
<th>Creation</th>
<th>Approve</th>
<th>Delete</th>

</tr>
<?php
//Fetch Data form database
if($result->num_rows > 0){
 while($row = $result->fetch_assoc()){
 ?>
 <tr>
 <td><?php echo $row['MembershipNo']; ?></td>
 <td><?php echo $row['Title']; ?></td>
 <td><?php $path = "uploads/" . $row["Title"]; ?>
 <img src="<?php echo $path ?>" style="width:auto; height:30px"></td>

                
 

 
 <td><input type="button" onClick="approveme(<?php echo $row['CreationID']; ?>)" name="Approve" value="Approve"></td>
 <td><input type="button" onClick="deleteme(<?php echo $row['CreationID']; ?>)" name="Delete" value="Delete"></td>
 </tr>

 
 <?php
 }
}
else
{
 ?>
 <tr>
 <td colspan="5">No Creations to Approve!!!</th>
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
 window.location.href='delete.php?del_id=' +delid+'';
 return true;
 }
 }

  function approveme(appid)
 {
 if(confirm("Do you want Approve!")){
 window.location.href='creationApprove.view.php?app_id=' +appid+'';

 return true;
 }
 }
 </script>
<?php include_once("../include/footer.inc.php");?>
</body>
</html>