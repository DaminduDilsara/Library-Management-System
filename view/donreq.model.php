<?php 
include_once("donreq.con.php");
include_once("../include/dbconnection.inc.php");

class Donreq extends dbconnection {
	
	 public function insertDon($name, $address, $email, $phone, $type,$des){ 
			$sql = "INSERT INTO `donation` (`Name`, `Address`, `email`, `Telephone`, `DonationType`,`Description`,`Approved`) VALUES ('$name', '$address', '$email', '$phone', '$type', '$des','0')";
			$query = $this->connectInDifferentWay();
			$result =mysqli_query($query,$sql) or die(mysqli_error($query)) ;

			if($result){
			return True;
		}else{
			return False;
		}
			
		}
	}

//$d=new Donreq();
//$d->insertDonation('name', 'address', 'email', 'phone', 'type','des');
?>