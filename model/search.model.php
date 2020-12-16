<?php
include_once("../include/dbconnection.inc.php");
include_once("../controller/search.con.php");

class SearchModel extends dbconnection{

	public function searchingResult($selectOption,$searchValue){
		$sql="SELECT * FROM book where ".$selectOption." like '%$searchValue%'";
		$result = mysqli_query($this -> connectInDifferentWay(),$sql) or die(mysql_error());
        return $result;
	}

	public function updateReserve($memNo,$reserve_id){
		$sql="SELECT * FROM bookreservations where MembershipNo= '$memNo' and Status='1'";
		$result = mysqli_query($this -> connectInDifferentWay(),$sql) or die(mysql_error());
		if($result==true){
				if(mysqli_num_rows($result)<2){
					$sql1 = "UPDATE book SET available=0 where BarcodeNo='".$_GET['reserve_id']."'";
					$result1 = mysqli_query($this -> connectInDifferentWay(),$sql1) or die(mysql_error());

					$sql2 = "INSERT INTO `bookreservations`(`MembershipNo`, `BarcodeNo`, `Status`,`ExpirationDate`) VALUES ('$memNo','$reserve_id','1',DATE_ADD(CURRENT_DATE,Interval 2 day))";
					$query = $this->connectInDifferentWay();
					$result2 =mysqli_query($query,$sql2) or die(mysqli_error($query)) ;



				return true;

				}else{
					return false;
				}

		}


		
	}

	public function expireReserve(){
		$sql1="SELECT `ExpirationDate` FROM `bookreservations` WHERE 1";
			
			$query=$this->connectInDifferentWay();
			$result1=mysqli_query($query,$sql1) or die(mysqli_error($query));
			
			$dateArray=Array();
			if ($result1==true) {
				while($row=mysqli_fetch_array($result1,MYSQLI_ASSOC)){
					$dateArray[]=$row['ExpirationDate'];
					
				}
				
				foreach($dateArray as $key=>$exDate){
					$expireDate=date_create($exDate);
					$curdate=date_create(date("Y-m-d"));
					$diff=date_diff($expireDate,$curdate);
					
					
					if ($diff->format("%R%a")>0){
						$sql="UPDATE `bookreservations` SET `Status`='0' WHERE ExpirationDate='$exDate'";
						$query=$this->connectInDifferentWay();
						$result=mysqli_query($query,$sql) or die(mysqli_error($query));
					}
				}
				
				
			}	
					
					
					
			
		}


	}


?>
