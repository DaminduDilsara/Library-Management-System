<?php
include_once("donreq.model.php");
include_once("donreq.view.php");

Class Donation extends Donreq{
	private $name;
	private $address;
	private $email;
	private $phone;
	private $type;
	private $des;
	
	
	public function __constructor($name,$address,$email,$phone,$type,$des){
		$this->name=$name;
		$this->address=$address;
		$this->email=$email;
		$this->phone=$phone;
		$this->type=$type;
		$this->des=$des;
		
	}

	public function insertTo($name,$address,$email,$phone,$type,$des){
		$d=new Donreq();
		$d->insertDon($name,$address,$email,$phone,$type,$des);
		
	}
}
?>