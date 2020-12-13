<?php
include "../model/adminModel.model.php";
Class Admincontroller extends Admin {
	private $editable;
	private $value;
	private static $instance;

	private function Admincontroller(){}
	public static function getInstance()
    {
        if(!isset(self::$instance)){
            self::$instance = new Admincontroller();
		}
		
        return self::$instance;
    }
	
	public function insert($editable){
	
		$this->editable=$editable;
		$adminModel=Admin::getInstance();
		$msg=$this->editable->insertData($adminModel);
		
		return($msg);
	}
	public function remove($editable){
		$this->editable=$editable;
		$adminModel=Admin::getInstance();
		$msg=$this->editable->removeData($adminModel);
		return($msg);
	}
	public function update($editable){
		$this->editable=$editable;
		$adminModel=Admin::getInstance();
		$msg=$this->editable->updateData($adminModel);
		return($msg);
	}
	public function updateNewspaper($editable,$value){
		$this->editable=$editable;
		$this->value=$value;
		$adminModel=Admin::getInstance();
		$msg=$this->editable->updateStatus($adminModel,$value);
		return($msg);
	}
	public function load($editable){
		$this->editable=$editable;
		$adminModel=Admin::getInstance();
		$storeArray=$this->editable->loadData($adminModel);
		return ($storeArray );
	}
	public function expire($editable){
		$this->editable=$editable;
		$adminModel=Admin::getInstance();
		$msg=$this->editable->expireStatus($adminModel);
		return($msg);
	}
	public function showData($editable){
		
		$this->editable=$editable;
		$adminModel=Admin::getInstance();
		$data=$this->editable->showData($adminModel);
		return($data);
	}

}
Interface Editable{
	
	public function insertData($adminModel);
	public function removeData($adminModel);
}

