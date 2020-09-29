<?php
include_once("../view/creationApprove.view.php");
include_once("../model/creationApprove.model.php");

class creationController extends Creation{
	public function showCreations(){
        return $this->getNotApprovedCreations();
    }

    public function toApproveCreations($appid){
    	$this->approveCreations($appid);
    }

    public function toDeleteCreations($delid){
    	$this->approveCreations($delid);
    }

}
?>