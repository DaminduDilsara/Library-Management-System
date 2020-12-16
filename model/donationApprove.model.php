<?php 
include_once("../include/dbconnection.inc.php");
include_once("../controller/donationApprove.con.php");

class Donation extends dbConnection {
	public function getNotApprovedDonations(){
        $query = "SELECT * FROM `donation` WHERE `Approved` = 0";
        $result = mysqli_query($this -> connectInDifferentWay(),$query) or die(mysql_error());
        return $result;
    }

    public function approveDonations($appid){
    	$select = "UPDATE donation SET Approved=1 where DonationID='$appid'";
    	$query = mysqli_query($this -> connectInDifferentWay(),$select) or die(mysql_error());
    }

    public function deleteDonations($delid){
    	$select = "DELETE from donation where DonationID=".$_GET['del_id'];
    	$query = mysqli_query($this -> connectInDifferentWay(),$select) or die(mysql_error());
    }

	    }
	    ?>
