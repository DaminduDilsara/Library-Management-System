<?php 
include_once("../include/dbconnection.inc.php");
include_once("../controller/creationApprove.con.php");

class Creation extends dbconnection {
	public function getNotApprovedCreations(){
        $query = "SELECT * FROM `creation` WHERE `Approved` = 0";
        $result = mysqli_query($this -> connectInDifferentWay(),$query) or die(mysql_error());
        return $result;
    }

    public function approveCreations($appid){
    	$select = "UPDATE creation SET Approved=1 where CreationID='$appid'";
    	$query = mysqli_query($this -> connectInDifferentWay(),$select) or die(mysql_error());
    }

    public function deleteCreations($delid){
    	$select = "DELETE from creation where CreationID=".$_GET['del_id'];
    	$query = mysqli_query($this -> connectInDifferentWay(),$query) or die(mysql_error());
    }


	    }
	    ?>
