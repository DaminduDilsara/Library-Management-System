<?php
include('../model/usermodel.model.php');


class UserController extends User {

	private $name;
	private $password;
	private $membershipNo;
	private $regDate;
	private $expDate;
	private $birthday;
	private $guarantor;
	private $address;
	private $school;
	private $telephone;
	private $email;


	public function _construct(){

	}

	public function getName(){
		return $this->name;
	}

	public function setName($name){
		$this->name=$name;
	}

	public function getPassword(){
		return $this->password;
	}

	public function setPassword($password){
		$this->password=$password;
	}

	public function getMemNo(){
		return $this->membershipNo;
	}

	public function setMemNo($membershipNo){
		$this->membershipNo=$membershipNo;
	}

	public function getRegDate(){
		return $this->regDate;
	}

	public function setRegDate($regDate){
		$this->regDate=$regDate;
	}

	public function getExpDate(){
		return $this->expDate;
	}

	public function setExpDate($expDate){
		$this->expDate=$expDate;
	}
	
	public function getBirthday(){
		return $this->birthday;
	}

	public function setBirthday($birthday){
		$this->birthday=$birthday;
	}

	public function getGuarantor(){
		return $this->guarantor;
	}

	public function setGuarantor($guarantor){
		$this->guarantor=$guarantor;
	}

	public function getAddress(){
		return $this->address;
	}

	public function setAddress($address){
		$this->address=$address;
	}

	public function getSchool(){
		return $this->school;
	}

	public function setSchool($school){
		$this->school=$school;
	}

	public function getTelephone(){
		return $this->telephone;
	}

	public function setTelephone($telephone){
		$this->telephone=$telephone;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email=$email;
	}




	public function assignInfo($memNo){
		$result= $this->getInfo($memNo);
		$this->setName($result[0]['Name']);
		$this->setPassword($result[0]['Password']);
		$this->setMemNo($result[0]['MembershipNo']);
		$this->setRegDate($result[0]['RegistrationDate']);
		$this->setExpDate($result[0]['ExpirationDate']);
		$this->setBirthday($result[0]['Birthday']);
		$this->setGuarantor($result[0]['Guarantor']);
		$this->setAddress($result[0]['Address']);
		$this->setSchool($result[0]['School']);
		$this->setTelephone($result[0]['Telephone']);
		$this->setEmail($result[0]['email']);
		
	}

	
	public function checkPassword($memNo,$psw,$newpassword,$repsw){
		$repsw = md5($repsw);
		$psw=md5($psw);
		$newpassword=md5($newpassword);
		$passw = $this->assignInfo($memNo);
		$passwo = $this->getPassword(); 
		
		
		if ($passwo==$psw  &&  $repsw==$newpassword){
			$this->updatePassword($memNo,$newpassword);
			return 0;
			
		}else if($repsw!=$newpassword){
			return 1;

		}else if($passwo!=$psw){
			return 2;
		}
		
	}


	public function UserLogin($memNo, $password){
	    $rows = $this->getUserLoginInfo($memNo, $password);
        if($rows)
        {
            return true;
        }
        else
        {
            $this->error = "Wrong Data";
        }
    }

}
?>