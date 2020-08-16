<?php
include "../model/adminModel.model.php";
Class Admincontroller extends Admin {
	private $editable;
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
		$adminModel=new Admin();
		$msg=$this->editable->insertData($adminModel);
		return($msg);
	}
}
Interface Editable{
	
	public function insertData($adminModel);
}

Class Book implements Editable{
	private $barcode;
	private $isbn;
	private $subject;
	private $title;
	private $sub;
	private $author1;
	private $author2;
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
	
	public function Book($barcode,$isbn,$subject,$title,$sub,$author1,$author2,$editor,$publisher,$section,$place,$date,$pages,$price,$dim,$cd,$categary){
		
		$this->barcode=$barcode;
		$this->isbn=$isbn;
		$this->subject=$subject;
		$this->title=$title;
		$this->sub=$sub;
		$this->author1=$author1;
		$this->author2=$author2;
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
	public static function getInstance($barcode,$isbn,$subject,$title,$sub,$author1,$author2,$editor,$publisher,$section,$place,$date,$pages,$price,$dim,$cd,$categary)
    {
        if(!isset(self::$instance)){
            self::$instance = new Book($barcode,$isbn,$subject,$title,$sub,$author1,$author2,$editor,$publisher,$section,$place,$date,$pages,$price,$dim,$cd,$categary);
        }
        return self::$instance;
    }
	public function insertData($adminModel){
		
		
		
		$success=$adminModel->insertbook($this->barcode,$this->isbn,$this->subject,$this->title,$this->sub,$this->author1,$this->author2,$this->editor,$this->publisher,$this->section,$this->place,$this->date,$this->pages,$this->price,$this->dim,$this->cd,$this->categary);
		
		if($success==1){
			$msg="Success";
		}else{
			$msg="Error";
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
		
		$success=$adminModel->insertnewspaper($this->id,$this->name,$this->time);
		
		if($success==1){
			$msg="Success";
		}else{
			$msg="Error";
		}
		$success=0;
		return($msg);
		
	}
}
Class Author implements Editable{
	private $id;
	private $fname;
	private $lname;

	public function Author($id,$fname,$lname){
		$this->id=$id;
		$this->fname=$fname;
		$this->lname=$lname;
	}
	public function insertData($adminModel){
		
		$success=$adminModel->insertauthor($this->id,$this->fname,$this->lname);
		
		if($success==1){
			$msg="Success";
		}else{
			$msg="Error";
		}
		$success=0;
		return($msg);
		
		
	}

}
Class Member implements Editable{
	private $membershipNo;
	private $name;
	private $address;
	private $birthday;
	private $school;
	private $age;
	private $tele;
	private $email;
	private $memdate;
	private $deposite;

	public function _constructor($membershipNo,$name,$address,$birthday,$school,$age,$tele,$email,$memdate,$deposite){
		$this->membershipNo=$membershipNo;
		$this->name=$name;
		$this->address=$address;
		$this->birthday=$birthday;
		$this->school=$school;
		$this->age=$age;
		$this->tele=$tele;
		$this->email=$email;
		$this->memdate=$memdate;
		$this->deposite=$deposite;
	}
	public function insertData($adminModel){
		$query = $dbh->prepare($sql);
		$query->bindParam(':membershipNo',$membershipNo,PDO::PARAM_STR);
		$query->bindParam(':name',$name,PDO::PARAM_STR);
		$query->bindParam(':address',$address,PDO::PARAM_STR);
		$query->bindParam(':birthday',$birthday,PDO::PARAM_STR);
		$query->bindParam(':school',$school,PDO::PARAM_STR);
		$query->bindParam(':age',$age,PDO::PARAM_STR);
		$query->bindParam(':tele',$tele,PDO::PARAM_STR);
		$query->bindParam(':email',$email,PDO::PARAM_STR);
		$query->bindParam(':memdate',$memdate,PDO::PARAM_STR);
		$query->bindParam(':deposite',$deposite,PDO::PARAM_STR);
		
		$nrows =$pdo->exec("INSERT INTO `members` (`MembershipNo`, `Name`, `Address`,'Birthday','School','Age','Telephone','Email','Membershipdate','ExpirationDate') VALUES ('$membershipNo', '$name', '$address','$birthday','$school','$age','$tele','$email','$memdate','$deposite',$memdate+365*($deposite//1000))");
		return $nrows;
		
	}
}
Class Staff implements Editable{
	private $staffID;
	private $name;
	private $post;
	private $address;
	private $contactNo;
	private $userName;
	private $password;

	public function _constructor($staffID,$name,$post,$address,$contactNo,$userName,$password){
		$this->staffID=$staffID;
		$this->name=$name;
		$this->post=$post;
		$this->address=$address;
		$this->contactNo=$contactNo;
		$this->userName=$userName;
		$this->password=$password;
	}
	public function insertData($adminModel){
		$query = "INSERT INTO `staff` (`StaffID`, `Name`, `Post`,'Address','ContactNo','UserName','Password') VALUES ('$staffID', '$name', '$post','$address','$contactNo','$userName','$password')";
		$nrows =$pdo->exec("INSERT INTO `author` (`FirstName`, `LastName`) VALUES ('$first', '$last')");
		return $nrows;
		
	}
}
Class Deposite implements editable{
	private $staffID;
	private $name;
	private $post;
	private $address;
	private $contactNo;
	private $userName;
	private $password;

	public function _constructor($staffID,$name,$post,$address,$contactNo,$userName,$password){
		$this->staffID=$staffID;
		$this->name=$name;
		$this->post=$post;
		$this->address=$address;
		$this->contactNo=$contactNo;
		$this->userName=$userName;
		$this->password=$password;
	}
	public function insertData($adminModel){
		$query = "INSERT INTO `staff` (`StaffID`, `Name`, `Post`,'Address','ContactNo','UserName','Password') VALUES ('$staffID', '$name', '$post','$address','$contactNo','$userName','$password')";
		$nrows =$pdo->exec("INSERT INTO `author` (`FirstName`, `LastName`) VALUES ('$first', '$last')");
		return $nrows;
		
	}
}
Class BorrowSession implements editable{
	private $staffID;
	private $name;
	private $post;
	private $address;
	private $contactNo;
	private $userName;
	private $password;

	public function _constructor($staffID,$name,$post,$address,$contactNo,$userName,$password){
		$this->staffID=$staffID;
		$this->name=$name;
		$this->post=$post;
		$this->address=$address;
		$this->contactNo=$contactNo;
		$this->userName=$userName;
		$this->password=$password;
	}
	public function insertData($adminModel){
		$query = "INSERT INTO `staff` (`StaffID`, `Name`, `Post`,'Address','ContactNo','UserName','Password') VALUES ('$staffID', '$name', '$post','$address','$contactNo','$userName','$password')";
		$nrows =$pdo->exec("INSERT INTO `author` (`FirstName`, `LastName`) VALUES ('$first', '$last')");
		return $nrows;
		
	}
}
Class Category implements editable{
	private $staffID;
	private $name;
	private $post;
	private $address;
	private $contactNo;
	private $userName;
	private $password;

	public function _constructor($staffID,$name,$post,$address,$contactNo,$userName,$password){
		$this->staffID=$staffID;
		$this->name=$name;
		$this->post=$post;
		$this->address=$address;
		$this->contactNo=$contactNo;
		$this->userName=$userName;
		$this->password=$password;
	}
	public function insertData($adminModel){
		$query = "INSERT INTO `staff` (`StaffID`, `Name`, `Post`,'Address','ContactNo','UserName','Password') VALUES ('$staffID', '$name', '$post','$address','$contactNo','$userName','$password')";
		$nrows =$pdo->exec("INSERT INTO `author` (`FirstName`, `LastName`) VALUES ('$first', '$last')");
		return $nrows;
		
	}
}


  



?>