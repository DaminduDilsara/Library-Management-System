
<?php 
session_start();
include('../include/dbconnection.inc.php');
include('../controller/usercontroller.controller.php');
error_reporting(0);


 
$memNo=$_SESSION['memNo'];


$obuser=new UserController();
$result=$obuser->assignInfo($memNo);
          
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

  ?>
	

  <div class="navbar">
    <a class="active" href="testing/Library.php"><i class="fa fa-fw fa-home"></i> Home</a>
    <a href="#"><i class="fa fa-fw fa-envelope"></i> Contact Us</a>
    <a href="#"> Advanced search</a> 
  </div>
  
 <div class="row" >
  <div class="leftcolumn">
    <div class="card" style="height: 1150px;">
      
      <div class="fakeimg" style="height:1150px;">
        
       
      <h3>Library</h3>
      <div class="fakeimg" style="background: white;"><div class="small-text">Registration No:  <?php echo ($obuser->getMemNo());?> </div></div><br>
      <div class="fakeimg" style="background: white;"><div class="small-text">Registration date : <?php echo ($obuser->getRegDate());?> </div></div><br>
      <div class="fakeimg" style="background: white;"><div class="small-text">Expiration Date :   <?php echo ($obuser->getExpDate());?></div></div><br>
      <div class="fakeimg" style="background: white;"><div class="small-text">Home Library : Justin Wijewardhana Public Library/ Godagama-Matara </div></div>
      <h3>Identity</h3>
      <div class="fakeimg" style="background: white;"><div class="small-text">Name :    <?php echo ($obuser->getName());?></div></div><br>
      <div class="fakeimg" style="background: white;"><div class="small-text">Date of birth : <?php echo ($obuser->getBirthday());?></div></div><br>
      <div class="fakeimg" style="background: white;"><div class="small-text">Guarantor :   <?php echo ($obuser->getGuarantor());?></div></div><br>
      <div class="fakeimg" style="background: white;"><div class="small-text">Address : <?php echo ($obuser->getAddress());?></div></div><br>
      <div class="fakeimg" style="background: white;"><div class="small-text">School/Institute :  <?php echo ($obuser->getSchool());?></div></div><br>
      <h3>Contact Details</h3>
      <div class="fakeimg" style="background: white;"><div class="small-text">Phone No. :   <?php echo ($obuser->getTelephone());?></div></div><br>
      <div class="fakeimg" style="background: white;"><div class="small-text">Email address : <?php echo ($obuser->getEmail());?></div></div><br>
      </div>
      
    </div>
    
    
    
    
  </div>

  <div class="rightcolumn">
    <div class="card" style="height:1100px;" >
      
      <div class="fakeimg" style="height:1100px;  ">
       <h3>About Me </h3>
       <img src="../images/1.png" style="height: 100px; width: 100px; margin-left: 50px;">
       <div class="small-text" >    <b><?php echo htmlentities($result->Name);?></b></div>
</div>
       
    </div>
    
    
  </div>
</div>
  
</body>
</html>
