<?php
	$name=$_POST['name'];
	$address=$_POST['address'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$type=$_POST['type'];
	$des=$_POST['des'];

	$con = mysqli_connect("localhost","root","","testphp");
	if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$query = "INSERT INTO `donation` (`Full Name`, `Address`, `Email`, `Telephone`, `Type`,`Description`) VALUES ('$name', '$address', '$email', '$phone', '$type','$des')";
$result = mysqli_query($con,$query);
if($result){
	echo "success";
}
?>