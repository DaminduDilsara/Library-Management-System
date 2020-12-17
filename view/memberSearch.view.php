<?php
session_start();
include_once("../controller/search.con.php");

$memNo=$_SESSION['memNo'];
$object=new searchCon();


if(isset($_GET['reserve_id']))
{
  $reserve_id=$_GET['reserve_id'];
  $msg=$object->reserveBook($memNo,$reserve_id);
  
echo '<script type="text/javascript">'; 
echo 'alert("' . $msg . '");';
echo 'window.location.href = "memberSearch.view.php";';
echo '</script>';
}

$object->expireReservation();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Search Item</title>
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
  </style>

</head>
<body>
	<?php include_once("../include/header.inc.php");?>
  <?php include_once("../include/navbar.inc.php");?>
		<div class="s-middle">
			<div class="s-left">
                <div class="up">
                    
                    <form action="" method="post" style="padding-top: 4%;">
Select a key:
<select name="options" style="width: 100px; height: 40px; border-radius: 1px; border-color: #8B0000; border-width: 3px;">
<option value="Title" selected>Title</option>
<option value="Author">Author</option>
<option value="ISBN">ISBN</option>
<option value="Barcode">Barcode</option>
</select>

                        <input type="text" name="search" placeholder="Search..." style="width: 400px; height: 40px; border-radius: 1px; border-color: #8B0000; border-width: 3px;">
                        <input type="submit" name="submit" value="search" style="width: 100px; height: 40px; border-radius: 50%; border-color: #8B0000; border-width: 3px; background-color:#8B0000; color:white; "  >
                    </form>
                    
                </div>

                <div class="down">
                    
                <h2 style="padding: 1%;">Search Results</h2> 
                    
                   <?php
	if(isset($_POST['submit'])){
		$selectOption=$_POST['options'];
        $searchValue=$_POST["search"];
        if ($searchValue==""){
            ?> <h2> <?php echo "Pleace enter what you want search!!!"; ?><h2><?php
        }else{
        	$object=new SearchCon($selectOption,$searchValue);
        	$result=$object->searchresults($selectOption,$searchValue);
        	?>
        	<table align="center" border="1px" style="width:600px; line-height:40px; color: black;">
                            
                                    <t>
                                    <th> Title </th>
                                    <th> Author </th>
                                    
                                    <th>Status</th>
                                    </t>
        	

               
                      <?php 
                       if($result->num_rows > 0){
 while($row = $result->fetch_assoc()){
 ?>
                        <tr>
 <td><?php echo $row['Title']; ?></td>
 <td><?php echo $row['Author']; ?></td>
 <td><?php if($row['Available']==1){?>
  <input type="button" onClick="reserveme(<?php echo $row['BarcodeNo']; ?>)" name="Reserve" value="Reserve">
<?php }else{
  echo "reserved";
} ?>
</td>
 </tr>
 <?php
                }
              
              }
              else
{
 ?>
 <tr>
 <td colspan="5">No Match for your search!!!</th>
 </tr>
            <?php

}
}
}


?>
            </table>

<script type="text/javascript">

  function reserveme(reserveid)
 {
 if(confirm("Do you want reserve!")){

  window.location.href='memberSearch.view.php?reserve_id=' +reserveid+'';

 return true;
 }
 }

//function dosearch() {
//var sf=document.searchform;
//var submitto = sf.sengines.options[sf.sengines.selectedIndex].value + escape(sf.searchterms.value);
//window.location.href = submitto;
//return false;
//}
</script>
			</div>
            </div>
	
			<div class="s-right">
                
                <h2>Our Collections</h2>


<div class="slideshow-container">

<div class="mySlides fade">
  <img src="../images/buddist.jpg" style="width:80%">
  <div class="text">Caption Text</div>
</div>

<div class="mySlides fade">
  <img src="../images/edu.jpg" style="width:80%">
  <div class="text">Caption Two</div>
</div>

<div class="mySlides fade">
  <img src="../images/children.jpg" style="width:80%">
  <div class="text">Caption Three</div>
</div>

<div class="mySlides fade">
  <img src="../images/sherlock.jpg" style="width:80%">
  <div class="text">Caption Text</div>
</div>

<div class="mySlides fade">
  <img src="../images/novels.jpg" style="width:80%">
  <div class="text">Caption Text</div>
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 3000); // Change image every 3 seconds
}
</script>
        </div>
    </div>
 </div>
 <?php
 include_once("../include/footer.inc.php");
 ?>
</body>
</html>