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
	$object->toDeleteCreations($del_id);
	header("Location: creationApprove.view.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Approve Creations</title>
	<link rel="stylesheet" type="text/css" href="../css/s.css">
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

.a {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

.a:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
	</style>
</head>
<body>
	<div class="body" style="height: auto;
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
 <td><?php $path = "../uploads/" . $row["Title"]; ?><img src="<?php echo $path ?>" alt="<?php echo $row['Title'];?>" style="height: 100px" class="a" id="myImg" onclick="onClick(this)">
 
 <!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div></td>


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
 window.location.href='creationApprove.view.php?del_id=' +delid+'';
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

var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

function onClick(element) {
document.getElementById("img01").src = element.src;
document.getElementById("myModal").style.display = "block";
}
 
 </script>
<?php include_once("../include/footer.inc.php");?>
</body>
</html>