<?php
include('../model/bookModel.model.php');



class BookController extends BookModel {

	

	public function getBookName(){
		$obuser=new BookModel();
		$result=$obuser->getBorrowInfo();
		
		for($i=0; $i<count($result); $i++){
			$barcodeNo=$result[$i]['BarcodeNo'];
        	$results=$obuser->getBookInfo($barcodeNo);
        	echo $results[0]['Title'];
       		?><br><br><?php
      	}

	}

	public function getISBN(){
		$obuser=new BookModel();
		$result=$obuser->getBorrowInfo();
		
		for($i=0; $i<count($result); $i++){
        	$barcodeNo=$result[$i]['BarcodeNo'];
			$results=$obuser->getBookInfo($barcodeNo);
        	echo $results[0]['ISBN'];
        	?><br><br><?php
      	}

	}


	public function getExpirationDate(){
		$obuser=new BookModel();
		$result=$obuser->getBorrowInfo();
        
        for($i=0; $i<count($result); $i++){
          echo $result[$i]['ExpirationDate'];
          ?><br><br>
          <?php
        }  

	}

	public function getIssuedDate(){
		$obuser=new BookModel();
		$result=$obuser->getBorrowInfo();
        
       for($i=0; $i<count($result); $i++){
          echo $result[$i]['Date'];
          ?><br><br>
          <?php
        }   

	}

	public function getReturnedDate(){
		$obuser=new BookModel();
		$result=$obuser->getBorrowInfo();
        
       for($i=0; $i<count($result); $i++){
          //echo $result[$i]['ReturnedDate'];
       		if ($result[$i]['ReturnedDate']=='0000-00-00'){
       			echo 'Not Returned Yet';
       		}else{
       			echo $result[$i]['ReturnedDate'];
       		}
          ?><br><br>
          <?php
        }   

	}

	public function getFine(){
		$obuser=new BookModel();
		$result=$obuser->getBorrowInfo();
        
       for($i=0; $i<count($result); $i++){
          echo $result[$i]['Fine'];
          ?><br><br>
          <?php
        }   

	}

}

?>