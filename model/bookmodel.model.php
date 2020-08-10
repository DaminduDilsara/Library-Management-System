<?php 
include_once('../controller/usercontroller.controller.php');
include_once('../include/dbconnection.inc.php');

class BookModel extends dbConnection {

	 public function getBookInfo($barcodememNo){
	 	$sql = "SELECT * FROM book WHERE BarcodeNo= ?";
		$query = $this->connect()->prepare($sql);
		$query->execute([$barcodememNo]);
		$query = $query->fetchAll();
		return $query;
	 }

	 public function getBorrowInfo($barcodememNo){
	 	$sql = "SELECT * FROM borrowsession WHERE BarcodeNo= ?";
		$query = $this->connect()->prepare($sql);
		$query->execute([$barcodememNo]);
		$query = $query->fetchAll();
		return $query;
	 }

	
}
?>