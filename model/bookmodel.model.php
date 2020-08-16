<?php 
include_once('../controller/usercontroller.controller.php');
include_once('../include/dbconnection.inc.php');

class BookModel extends dbConnection {

	 public function getBookInfo($barcodeNo){
	 	$sql = "SELECT * FROM book WHERE BarcodeNo= ?";
		$query = $this->connect()->prepare($sql);
		$query->execute([$barcodeNo]);
		$query = $query->fetchAll();
		return $query;
	 }

	 public function getBorrowInfo(){
	 	$sql = "SELECT * FROM borrowsession";
		$query = $this->connect()->prepare($sql);
		$query->execute();
		$query = $query->fetchAll();
		return $query;
	 }

	
}


?>