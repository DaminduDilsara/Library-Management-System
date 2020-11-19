<?php
include('../model/creationModel.model.php');

abstract class ICreation{

	public $me;
	public $fileName;
	public $fileActualExt;

	public function setInfo($me,$fileName,$fileActualExt){
		$this->me=$me;
		$this->fileName=$fileName;
		$this->fileActualExt=$fileActualExt;

	}
	public abstract function addCreation();
}

class AdminCreation extends ICreation{

	public function setInfo($me,$fileName,$fileActualExt){
		parent::setInfo($me,$fileName,$fileActualExt);
	}
	
	public function addCreation(){
    
    	$o=new Creation();
    	$str='1';
		$o->addCreationalInfo($this->me,$this->fileName,$this->fileActualExt,$str);
    }
}


class UserCreation extends ICreation{

	public function setInfo($me,$fileName,$fileActualExt){
		parent::setInfo($me,$fileName,$fileActualExt);
	}

	public function addCreation(){
    
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
		
	}

	public function addCreation(){

		$this->common->addCreation();
		

	}

	

}

<<<<<<< HEAD
class Notification{

	public function notify(){
		$update=new Creation();
		$updOb=$update->getCreationalInfo();
		echo $updOb->rowCount();

	}
}

$obj=new Notification();
$obj->notify();
=======
>>>>>>> f19fbfa3d81575d1ef743fca7123c29d3f865008
