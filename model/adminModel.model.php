<?php
	include_once '../include/dbconnection.inc.php';
	include_once '../controller/adminController.controller.php';
	Class Admin  extends dbconnection { 
		
		public function insertBook($barcode,$isbn,$subject,$title,$sub,$author1,$author2,$editor,$publisher,$section,$place,$date,$pages,$price,$dim,$cd,$categary){ 
			
			
			
			$sql = "INSERT INTO `book`(`BarcodeNo`, `ISBN`, `Subject`, `Title`, `SubTitle`, `Editor`, `Publisher`, `Section`, `PublishedPlace`, `PublishedDate`, `NumberOfPages`, `Price`, `Dimentions`, `CDIncluded`, `Availale`, `Deleted`, `Author`, `CallNo`) VALUES ('$barcode','$isbn','$subject','$title','$sub','$editor','$publisher','$section','$place','$date','$pages','$price','$dim','$cd','1','0',(SELECT AuthorID FROM author WHERE FirstName = '$author1' AND LastName='$author2'),(SELECT callnumber FROM callnumber WHERE description = '$categary'))";
			
			$query = $this->connectInDifferentWay();
			
			$result=mysqli_query($query,$sql) or die(mysqli_error($query)) ;
				
				
				
			
				if ($result==true) {
					return true;
				  } else {
					return false;
				  }
			
		}
		public function insertNewspaper($id,$name,$time){
				 
			
				$sql = "INSERT INTO `newspaper`(`NewspaperID`, `NewspaperName`, `TimeDuration`, `Availability`) VALUES ('$id','$name',$time,'0')";
				$query=$this->connectInDifferentWay();
				$result=mysqli_query($query,$sql) or die(mysqli_error($query));
				
				
				
			
				if ($result==true) {
					return true;
				  } else {
					return false;
				  }
					
		}
		public function insertAuthor($id,$fname,$lname){
		
				 
			
				$sql = "INSERT INTO `author`(`AuthorID`, `FirstName`, `Lastname`) VALUES (,?,?)";
			
				$query = $this->connect()->prepare($sql);
			
				$query->execute([$id,$fname,$lname]);
				$query=$query->fetchAll();
				
				if ("SELECT @@Rowcount">0) {
					return true;
				  } else {
					return false;
				  }
			
			

		}
		public function insertMember(){
		
				 
			
				$sql = "INSERT INTO `member`(`MembershipNo`, `RegistrationDate`, `Name`, `Address`,'Birthday','School','Telephone','email','DepositeReceiptNo','ExpirationDate','Guarantor','Password','Deleted') VALUES ('$memNo','$date','$name',$address','$birthday','$school','$tele','$email',(SELECT ReceiptNo FROM deposite WHERE MembershipNo = '$memNo'),'$expirationDate','$guarantor','$password','0')";
				$query=$this->connectInDifferentWay();
				$result=mysqli_query($query,$sql) or die(mysqli_error($query));
				
				
				
			
				if ($result==true) {
					return true;
				  } else {
					return false;
				  }
			
			
		}
		public function insertStaff(){
			$sql = "INSERT INTO `member`(`MembershipNo`, `RegistrationDate`, `Name`, `Address`,'Birthday','School','Telephone','email','DepositeReceiptNo','ExpirationDate','Guarantor','Password','Deleted') VALUES ('$memNo','$date','$name',$address','$birthday','$school','$tele','$email',SELECT ,'$expirationDate','$guarantor','$password','0')";
				$query=$this->connectInDifferentWay();
				$result=mysqli_query($query,$sql) or die(mysqli_error($query));
				
				
				
			
				if ($result==true) {
					return true;
				  } else {
					return false;
				  }
			
		}
		public function insertBorrowSession(){
			try{
				 
			
				$sql = "INSERT INTO `newspaper`(`NewspaperID`, `NewspaperName`, `TimeDuration`, `Availability`) VALUES ('$id','$name',$time,'0')";
				$query=$this->connectInDifferentWay();
				$result=mysqli_query($query,$sql) or die(mysqli_error($query));
				
				
				
			
				if ($result==true) {
					return true;
				  } else {
					return false;
				  }
			}
			catch(PDOException $ex){
				die($ex->getMessage());
				return false;
			}
		}


		public function getAdminInfo($staffID){
	 		$sql = "SELECT * FROM staff WHERE StaffID= ?";
			$query = $this->connect()->prepare($sql);
			$query->execute([$staffID]);
			$query = $query->fetchAll();
			return $query;
	 }

	}