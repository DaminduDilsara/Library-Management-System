<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'newlibrarydb';

$con = new mysqli($servername,$username,$password,$dbname);

if ($con->connect_error){
	die("Connection failed");
}

$sql = "SELECT * FROM creation";
$result = $con->query($sql);
echo $result->num_rows;
//if($result->num_rows>0){
	//while($row = $result->fetch_assoc()){
		//echo "Notification: " . $row['Title'];
	//}


//}else{
	//echo ' 0 results';
//}
$con->close();
?>