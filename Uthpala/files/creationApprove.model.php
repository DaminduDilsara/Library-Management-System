<?php 
include_once("connect.php");
include_once("creationApprove.con.php");

class Creation extends dbConnection {
	public function getNotApprovedCreations(){
        $query = "SELECT * FROM `creation` WHERE `Approved` = 0";
        $result = mysqli_query($this -> connectInDifferentWay(),$query) or die(mysql_error());
        return $result;
    }

	    }
	    ?>
