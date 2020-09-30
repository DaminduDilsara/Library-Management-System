<?php
include_once("../include/dbconnection.inc.php");
include_once("../controller/search.con.php");

class SearchModel extends dbconnection{

	public function searchingResult($selectOption,$searchValue){
		$sql="SELECT * FROM book where ".$selectOption." like '%$searchValue%'";
		$result = mysqli_query($this -> connectInDifferentWay(),$sql) or die(mysql_error());
        return $result;
	}

	public function reserveBooks($reserve_id){
		$sql = "UPDATE book SET available=0 where BarcodeNo='".$_GET['reserve_id']."'";
		$result = mysqli_query($this -> connectInDifferentWay(),$sql) or die(mysql_error());
	}
}

?>
