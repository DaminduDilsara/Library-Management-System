<?php
include('../model/bookModel.model.php');



class BookController extends BookModel {

  

  public function getBookName($memNo){
    $obuser=new BookModel();
    $result=$obuser->getBorrowInfo($memNo);
    
    for($i=0; $i<count($result); $i++){
      $barcodeNo=$result[$i]['BarcodeNo'];
          $results=$obuser->getBookInfo($barcodeNo);
          echo $results[0]['Title'];
          ?><br><br><?php
        }

  }

  public function getISBN($memNo){
    $obuser=new BookModel();
    $result=$obuser->getBorrowInfo($memNo);
    
    for($i=0; $i<count($result); $i++){
          $barcodeNo=$result[$i]['BarcodeNo'];
      $results=$obuser->getBookInfo($barcodeNo);
          echo $results[0]['ISBN'];
          ?><br><br><?php
        }

  }


  public function getExpirationDate($memNo){
    $obuser=new BookModel();
    $result=$obuser->getBorrowInfo($memNo);
        
        for($i=0; $i<count($result); $i++){
          echo $result[$i]['ExpirationDate'];
          ?><br><br>
          <?php
        }  

  }

  public function getIssuedDate($memNo){
    $obuser=new BookModel();
    $result=$obuser->getBorrowInfo($memNo);
        
       for($i=0; $i<count($result); $i++){
          echo $result[$i]['CurDate'];
          ?><br><br>
          <?php
        }   

  }

  public function getReturnedDate($memNo){
    $obuser=new BookModel();
    $result=$obuser->getBorrowInfo($memNo);
        
       for($i=0; $i<count($result); $i++){
          //echo $result[$i]['ReturnedDate'];
          if (is_null($result[$i]['ReturnedDate'])){
            echo 'Not Returned Yet';
          }else{
            echo $result[$i]['ReturnedDate'];
          }
          ?><br><br>
          <?php
        }   

  }


  public function getFine($memNo){
    $obuser=new BookModel();
    $result=$obuser->getBorrowInfo($memNo);
        
       for($i=0; $i<count($result); $i++){
          if (is_null($result[$i]['Fine'])){
            echo '0';
          }else{
            echo $result[$i]['Fine'];
          }
          ?><br><br>
          <?php
        }   

  }

  public function getReserveID($memNo){
    $obuser=new BookModel();
    $result=$obuser->getBookReservationInfo($memNo);
        
       for($i=0; $i<count($result); $i++){
          echo $result[$i]['ReserveID'];
          ?><br><br>
          <?php
        }   

  }

  public function getBookExpDate($memNo){
    $obuser=new BookModel();
    $result=$obuser->getBookReservationInfo($memNo);
        
       for($i=0; $i<count($result); $i++){
          echo $result[$i]['ExpirationDate'];
          ?><br><br>
          <?php
        }   

  }

  public function getBarcodeNo($memNo){
    $obuser=new BookModel();
    $result=$obuser->getBookReservationInfo($memNo);
        
       for($i=0; $i<count($result); $i++){
          echo $result[$i]['BarcodeNo'];
          ?><br><br>
          <?php
        }   

  }

}

?>