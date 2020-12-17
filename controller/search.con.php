<?php
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

    public function reserveBook($memNo,$reserve_id){
    	$res=$this->updateReserve($memNo,$reserve_id);
        if($res==1){
            $msg="Your reservation is successfull. Reservation wll be cancelled within 2 days!!!";
        }else{
           $msg="You have alresdy reserved 2 books!!!";
        }
       return $msg;

    	
    }

    public function expireReservation(){
    	$this->expireReserve();
    }

    public function showReservations($memNo){
        return $this->getReservations($memNo);
    }

    public function toCancelReservations($cancelid){
        $out=$this->cancelReservations($cancelid);
        if($out){
            $msg="Your cancel reservation is successfull!!!";
        }else{
            $msg="Somthing went wrong";
        }
        return $msg;
        $msg=0;
    }


    

} 

?>