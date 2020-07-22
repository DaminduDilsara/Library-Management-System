<?php
$barcode=$_POST['barcode'];
$isbn=$_POST['isbn'];
$subject=$_POST['subject'];
$title=$_POST['title'];
$sub=$_POST['sub'];
$author=$_POST['author'];
$editor=$_POST['editor'];
$publisher=$_POST['publisher'];
$section=$_POST['section'];
$place=$_POST['place'];
$date=$_POST['date'];
$pages=$_POST['pages'];
$price=$_POST['price'];
$dim=$_POST['dim'];
$cd=$_POST['cd'];




include("config.php");
  


$query = "INSERT INTO `book` ('BarcodeNo',`ISBN`,'Subject', `Title`, `Subtitle`,'Author','Editor','Publisher','Section','PublishedPlace','PublishedDate','NumberOfPages','Price','Dimentions','CD_Include') VALUES ('$barcode','$isbn','$subject', '$title', '$sub','$author','$editor','$publisher','$section','$place','$date','$pages','$price','$dim','$cd')";

$result = mysqli_query($con,$query);
if($result){
	echo "successfully added";
}
?>