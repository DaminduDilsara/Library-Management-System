<?php
include_once("connect.php");
include_once("search.con.php");

class SearchModel extends connection{

	public function searchResult($selectOption,$searchValue){
		$sql="SELECT * FROM book where ".$selectOption." like '%$searchValue%'";
		$query = $this->dbconnect()->prepare($sql);
		$query->execute([$selectOption,$searchValue]);
		$query = $query->fetchAll();
		return $query;
	}
}

?>