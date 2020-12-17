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
				
			$sql = "INSERT INTO `book`(`BarcodeNo`, `ISBN`, `Subject`, `Title`, `SubTitle`, `Editor`, `Publisher`, `Section`, `PublishedPlace`, `PublishedDate`, `NumberOfPages`, `Price`, `Dimentions`, `CDIncluded`, `Available`, `Deleted`, `Author`, `CallNo`) VALUES ('$barcode','$isbn','$subject','$title','$sub','$editor','$publisher','$section','$place','$date','$pages','$price','$dim','$cd','1','0','$author',(SELECT callnumber FROM callnumber WHERE description = '$categary'))";
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
		public function insertMember($memNo,$name,$address,$birthday,$school,$tele,$email,$depositeNo,$expirationDate,$guarantor){
			
				$sql = "INSERT INTO `member`(`MembershipNo`, `RegistrationDate`, `Name`, `Address`, `Birthday`, `School`, `Telephone`, `email`, `DepositeReceiptNo`, `ExpirationDate`, `Guarantor`,  `Deleted`) VALUES ('$memNo',curDate(),'$name','$address', '$birthday' ,'$school',$tele,'$email','$depositeNo','$expirationDate','$guarantor','0')";
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
		
		public function insertDeposite($memNo,$receiptNo,$amount,$description,$name,$staffID){
			
			$sql = "INSERT INTO `deposit`(`ReceiptNo`, `Amount`, `Description`, `CurDate`, `Name`,`MembershipNo`, `StaffID`) VALUES ('$receiptNo','$amount','$description',curdate(),'$name','$memNo','$staffID')";
			
			$query=$this->connectInDifferentWay();
			$result=mysqli_query($query,$sql) or die(mysqli_error($query));
				
			if ($result==true) {
				return true;
			} else {
				return false;
			}
		}
		public function removeBook($barcode){
			
			$sql ="UPDATE `book` SET `Deleted`=1 WHERE BarcodeNo=$barcode AND Deleted=0";
			
			$query=$this->connectInDifferentWay();
			
			$result=mysqli_query($query,$sql) or die(mysqli_error($query));
			
			if ($result==true and mysqli_affected_rows($query)>0) {
				return true;
			} else {
				return false;
			}
		}
		public function removeNewspaper($id){
			$sql ="UPDATE `newspaper` SET `Deleted`=1 WHERE NewspaperID=$id AND Deleted=0";
			$query=$this->connectInDifferentWay();
			$result=mysqli_query($query,$sql) or die(mysqli_error($query));
				
			if ($result==true and mysqli_affected_rows($query)>0) {
				return true;
			} else {
				return false;
			}
		}
		public function removeMember($memNo){
			$sql ="UPDATE `member` SET `Deleted`=1 WHERE MembershipNo=$memNo AND Deleted=0";
			$query=$this->connectInDifferentWay();
			$result=mysqli_query($query,$sql) or die(mysqli_error($query));
				
			if ($result==true and mysqli_affected_rows($query)>0) {
				return true;
			} else {
				return false;
			}
		}
		public function removeStaff($id){
			$sql ="UPDATE `staff` SET `Deleted`=1 WHERE StaffID=$id AND Deleted=0";
			$query=$this->connectInDifferentWay();
			$result=mysqli_query($query,$sql) or die(mysqli_error($query));
				
			if ($result==true and mysqli_affected_rows($query)>0) {
				return true;
			} else {
				return false;
			}
		}
		
		public function updatePayment($receiptNo,$id){
			$sql="UPDATE `borrowsession` SET `ReceiptNo`='$receiptNo',`Fine`='0'WHERE BorrowSessionID='$id'";
			$query=$this->connectInDifferentWay();
			
			$result=mysqli_query($query,$sql) or die(mysqli_error($query));

			if ($result==true) {
				return true;
			} else {
				return false;
			}
		}
		

		public function updateNewspaperStatus($value){
			$sql1="SELECT `TimeDuration`FROM `newspaper` WHERE NewspaperName='$value'";
			$query=$this->connectInDifferentWay();
			$result1=mysqli_query($query,$sql1) or die(mysqli_error($query));
			if ($result1==true){
				$row=mysqli_fetch_array($result1);
				$time=$row[0];
			
				if($time=="1"){
					$sql="UPDATE `newspaper` SET `Availability`=1,`ExpireDate`=DATE_ADD(CURRENT_DATE,INTERVAL 1 DAY) WHERE NewspaperName='$value'";
					$result=mysqli_query($query,$sql) or die(mysqli_error($query));
				}elseif ($time=="7"){
					$sql="UPDATE `newspaper` SET `Availability`=1,`ExpireDate`=DATE_ADD(CURRENT_DATE,INTERVAL 7 DAY) WHERE NewspaperName='$value'";
					$result=mysqli_query($query,$sql) or die(mysqli_error($query));
				}
				
			}
				
			if ($result==true) {
				return true;
			} else {
				return false;
			}
		}
		public function updateMember($memNo,$receiptNo,$expirationdate){
			$sql="UPDATE `member` SET `DepositeReceiptNo`='$receiptNo',`ExpirationDate`='$expirationdate',`Deleted`='0'WHERE MembershipNo='$memNo'";
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
		public function updateBorrowSession($id,$returndate){
			$returnDate=date_create($returndate);
			$returndate=date_format($returnDate,"Y/m/d");
			
			
			
				
				$sql1="SELECT `ExpirationDate` FROM `borrowsession` WHERE BorrowSessionID='$id'";
			
				$query=$this->connectInDifferentWay();
				$result1=mysqli_query($query,$sql1) or die(mysqli_error($query));
				if ($result1==true) {
					$row=mysqli_fetch_array($result1);
					$expirationdate=date_create($row[0]);
				
					if ($expirationdate>$returnDate||$expirationdate==$returnDate){
					
						$fine=0;
					}else{
					
						$diff=date_diff($returnDate,$expirationdate,true);
						$days=(int)($diff->format("%a"));
					
						$fine=$days*2;

					}
				
					$sql2 ="UPDATE `borrowsession` SET `ReturnedDate`='$returndate', `Ended`='1', `Fine`='$fine' WHERE BorrowSessionID='$id'";
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
			$sql="SELECT NewspaperName FROM newspaper WHERE Availability='0' AND Deleted='0'";
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
		public function expireNewspaper(){
			$sql1="SELECT `ExpireDate` FROM `newspaper` WHERE 1";
			
			$query=$this->connectInDifferentWay();
			$result1=mysqli_query($query,$sql1) or die(mysqli_error($query));
			
			$dateArray=Array();
			if ($result1==true) {
				while($row=mysqli_fetch_array($result1,MYSQLI_ASSOC)){
					$dateArray[]=$row['ExpireDate'];
					
				}
				
				foreach($dateArray as $key=>$exDate){
					$expireDate=date_create($exDate);
					$curdate=date_create(date("Y-m-d"));
					$diff=date_diff($expireDate,$curdate);
					
					
					if ($diff->format("%R%a")>0){
						$sql="UPDATE `newspaper` SET `Availability`='0' WHERE ExpireDate='$exDate'";
						$query=$this->connectInDifferentWay();
						$result=mysqli_query($query,$sql) or die(mysqli_error($query));
						
						if ($result==true) {
							return true;
						} else {
							return false;
						}
					}
				}
				
			}	
					
					
					
			
		}

		public function showBook(){
			$sql = "SELECT ISBN,Title,SubTitle,Author,Deleted,Available FROM book";
			$query=$this -> connectInDifferentWay();
			$result = mysqli_query($query,$sql) or die(mysqli_error($query));
			
			return $result;	
		}
		public function showNewspaper(){
			$sql = "SELECT NewspaperID,NewspaperName,TimeDuration,Deleted FROM newspaper ";
			$query=$this -> connectInDifferentWay();
			$result = mysqli_query($query,$sql) or die(mysqli_error($query));
			
			return $result;	
		}
		public function showMember(){
			$sql = "SELECT MembershipNo,Name,Address,Telephone,Email,Deleted,ExpirationDate FROM member ";
			$query=$this -> connectInDifferentWay();
			$result = mysqli_query($query,$sql) or die(mysqli_error($query));
			
			return $result;	
		}
		public function showStaff(){
			$sql = "SELECT StaffID,Name,Post,Address,ContactNo,Deleted FROM staff ";
			$query=$this -> connectInDifferentWay();
			$result = mysqli_query($query,$sql) or die(mysqli_error($query));
			
			return $result;	
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