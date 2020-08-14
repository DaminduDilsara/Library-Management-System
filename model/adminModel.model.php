<?php
	include_once '../include/dbconnection.inc.php';
	include_once '../controller/adminController.controller.php';
	Class Admin  extends dbconnection { 
		
		public function insertBook($barcode,$isbn,$subject,$title,$sub,$author,$editor,$publisher,$section,$place,$date,$pages,$price,$dim,$cd,$categary){ 
			$noError=false;
			try{ 
			
			$sql = "INSERT INTO `book`(`BarcodeNo`, `ISBN`, `Subject`, `Title`, `SubTitle`, `Editor`, `Publisher`, `Section`, `PublishedPlace`, `PublishedDate`, `NumberOfPages`, `Price`, `Dimentions`, `CDIncluded`, `Availale`, `Deleted`, `Author`, `CallNo`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,(SELECT AuthorID FROM author WHERE FirstName = ?),(SELECT callnumber FROM callnumber WHERE description = ?))";
			
			$query = $this->connect()->prepare($sql);
			
			$query->execute([$barcode,$isbn,$subject,$title,$sub,$editor,$publisher,$section,$place,$date,$pages,$price,$dim,$cd,"1","0",$author,$categary]);
			$query=$query->fetchAll();
			
			$noError=true;
			
		
			return true ;
			}
			catch(PDOException $ex){
				die($ex->getMessage());
				return false;
			}
			if ($noError==false){
				return false;
			}
			
			
		}
		public function insertNewspaper($id,$name,$time){
			
			$noError=false;
			try{
				 
			
				$sql = "INSERT INTO `newspaper`(`NewspaperID`, `NewspaperName`, `TimeDuration`, `Availability`) VALUES (?,?,?,?)";
			
				$query = $this->connect()->prepare($sql);
			
				$query->execute([$id,$name,$time,"0"]);
				$query=$query->fetchAll();
			
				$noError=true;
				
		
				return true ;
			}
			catch(PDOException $ex){
				die($ex->getMessage());
				return false;
			}
			if ($noError==false){
				return false;
			}
		}
		public function insertAuthor(){

		}
		public function insertMember(){

		}
		public function insertStaff(){

		}
		public function insertBorrowSession(){

		}

	}