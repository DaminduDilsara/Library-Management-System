<?php 
session_start();
include('../include/dbconnection.inc.php');

error_reporting(0);

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
    <a class="active" href="#"><i class="fa fa-fw fa-home"></i> Home</a>
    <a href="#"><i class="fa fa-fw fa-envelope"></i> Contact Us</a>
    <a href="#"> Advanced search</a> 
  </div>  
</body>
</html>


 <div class="row" >
  <div class="leftcolumn" style="width: 100%;">
    
      
      <div class="fakeimg" style="height:350px; ">
        <img src="../images/books.jpg" style="height: 100%; width: 30%; float: right;">

        <div class="medium-text" style="font-size: 30px; text-align: center;">Drop file to upload</div>
    
        <?php 
        

          if(isset($_GET['msg'])){
               ?><div class="small-text" style="font-size: 20px;"><?php echo ($_GET['msg']); ?></div><?php
        }?>
      <div class="dropzone" style="height: 100px; ">
        <img src="../images/Capture29.png" style="width: 20%; height: 20%;">
        <form action="../include/uploadcreation.inc.php" method="POST" enctype="multipart/form-data">
          <input type="file" name="file">
          
          <button class="button" style="background-color: #4C5A64; color: white; width: 100%;" type="submit" name="submit">UPLOAD</button>
        </form>
       

 
      </div> 
       
        
            
</div>



      </div>
  </div>

