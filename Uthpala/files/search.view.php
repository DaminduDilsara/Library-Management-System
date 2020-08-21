<?php
include_once("search.con.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Search Item</title>
	<link rel="stylesheet" type="text/css" href="../css/s.css">

</head>
<body>
	<?php include('header.php');?>
		<div class="s-middle">
			<div class="s-left">
                <div class="up">
                    
                    <form action="" method="post" style="padding-top: 4%;">
Select a key:
<select name="options">
<option value="Title" selected>Title</option>
<option value="Author">Author</option>
<option value="ISBN">ISBN</option>
<option value="Barcode">Barcode</option>
</select>

                        <input type="text" name="search" placeholder="Search...">
                        <input type="submit" name="submit" value="search"  >
                    </form>
                    
                </div>

                <div class="down">
                    
                <h3>Search Results</h3> 
                    
                   <?php
	if(isset($_POST['submit'])){
		$selectOption=$_POST['options'];
        $searchValue=$_POST["search"];
        if ($searchValue==""){
            echo "Pleace enter text"; 
        }else{
        	$object=new SearchCon($selectOption,$searchValue);
        	//$result=$object->searchFor($selectOption,$searchValue);
        	?>
        	<table align="center" border="1px" style="width:600px; line-height:40px; background-color: white; color: black;">
                                    <tr>
                                    <th colspan="4"><h2>Search Results</h2></th>
                                    </tr>
                                    <t>
                                    <th> Title </th>
                                    <th> Author </th>
                                    
                                    <th>Status</th>
                                    </t>
        	

               
                                
                    <tr>
                    	<td><?php $object->getTitle($selectOption,$searchValue); ?></td>
                    	<td><?php $object->getAuthor($selectOption,$searchValue); ?></td>
                        <td><?php $array=$object->setReserve($selectOption,$searchValue);?></td>
                    
                    </tr>

                    <?php
                
                }}

                ?>
            </table>

<script type="text/javascript">
function dosearch() {
var sf=document.searchform;
var submitto = sf.sengines.options[sf.sengines.selectedIndex].value + escape(sf.searchterms.value);
window.location.href = submitto;
return false;
}
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
 include('footer.php');
 ?>
</body>
</html>