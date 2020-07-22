<?php
session_start();
include('dbconnection.php');





$newpassword=isset(($_POST['newpassword']))? $_POST['newpassword']:"";
$psw=isset(($_POST['psw']))? $_POST['psw']:"";
$memNo=$_SESSION['memNo'];


  $sql ="SELECT membershipNo, password FROM members WHERE membershipNo=:memNo ";
$query= $con -> prepare($sql);

$query-> bindParam(':memNo', $memNo, PDO::PARAM_STR);

$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
foreach($results as $result)
{    } 
$pws= htmlentities($result->password);


if($pws==$psw)
{
$conn="update members set password=:newpassword where membershipNo=:memNo";
$chngpwd1 = $con->prepare($conn);
$chngpwd1-> bindParam(':memNo', $memNo, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();

$msg="Your Password succesfully changed";
$error = false;
}
else {
$error="Your current password is wrong";  
}


?>






<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="stylee.css">
</head>
<style>
body {font-family: Arial, Helvetica, sans-serif; }
* {box-sizing: border-box;}




/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

/* Add a background color when the inputs get focus */
input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}


/* Add padding to container elements */
.container {
  padding: 70px;
  width: 50%;
  margin-left: 25%;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: #474e5d;
  padding-top: 50px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* Style the horizontal ruler */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
 
/* The Close Button (x) */
.close {
  position: absolute;
  right: 35px;
  top: 15px;
  font-size: 40px;
  font-weight: bold;
  color: #f1f1f1;
}

.close:hover,
.close:focus {
  color: #f44336;
  cursor: pointer;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
   .signupbtn {
     width: 100%;
  }
}
</style>

<script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>


  
  


<body>


<div style=" background-color: #8B0000; " >




  
    <div class="container" style="background-color: #F9BDB4; border-radius: 15%;" >
      <h1>Change password</h1>
      <?php 
      if(isset($_POST['change']))
         {

      if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }}?>

        <form role="form" method="post" onSubmit="return valid();" name="chngpwd"> 
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
