<?php
include "../model/adminModel.model.php";
Class Admincontroller extends Admin {
	private $editable;
	private $value;
	private static $instance;

	public static function getInstance()
    {
        if(!isset(self::$instance)){
            self::$instance = new AdminController();
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
	private static $instance;
	
	public function Book($barcode,$isbn,$subject,$title,$sub,$author,$editor,$publisher,$section,$place,$date,$pages,$price,$dim,$cd,$categary){
		
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
	public static function getInstance($barcode,$isbn,$subject,$title,$sub,$author,$editor,$publisher,$section,$place,$date,$pages,$price,$dim,$cd,$categary)
    {
        if(!isset(self::$instance)){
            self::$instance = new Book($barcode,$isbn,$subject,$title,$sub,$author,$editor,$publisher,$section,$place,$date,$pages,$price,$dim,$cd,$categary);
        }
        return self::$instance;
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

	
}
Class Newspaper implements Editable{
	private $id;
	private $name;
	private $time;
	private static $instance;
	private $value;
	public function Newspaper($id,$name,$time){
		$this->id=$id;
		$this->name=$name;
		$this->time=$time;
		
	}
	public static function getInstance($id,$name,$time)
    {
        if(!isset(self::$instance)){
            self::$instance = new Newspaper($id,$name,$time);
        }
        return self::$instance;
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
	private static $instance;

	public function Member($memNo,$name,$address,$birthday,$school,$tele,$email,$expirationDate,$guarantor,$receiptNo){
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
	public static function getInstance($memNo,$name,$address,$birthday,$school,$tele,$email,$expirationDate,$guarantor,$receiptNo)
    {
        if(!isset(self::$instance)){
            self::$instance = new Member($memNo,$name,$address,$birthday,$school,$tele,$email,$expirationDate,$guarantor,$receiptNo);
        }
        return self::$instance;
    }
	public function insertData($adminModel){
		
		$success=$adminModel->insertMember($this->memNo,$this->name,$this->address,$this->birthday,$this->school,$this->tele,$this->email,$this->expirationDate,$this->guarantor);
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
		$success=$adminModel->updateMember($this->memNo,$this->receiptNo,$this->expirationDate);
		if($success==1){
			$msg="Success";
		}else{
			$msg="Error";
		}
		$success=0;
		return($msg);
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
	private static $instance;

	public function Staff($id,$name,$post,$address,$contNo,$username,$password){
		$this->id=$id;
		$this->name=$name;
		$this->post=$post;
		$this->address=$address;
		$this->contNo=$contNo;
		$this->username=$username;
		$this->password=md5($password);
		
	}
	public static function getInstance($id,$name,$post,$address,$contNo,$username,$password)
    {
        if(!isset(self::$instance)){
            self::$instance = new Staff($id,$name,$post,$address,$contNo,$username,$password);
		}
		
        return self::$instance;
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
}
Class Deposite implements editable{
	private $receiptNo;
	private $amount;
	private $description;
	private $memNo;
	private $staffID;
	private static $instance;

	public function Deposite($receiptNo,$amount,$description,$memNo,$staffID){
		$this->receiptNo=$receiptNo;
		$this->amount=$amount;
		$this->description=$description;
		$this->memNo=$memNo;
		$this->staffID=$staffID;
		
	}
	public static function getInstance($receiptNo,$amount,$description,$memNo,$staffID)
    {
        if(!isset(self::$instance)){
            self::$instance = new Deposite($receiptNo,$amount,$description,$memNo,$staffID);
        }
        return self::$instance;
    }
	public function insertData($adminModel){
		
		$success=$adminModel->insertDeposite($this->receiptNo,$this->amount,$this->description,$this->memNo,$this->staffID);
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

	public function BorrowSession($id,$barcode,$memNo,$expirationDate,$returnDate,$staffid,$receiptNo){
		$this->id=$id;
		$this->barcode=$barcode;
		$this->memNo=$memNo;
		$this->expirationDate=$expirationDate;
		$this->returnDate=$returnDate;
		$this->staffid=$staffid;
		$this->receiptNo=$receiptNo;
		
	}
	public static function getInstance($id,$barcode,$memNo,$expirationDate,$returnDate,$staffid,$receiptNo)
    {
        if(!isset(self::$instance)){
            self::$instance = new BorrowSession($id,$barcode,$memNo,$expirationDate,$returnDate,$staffid,$receiptNo);
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
			$msg1=$fine;
		}else{
			$msg1=$fine;
		}
		$success=0;
		return($msg1);
	}
}



  



?>