<?php 
include_once("donreq.con.php");
include_once("connect.php");

class Donreq extends connection {
	
	 public function insertDon($name, $address, $email, $phone, $type,$des){ 
			$sql = "INSERT INTO `donation` (`Name`, `Address`, `Email`, `Telephone`, `DonationType`,`Description`) VALUES ($name, $address, $email, $phone, $type,$des)";
			$stmt= $this->dbconnect()->prepare($sql);
			$stmt->execute([$name, $address, $email, $phone, $type,$des]);

			//return $res;

			
		}
	}

//$d=new Donreq();
//$d->insertDonation('name', 'address', 'email', 'phone', 'type','des');
?>