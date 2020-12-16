<?php
session_start();
include('../include/dbconnection.inc.php');
include('../controller/usercontroller.controller.php');

if(isset($_POST['change']))
         {
$newpassword=isset(($_POST['newpassword']))? $_POST['newpassword']:"";
$psw=isset(($_POST['psw']))? $_POST['psw']:"";
$repsw=isset(($_POST['confirmpassword']))? $_POST['confirmpassword']:"";
$memNo=$_SESSION['memNo'];

$obuser=UserController::getInstance();
$result=$obuser->checkPassword($memNo,$psw,$newpassword,$repsw);
}
?>


<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="../css/stylee.css">
  <link rel="stylesheet" type="text/css" href="../css/changepassword.css">
</head>
<body>

  <?php
    include('../include/header.inc.php');
    include('../include/footer.inc.php');
    include('../include/navbar.inc.php');

  ?>

<div style=" background:linear-gradient(to bottom, black 0%, #8B0000 100%) " >




  
    <div class="container" style="background-color: #F9BDB4; border-radius: 15%;" >
      <h1>Change password</h1>
      <?php 
      if(isset($_POST['change']))
         {

      if($result==2){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo 'Your current password is wrong'; ?> </div><?php } 
        else if($result==0){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo'Your Password is  Successfully Changed'; ?> </div><?php }

        else if($result==1){?><div class="succWrap"><strong>ERROR</strong>:<?php echo"New Password and Confirm Password Field do not match  !!"; ?> </div><?php }}?>

        <form role="form" action="" method="post" onSubmit="return valid();" name="chngpwd"> 
      <hr>
      <label for="current password"><b>current password</b></label>
      <input type="password" placeholder="Enter Current password" name="psw" required>

      <label for="New Password"><b>New Password</b></label>
      <input type="password" placeholder="Enter New Password" name="newpassword" required>

      <label for="psw-repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="confirmpassword" required>
      
      <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
      </label>

     
      <div class="clearfix">
        
        <button type="submit" class="signupbtn" name="change">Changes</button>
      </div>
    </form>
    </div>
  
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>
</html>