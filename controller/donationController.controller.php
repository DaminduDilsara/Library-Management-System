<?php
include('../model/donationModal.model.php');

abstract class IDonation{

	public $name;
	public $address;
	public $email;
	public $phone;
	public $type;
	public $des;

	public function setInfo($name, $address, $email, $phone, $type,$des){
		$this->name=$name;
		$this->address=$address;
		$this->email=$email;
		$this->phone=$phone;
		$this->type=$type;
		$this->des=$des;

	}
	public abstract function addDonation();
}

class AdminDonation extends IDonation{

	public function setInfo($name, $address, $email, $phone, $type,$des){
		parent::setInfo($name, $address, $email, $phone, $type,$des);
	}
	
	public function addDonation(){
    
    	$o=new Creation();
    	$str='1';
		$o->addCreationalInfo($this->name,$this->address,$this->email,$this->phone,$this->type,$this->des,$str);
    }
}


class UserDonation extends IDonation{

	public function setInfo($name, $address, $email, $phone, $type,$des){
		parent::setInfo($name, $address, $email, $phone, $type,$des);
	}

	public function addDonation(){
    
    	$o=new Donation();
    	$str='0';
    	$o->addCreationalInfo($this->name,$this->address,$this->email,$this->phone,$this->type,$this->des,$str);

    	
    }
}

class DonationMaker{
	private $common;
	

	public function DonationMaker(IDonation $common){
		$this->common = $common;
		
		
	}


	public function setInfo($name, $address, $email, $phone, $type,$des){
		
		$this->common->setInfo($name, $address, $email, $phone, $type,$des);
		
	}

	public function addDonation(){

		$this->common->addDonation();
		

	}

	

}

class DonationNotification{

	public function notify(){
		$update=new Donation();
		$updOb=$update->getDonationInfo();
		echo $updOb->rowCount();

	}
}

$obj=new DonationNotification();
$obj->notify();