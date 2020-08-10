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
	
}
?>