<?php
include('../model/creationModel.model.php');
//include('../model/adminModel.model.php');
//include('../controller/adminController.controller.php');


/*$ob = new Admin();
$re = $ob->getAdminInfo('1');

$name= $re[0]['Name'];

Interface IAdmin{

	public function update(IUser $user_in);
}


Interface IUser{
	public function attach(IAdmin $admin_in);
	public function detach(IAdmin $admin_in);
	public function notify();

}


class AdminObserver implements IAdmin{

	private $staffID;
	private $name;

	public function AdminObserver($staffID,$name){
		$this->staffID=$staffID;
		$this->name=$name;

	}

	public function update(IUser $user_in){
		$update=new Creation();
		$updOb=$update->getCreationalInfo();
		echo $updOb->rowCount();
		

	}
}

class UserSubject implements IUser{
	private $adminObservers = array();

	
	public function attach(IAdmin $admin_in){
		$this->adminObservers[] = $admin_in;

	}

	public function detach(IAdmin $admin_in){
		foreach ($this->adminObservers as $okey => $oval) {
			if($oval==$admin_in){
				unset($this->adminObservers[$okey]);

			}
		}
	}


	public function notify(){
		foreach ($this->adminObservers as $obs) {
			$obs->update($this);
		}
	}
}

$adObs=new AdminObserver('1',$name);
$userSub = new UserSubject();
$userSub->attach($adObs);
$userSub->notify();



?>
*/
Interface ICreation{
	public function setInfo($me,$fileName,$fileTmpName);
	public function addCreation();
}

class AdminCreation implements ICreation{
	private $me;
	private $fileName;
	private $fileActualExt;

	public function setInfo($me,$fileName,$fileActualExt){
		
		$this->me=$me;
		$this->fileName=$fileName;
		$this->fileActualExt=$fileActualExt;
	}


	public function addCreation()
    {
    	$o=new Creation();
    	$str='1';
    	$o->addCreationalInfo($this->me,$this->fileName,$this->fileActualExt,$str);
    }
}


class UserCreation implements ICreation{

	private $me;
	private $fileName;
	private $fileActualExt;

	public function setInfo($me,$fileName,$fileActualExt){
		
		$this->me=$me;
		$this->fileName=$fileName;
		$this->fileActualExt=$fileActualExt;

		
	}

	public function addCreation()
    {
    	
    	$o=new Creation();
    	$str='0';
    	$o->addCreationalInfo($this->me,$this->fileName,$this->fileActualExt,$str);

    	
    }
}

class CreationMaker{
	private $common;
	


	public function CreationMaker(ICreation $common){
		$this->common = $common;
		
		
	}


	public function setInfo($me,$fileName,$fileActualExt){
		
		
		$this->common->setInfo($me,$fileName,$fileActualExt);
		

		return $this;
	}

	public function addCreation(){

		$this->common->addCreation();
		

	}

	

}

class Notification{

	public function notify(){
		$update=new Creation();
		$updOb=$update->getCreationalInfo();
		echo $updOb->rowCount();

	}
}

$obj=new Notification();
$obj->notify();
