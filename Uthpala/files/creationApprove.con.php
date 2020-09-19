<?php
include_once("creationApprove.view.php");
include_once("creationApprove.model.php");

class creationController extends Creation{
public function showCreations(){
        return $this->getNotApprovedCreations();
    }
}
?>