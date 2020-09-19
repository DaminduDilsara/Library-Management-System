<?php
include_once("donationApprove.view.php");
include_once("donationApprove.model.php");

class donationController extends Donation{
public function showDonations(){
        return $this->getNotApprovedDonations();
    }
}
?>