<?php
include_once("../view/search.view.php");
include_once("../model/search.model.php");

Class SearchCon extends SearchModel{

	private $selectOption;
	private $searchValue;

	public function __constructor($selectOption,$searchValue){
		$this->selectOption=$selectOption;
		$this->searchValue=$searchValue;
	}

	public function searchresults($selectOption,$searchValue){
        return $this->searchingresult($selectOption,$searchValue);
    }

    public function reserveBook($reserve_id){
    	$this->reserveBooks($reserve_id);
    }



	

} 

?>