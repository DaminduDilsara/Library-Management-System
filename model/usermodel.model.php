<?php 
include_once('../controller/usercontroller.controller.php');
include_once('../include/dbconnection.inc.php');

class User extends dbConnection {

	 public function getInfo($memNo){
	 	$sql = "SELECT * FROM member WHERE MembershipNo= ?";
		$query = $this->connect()->prepare($sql);
		$query->execute([$memNo]);
		$query = $query->fetchAll();
		return $query;
	 }

	 public function updatePassword($memNo,$newpassword){
	 	$sql = "UPDATE member SET Password='$newpassword' WHERE MembershipNo=?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$memNo]); 
	 }

	 public function getUserLoginInfo($memNo, $password){
         $sql = "SELECT * FROM member WHERE MembershipNo= '$memNo' and Password = '".md5($password)."'";  //'".md5($psw)."' decrypting
         $result = mysqli_query($this -> connectInDifferentWay(),$sql) or die(mysql_error());
         $rows = mysqli_num_rows($result);
         return $rows;
     }
	
}
?>