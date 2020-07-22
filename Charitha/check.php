<?php
$con = mysqli_connect("localhost","root","","test");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$checkbox1 = $_POST['chkl'] ;  
if ($_POST["Submit" ]=="Submit")  
{  
for ($i=0; $i<sizeof ($checkbox1);$i++) {  
$query="INSERT INTO newspapers (NewspaperName) VALUES ('".$checkboxl[$i]. "')";  
mysqli_query($con,$query) or die(mysqli_error($con));  
}  
echo "Record is inserted";  
}  
?>