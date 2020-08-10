<?php
include "";
Class AdminModel{
	private $editable;

	public function setBehaviour($editable){
		$this->editable=$editable;
	}
	public function insert(){
		$editable->insertData();
	}
}
Interface Editable{
	public function insertData();
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
	
	public function _constructor($barcode,$isbn,$subject,$title,$sub,$author,$editor,$publisher,$section,$place,$date,$pages,$price,$dim,$cd){
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
	}
	public function insertData(){
		
	}
	
}
Class Newspaper implements Editable{
	private $id;
	private $name;
	private $time;

	public function _constructor($id,$name,$time){
		$this->id=$id;
		$this->name=$name;
		$this->time=$time;
	}
	public function insertData(){
		$sql = "INSERT INTO `newspaper` (`NewspaperID`, `NewspaperName`, `TimePeriod`) VALUES ('$id', '$name', '$time')";
		$query = $dbh->prepare($sql);
		$query->bindParam(':id',$id,PDO::PARAM_STR);
		$query->bindParam(':name',$name,PDO::PARAM_STR);
		$query->bindParam(':time',$time,PDO::PARAM_STR);
		
		$nrows =$pdo->exec();
		return $nrows;
	}
}
Class Author implements Editable{
	private $first;
	private $last;

	public function _constructor(){
		$this->first=$first;
		$this->last=$last;
	}
	public function insertData(){
	 
		$nrows =$pdo->exec("INSERT INTO `author` (`FirstName`, `LastName`) VALUES ('$first', '$last')");
		return $nrows;
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
	public function insertData(){
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
	public function insertData(){
		$query = "INSERT INTO `staff` (`StaffID`, `Name`, `Post`,'Address','ContactNo','UserName','Password') VALUES ('$staffID', '$name', '$post','$address','$contactNo','$userName','$password')";
		$nrows =$pdo->exec("INSERT INTO `author` (`FirstName`, `LastName`) VALUES ('$first', '$last')");
		return $nrows;
		
	}
}
Class Deposite implements editable{

}
Class BorrowSession implements editable{

}
Class Category implements editable{
	
}


  



?>