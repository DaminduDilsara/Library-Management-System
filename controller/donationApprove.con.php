<?php
include_once("../view/donationApprove.view.php");
include_once("../model/donationApprove.model.php");

class donationController extends Donation{
	public function showDonations(){
        return $this->getNotApprovedDonations();
    }

    public function toApproveDonations($appid){
    	$this->approveCreations($appid);
    }

    public function toDeleteDonations($delid){
    	$this->approveCreations($delid);
    }
}
?>