<?php
$id=$_POST['id'];
$name=$_POST['name'];
$time=$_POST['time'];


$con = mysqli_connect("localhost","root","","test");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  


$query = "INSERT INTO `newspapers` (`NewspaperID`, `NewspaperName`, `TimePeriod`) VALUES ('$id', '$name', '$time')";
$result = mysqli_query($con,$query);
if($result){
	echo "successfully added";
}
?>


