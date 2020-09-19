<?php 
include_once("connect.php");
include_once("donationApprove.con.php");

class Donation extends dbConnection {
	public function getNotApprovedDonations(){
        $query = "SELECT * FROM `donation` WHERE `Approved` = 0";
        $result = mysqli_query($this -> connectInDifferentWay(),$query) or die(mysql_error());
        return $result;
    }

	    }
	    ?>
