<?php
$membershipNo=$_POST['membershipNo'];
$name=$_POST['name'];
$address=$_POST['address'];
$birthday=$_POST['birthday'];
$school=$_POST['school'];
$age=$_POST['age'];
$tele=$_POST['tele'];
$email=$_POST['email'];
$memdate=$_POST['membershipdate'];
$deposite=$_POST['deposite'];


include("config.php");


$con = mysqli_connect("localhost","root","","test");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  


$query = "INSERT INTO `members` (`MembershipNo`, `Name`, `Address`,'Birthday','School','Age','Telephone','Email','Membershipdate','ExpirationDate') VALUES ('$membershipNo', '$name', '$address','$birthday','$school','$age','$tele','$email','$memdate','$deposite',$memdate+365*($deposite//1000))";

$result = mysqli_query($con,$query);
if($result){
	echo "successfully added";
}
?>