<?php 
session_start();
include('../include/dbconnection.inc.php');

include('../controller/bookController.controller.php');
error_reporting(0);
$memNo=$_SESSION['memNo'];

 $obuser=new BookController();
?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<?php
    include('../include/header.inc.php');
    include('../include/footer.inc.php');
    include('../include/navbar.inc.php');
  ?>
  
  
 
  
  <div class="row" >
  
    <div class="card" style="height: 500px; ">
      
      <div class="fakeimg" style="height:100%;">
        <h3>Managed Issued Books</h3>
      <table id="customers">
  <tr>
    <th>Book Name</th>
    <th>ISBN</th>
    <th>Issued Date</th>
    <th>Expiration Date</th>
    <th>Returned Date</th>
    <th>Fine in (Rs.)</th>
  </tr>
  <tr>
    <td>
      <?php

       $obuser->getBookName($memNo); ?> 
    </td>
    <td>
     <?php $obuser->getISBN($memNo); ?>  
    </td>
    <td>
      <?php $obuser->getIssuedDate($memNo); ?>
      
    </td>
    <td>
     <?php $obuser->getExpirationDate($memNo); ?> 
    </td>
    <td>
     <?php $obuser->getReturnedDate($memNo); ?> 
    </td>
    <td>
      <?php $obuser->getFine($memNo); ?>
    </td>
  </tr>
      </div>
      </div>
      </div>  
</body>
</html>