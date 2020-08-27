<?php
	include_once '../include/dbconnection.inc.php';
	include_once '../controller/adminController.controller.php';
	Class Admin  extends dbconnection {
		private static $instance;

		public static function getInstance()
    	{
        	if(!isset(self::$instance)){
            	self::$instance = new Admin();
        	}
        	return self::$instance;
    	} 
		
		public function insertBook($barcode,$isbn,$subject,$title,$sub,$author,$editor,$publisher,$section,$place,$date,$pages,$price,$dim,$cd,$categary){ 
				
			$sql = "INSERT INTO `book`(`BarcodeNo`, `ISBN`, `Subject`, `Title`, `SubTitle`, `Editor`, `Publisher`, `Section`, `PublishedPlace`, `PublishedDate`, `NumberOfPages`, `Price`, `Dimentions`, `CDIncluded`, `Availale`, `Deleted`, `Author`, `CallNo`) VALUES ('$barcode','$isbn','$subject','$title','$sub','$editor','$publisher','$section','$place','$date','$pages','$price','$dim','$cd','1','0','$author',(SELECT callnumber FROM callnumber WHERE description = '$categary'))";
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
		public function insertMember($memNo,$name,$address,$birthday,$school,$tele,$email,$expirationDate,$guarantor){
		
			$sql = "INSERT INTO `member`(`MembershipNo`, `RegistrationDate`, `Name`, `Address`, `Birthday`, `School`, `Telephone`, `email`, `DepositeReceiptNo`, `ExpirationDate`, `Guarantor`,  `Deleted`) VALUES ('$memNo',curDate(),'$name','$address','$birthday','$school','$tele','$email',(SELECT ReceiptNo FROM deposit WHERE MembershipNo = '$memNo'),'$expirationDate','$guarantor','0')";
			$query=$this->connectInDifferentWay();
			$result=mysqli_query($query,$sql) or die(mysqli_error($query));
				
			if ($result==true) {
				return true;
			} else {
				return false;
			}
					
		}
		public function insertStaff($id,$name,$post,$address,$contNo,$username,$password){
			
			$sql = "INSERT INTO `staff`(`StaffID`, `Name`, `Post`, `Address`, `ContactNo`, `UserName`, `Password`, `Deleted`) VALUES ('$id','$name','$post','$address','$contNo','$username','$password','0')";
			$query=$this->connectInDifferentWay();
			$result=mysqli_query($query,$sql) or die(mysqli_error($query));
				
			if ($result==true) {
				return true;
			} else {
				return false;
			}
			
		}
		public function insertBorrowSession($id,$barcode,$memNo,$expirationDate,$staffid){
				 
			$sql = "INSERT INTO `borrowsession`(`BorrowSessionID`, `BarcodeNo`, `MembershipNo`, `CurDate`, `ExpirationDate`, `StaffID`) VALUES  ('$id','$barcode','$memNo',curdate(),'$expirationDate','$staffid')";
			$query=$this->connectInDifferentWay();
			$result=mysqli_query($query,$sql) or die(mysqli_error($query));
				
			if ($result==true) {
				return true;
			} else {
				return false;
			}
			
			
		}
		
		public function insertDeposite($receiptNo,$amount,$description,$memNo,$staffID){
			
			$sql = "INSERT INTO `deposit`(`ReceiptNo`, `Amount`, `Description`, `CurDate`, `MembershipNo`, `Name`, `StaffID`) VALUES ('$receiptNo','$amount','$description',curdate(),'$memNo',(SELECT Name FROM member WHERE MembershipNo='$memNo'),'$staffID')";
			$query=$this->connectInDifferentWay();
			$result=mysqli_query($query,$sql) or die(mysqli_error($query));
				
			if ($result==true) {
				return true;
			} else {
				return false;
			}
		}
		public function removeBook($barcode){
			$sql ="UPDATE `book` SET `Deleted`=1 WHERE BarcodeNo=$barcode";
			$query=$this->connectInDifferentWay();
			$result=mysqli_query($query,$sql) or die(mysqli_error($query));
				
			if ($result==true) {
				return true;
			} else {
				return false;
			}
		}
		public function removeNewspaper($id){
			$sql ="UPDATE `newspaper` SET `Deleted`=1 WHERE NewspaperID=$id";
			$query=$this->connectInDifferentWay();
			$result=mysqli_query($query,$sql) or die(mysqli_error($query));
				
			if ($result==true) {
				return true;
			} else {
				return false;
			}
		}
		public function removeMember($memNo){
			$sql ="UPDATE `member` SET `Deleted`=1 WHERE MembershipNo=$memNo";
			$query=$this->connectInDifferentWay();
			$result=mysqli_query($query,$sql) or die(mysqli_error($query));
				
			if ($result==true) {
				return true;
			} else {
				return false;
			}
		}
		public function removeStaff($id){
			$sql ="UPDATE `staff` SET `Deleted`=1 WHERE StaffID=$id";
			$query=$this->connectInDifferentWay();
			$result=mysqli_query($query,$sql) or die(mysqli_error($query));
				
			if ($result==true) {
				return true;
			} else {
				return false;
			}
		}
		
		public function expireNewspaper(){
			$sql="UPDATE `newspaper` SET `Deleted`=1 WHERE ExpireDate<CURRENT_DATE";
			$query=$this->connectInDifferentWay();
			$result=mysqli_query($query,$sql) or die(mysqli_error($query));
				
			if ($result==true) {
				return true;
			} else {
				return false;
			}
		}
		public function expireMember(){
			$sql="UPDATE `member` SET `Deleted`=1 WHERE ExpirationDate<CURRENT_DATE";
			$query=$this->connectInDifferentWay();
			$result=mysqli_query($query,$sql) or die(mysqli_error($query));
				
			if ($result==true) {
				return true;
			} else {
				return false;
			}
		}

		public function updateNewspaperStatus($status,$date){
			$sql="UPDATE `newspaper` SET `Deleted`=0 WHERE ExpireDate<CURRENT_DATE";
			$query=$this->connectInDifferentWay();
			$result=mysqli_query($query,$sql) or die(mysqli_error($query));
				
			if ($result==true) {
				return true;
			} else {
				return false;
			}
		}
		public function updateMember($memNo,$receiptNo,$expirationdate){
			$sql="UPDATE `member` SET `DepositeReceiptNo`=(SELECT ReceiptNo FROM deposit WHERE MembershipNo='$memNo'),`ExpirationDate`='$expirationdate',`Deleted`='0'WHERE MembershipNo='$memNo'";
			$query=$this->connectInDifferentWay();
			$result=mysqli_query($query,$sql) or die(mysqli_error($query));

			if ($result==true) {
				return true;
			} else {
				return false;
			}
		}
		public function updateBook($barcode){
		
			$sql1="SELECT `Available` FROM `book` WHERE BarcodeNo='$barcode'";
			$sql2="UPDATE `book` SET `Available`='0' WHERE BarcodeNo='$barcode'";
			$sql3="UPDATE `book` SET `Available`='1' WHERE BarcodeNo='$barcode'";
			$query=$this->connectInDifferentWay();
			$result1=mysqli_query($query,$sql1) or die(mysqli_error($query));
			if ($result1==true) {
				
				$row=mysqli_fetch_array($result1);
				if ($row[0]=='0'){
					$result2=mysqli_query($query,$sql3) or die(mysqli_error($query));
					if ($result2==true){
						return true;
					}else{
						return false;
					}
				}else{
					
					$result3=mysqli_query($query,$sql2) or die(mysqli_error($query));
					if ($result3==true){

						return true;
					}else{
						return false;
					}
				}
			}
		}
		public function updateBorrowSession($id,$returndate,$receiptNo){
			$sql1="SELECT `ExpirationDate` FROM `borrowsession` WHERE BorrowSessionID='$id'";
			
			$query=$this->connectInDifferentWay();
			$result1=mysqli_query($query,$sql1) or die(mysqli_error($query));
			if ($result1==true) {
				$row=mysqli_fetch_array($result1);
				$expirationdate=date_create($row[0]);
				$returnDate=date_create($returndate);
				if ($expirationdate>$returnDate||$expirationdate==$returnDate){
					echo("no");
					$fine=0;
				}else{
					
					$diff=date_diff($returnDate,$expirationdate,true);
					$days=(int)($diff->format("%a"));
					$fine=$days*2;

				}
				
				$sql2 ="UPDATE `borrowsession` SET `ReturnDate`='$returndate', `Ended`='1', `Fine`='$fine' WHERE BorrowSessionID='$id'";
				$result2=mysqli_query($query,$sql2) or die(mysqli_error($query));
				if ($result2==true){
					return $fine;
				}else{
					$fine=-1;
					return $fine;
				}
			} else {
				$fine=-1;
				return $fine;
			}
		}
		public function loadNewspaper(){
			$sql="SELECT NewspaperName FROM newspaper";
			$query=$this->connectInDifferentWay();
			$result=mysqli_query($query,$sql) or die(mysqli_error($query));
			$storeArray=Array();
			
			if($result==true){

				while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
					$storeArray[]=$row['NewspaperName'];
				
				}
				return $storeArray;
					
			}
			
		}

		public function getAdminInfo($staffID){
	 		$sql = "SELECT * FROM staff WHERE StaffID= ?";
			$query = $this->connect()->prepare($sql);
			$query->execute([$staffID]);
			$query = $query->fetchAll();
			return $query;
	 }

        public function getAdminLoginInfo($userName, $password){
            $sql = "SELECT * FROM staff WHERE UserName= '$userName' and Password = '".md5($password)."'";  //'".md5($password)."' decrypting
            $result = mysqli_query($this -> connectInDifferentWay(),$sql) or die(mysql_error());
            $rows = mysqli_num_rows($result);
            return $rows;
        }

	}