Class AdminLogin extends Admin{

    private static $instance;
    private function __construct(){}

    public static function getInstance()
    {
        if(!isset(self::$instance)){
            self::$instance = new AdminLogin();
        }
        return self::$instance;
    }

    public function LogAdmin($userName, $password){
        $rows = $this->getAdminLoginInfo($userName, $password);
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


Class Book implements Editable{
	private $barcode;
	private $isbn;
	private $subject;
	private $title;
	private $sub;
	private $author;
	private $editor;
	private $publisher;
	private $section;
	private $place;
	private $date;
	private $pages;
	private $price;
	private $dim;
	private $cd;
	private $categary;
	public static $books = array();
	
	private function Book(){}

	public function setBook($barcode,$isbn,$subject,$title,$sub,$author,$editor,$publisher,$section,$place,$date,$pages,$price,$dim,$cd,$categary){
		
		$this->barcode=$barcode;
		$this->isbn=$isbn;
		$this->subject=$subject;
		$this->title=$title;
		$this->sub=$sub;
		$this->author=$author;
		$this->editor=$editor;
		$this->publisher=$publisher;
		$this->section=$section;
		$this->place=$place;
		$this->date=$date;
		$this->pages=$pages;
		$this->price=$price;
		$this->dim=$dim;
		$this->cd=$cd;
		$this->categary=$categary;
		
		
	}
	public static function getInstance($key)
    {
        if(!array_key_exists($key,self::$books)){
			self::$books[$key] = new self();

        }
        return self::$books[$key];
    }
	public function insertData($adminModel){
		
		
		
		$success=$adminModel->insertBook($this->barcode,$this->isbn,$this->subject,$this->title,$this->sub,$this->author,$this->editor,$this->publisher,$this->section,$this->place,$this->date,$this->pages,$this->price,$this->dim,$this->cd,$this->categary);
		
		if($success==1){
			$msg="Success";
		}else{
			$msg="Error";
		}
		$success=0;
		return($msg);
	}
	public function removeData($adminModel){
		
		$success=$adminModel->removeBook($this->barcode);

		if($success==1){
			$msg="Success";
		}else{
			$msg="Error";
		}
		$success=0;
		return($msg);
	}
	public function updateData($adminModel){
		$success=$adminModel->updateBook($this->barcode);
		if($success==1){
			$msg="Successfully Updated";
		}else{
			$msg="Error in Updating";
		}
		$success=0;
		return($msg);
	}
	public function showData($adminModel){
		
		$data=$adminModel->showBook();
		return ($data);
	}

	
}
Class Newspaper implements Editable{
	private $id;
	private $name;
	private $time;
	public static $newspapers=array();
	private $value;

	private function Newspaper(){}

	public function setNewspaper($id,$name,$time){
		$this->id=$id;
		$this->name=$name;
		$this->time=$time;
		
	}
	public static function getInstance($key)
    {
        if(!array_key_exists($key,self::$newspapers)){
			self::$newspapers[$key] = new self();
			
        }
        return self::$newspapers[$key];
    }
	public function insertData($adminModel){
		
		$success=$adminModel->insertNewspaper($this->id,$this->name,$this->time);
		
		if($success==1){
			$msg="Success";
		}else{
			$msg="Error";
		}
		$success=0;
		return($msg);
		
	}
	public function removeData($adminModel){
		
		$success=$adminModel->removeNewspaper($this->id);
		if($success==1){
			$msg="Success";
		}else{
			$msg="Error";
		}
		$success=0;
		return($msg);
	}
	public function loadData($adminModel){
		$storeArray=Array();
		$storeArray=$adminModel->loadNewspaper();
		
		return($storeArray);
		
	}
	public function updateStatus($adminModel,$value){
		$success=$adminModel->updateNewspaperStatus($value);
		if($success==1){
			$msg="Successfully Updated!";
		}else{
			$msg="Error";
		}
		$success=0;
		return($msg);
	}
	public function expireStatus($adminModel){
		
		$success=$adminModel->expireNewspaper();
		if($success==1){
			$msg="Successfully Updated!";
		}else{
			$msg="Error";
		}
		$success=0;
		return($msg);
	}
	public function showData($adminModel){
		
		$data=$adminModel->showNewspaper();
		return ($data);
	}
}
Class Member implements Editable{
	private $memNo;
	private $name;
	private $address;
	private $birthday;
	private $school;
	private $tele;
	private $email;
	private $expirationDate;
	private $guarantor;
	private $receiptNo;
	public static $members=array();

	public function Memeber(){}
	
	public function setMember($memNo,$name,$address,$birthday,$school,$tele,$email,$expirationDate,$guarantor,$receiptNo){
		$this->memNo=$memNo;
		$this->name=$name;
		$this->address=$address;
		$this->birthday=$birthday;
		$this->school=$school;
		$this->tele=$tele;
		$this->email=$email;
		$this->expirationDate=$expirationDate;
		$this->guarantor=$guarantor;
		$this->receiptNo=$receiptNo;
	
	}
	public static function getInstance($key)
    {
        if(!array_key_exists($key,self::$members)){
			self::$members[$key] = new self();
			
        }
        return self::$members[$key];
    }
	public function insertData($adminModel){
		
		$success=$adminModel->insertMember($this->memNo,$this->name,$this->address,$this->birthday,$this->school,$this->tele,$this->email,$this->receiptNo,$this->expirationDate,$this->guarantor);
		if($success==1){
			$msg="Success";
		}else{
			$msg="Error";
		}
		$success=0;
		return($msg);
		
	}
	public function removeData($adminModel){
		$success=$adminModel->removeMember($this->memNo);
		if($success==1){
			$msg="Success";
		}else{
			$msg="Error";
		}
		$success=0;
		return($msg);
	}
	public function updateData($adminModel){
		echo($this->receiptNo);
		$success=$adminModel->updateMember($this->memNo,$this->receiptNo,$this->expirationDate);
		if($success==1){
			$msg="Success";
		}else{
			$msg="Error";
		}
		$success=0;
		return($msg);
	}
	public function showData($adminModel){
		
		$data=$adminModel->showMember();
		return ($data);
	}
	
}
Class Staff implements Editable{
	private $id;
	private $name;
	private $post;
	private $address;
	private $contNo;
	private $username;
	private $password;
	private static $staffMembers=array();

	private function Staff(){}

	public function setStaff($id,$name,$post,$address,$contNo,$username,$password){
		$this->id=$id;
		$this->name=$name;
		$this->post=$post;
		$this->address=$address;
		$this->contNo=$contNo;
		$this->username=$username;
		$this->password=md5($password);
		
	}
	public static function getInstance($key)
    {
        if(!array_key_exists($key,self::$staffMembers)){
			self::$staffMembers[$key] = new self();
			
        }
        return self::$staffMembers[$key];
    }
	public function insertData($adminModel){
		
		$success=$adminModel->insertStaff($this->id,$this->name,$this->post,$this->address,$this->contNo,$this->username,$this->password);
		if($success==1){
			$msg="Success";
		}else{
			$msg="Error";
		}
		$success=0;
		
		return($msg);
		
	}
	public function removeData($adminModel){
		$success=$adminModel->removeStaff($this->id);
		if($success==1){
			$msg="Success";
		}else{
			$msg="Error";
		}
		$success=0;
		return($msg);
	}
	public function showData($adminModel){
		
		$data=$adminModel->showStaff();
		return ($data);
	}
}
Class Deposite implements editable{
	private $memNo;
	private $receiptNo;
	private $amount;
	private $description;
	private $name;
	private $staffID;
	private static $instance;

	private function Deposite(){}

	public function setDeposite($memNo,$receiptNo,$amount,$description,$name,$staffID){
		$this->memNo=$memNo;
		$this->receiptNo=$receiptNo;
		$this->amount=$amount;
		$this->description=$description;
		$this->name=$name;
		$this->staffID=$staffID;
		
	}
	public static function getInstance()
    {
        if(!isset(self::$instance)){
            self::$instance = new Deposite();
        }
        return self::$instance;
    }
	public function insertData($adminModel){
		
		$success=$adminModel->insertDeposite($this->memNo,$this->receiptNo,$this->amount,$this->description,$this->name,$this->staffID);
		if($success==1){
			$msg="Success";
		}else{
			$msg="Error";
		}
		$success=0;
		return($msg);
		
	}
	public function removeData($adminModel){
		$success=$adminModel->removeBook($this->barcode);
		if($success==1){
			$msg="Success";
		}else{
			$msg="Error";
		}
		$success=0;
		return($msg);
	}
}
Class BorrowSession implements editable{
	private $barcode;
	private $memNo;
	private $expirationDate;
	private $returnDate;
	private $staffid;
	private $receiptNo;
	private static $instance;
	
	private function BorrowSession(){}

	public function setBorrowSession($id,$barcode,$memNo,$expirationDate,$returnDate,$staffid,$receiptNo){
		$this->id=$id;
		$this->barcode=$barcode;
		$this->memNo=$memNo;
		$this->expirationDate=$expirationDate;
		$this->returnDate=$returnDate;
		$this->staffid=$staffid;
		$this->receiptNo=$receiptNo;
		
	}
	public static function getInstance()
    {
        if(!isset(self::$instance)){
            self::$instance = new self();
        }
        return self::$instance;
    }
	
	public function insertData($adminModel){
		
		$success=$adminModel->insertBorrowSession($this->id,$this->barcode,$this->memNo,$this->expirationDate,$this->staffid);
		if($success==1){
			$msg1="Borrow Session is successful";
		}else{
			$msg1="Error in borrow session";
		}
		$success=0;
		return($msg1);
		
	}
	public function removeData($adminModel){
		return true;
	}
	public function updateData($adminModel){
		$fine=$adminModel->updateBorrowSession($this->id,$this->returnDate,$this->receiptNo);
		if($fine>=0){
			$msg1="Your fine charges=$fine";
		}else{
			$msg1="error";
		}
		$success=0;
		return($msg1);
	}
}



  



?>