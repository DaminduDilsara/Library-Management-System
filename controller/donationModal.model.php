<?php 

include_once('../include/dbconnection.inc.php');
include_once('../controller/donationController.controller.php');

class Donation extends dbconnection{

	public function getDonationInfo(){
        
		$sql = "SELECT * FROM donation WHERE Approved='0'" ;
		$result = $this->connect()->prepare($sql);
		$result->execute();
		return $result;
		
	}

	public function addDonationInfo($name, $address, $email, $phone, $type,$des,$str){
        $sql = "INSERT INTO `donation` (`Name`, `Address`, `email`, `Telephone`, `DonationType`,`Description`,`Approved`) VALUES ('$name', '$address', '$email', '$phone', '$type', '$des','$str')";
        $query = $this->connectInDifferentWay();
		$result =mysqli_query($query,$sql) or die(mysqli_error($query)) ;

    }
}

?>