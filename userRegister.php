<?php
	require('db.php');
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['memNo']) && (!$run)){
		$memNo = $_REQUEST['memNo']; // removes backslashes
		$email = $_REQUEST['email'];
		$psw = $_REQUEST['psw'];
		$psw_repeat = $_REQUEST['psw_repeat'];
		
		$check = "SELECT * FROM `member` WHERE `MembershipNo`='$memNo'";
		//echo $check;
		$cheched = mysqli_query($con,$check) or die(mysql_error());
		//$line = mysqli_num_rows($cheched);
		//$line = $cheched -> fetch_assoc();
		
		
		while ($rows = $cheched -> fetch_assoc()){
			$line = $rows["Password"];
			
			if($line!=''){
				echo "<div class='login_Messages'><h3>You already have an account.</h3>Click here to <a href='index.php'>Login</a></div>";
			}else{
				$query = "UPDATE `member` SET email = '$email', Password = '".md5($psw)."' WHERE MembershipNo='$memNo'";
				$result = mysqli_query($con,$query);
				if($result){
					echo "<div class='login_Messages'><h3>You are registered successfully.</h3>Click here to <a href='index.php'>Login</a></div>";
				}
			}
		};
		//echo $line;
		
		
	
        //$query = "INSERT into `member` (email, password) VALUES ('$email', '".md5($psw)."')";
        //$result = mysqli_query($con,$query);
        //if($result){
        //    echo "<div class='login_Messages'><h3>You are registered successfully.</h3>Click here to <a href='index.php'>Login</a></div></div>";
        //}
    }else{
?>

<!-- Button to open the modal -->
<button onclick="document.getElementById('id02').style.display='block'">User Register</button>

<!-- The Modal (contains the Sign Up form) -->
<div id="id02" class="modal">
    <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
    <form class="modal-content animate" action="" method="request">
		<div class="container">
			
		
			<div>
				<h1>Sign Up</h1>
				<p>Please fill in this form to create an account.</p>
				<hr>
			</div>
		  
		    <label for="email"><b>Email</b></label>
		    <input type="text" placeholder="Enter Email" name="email" required>
		  
		    <label for="memNo"><b>Membership No:</b></label>
		    <input type="text" placeholder="Enter Membership Number" name="memNo" required>

		    <label for="psw"><b>Password</b></label>
		    <input type="password" placeholder="Enter Password" name="psw" required>

		    <label for="psw-repeat"><b>Repeat Password</b></label>
		    <input type="password" placeholder="Repeat Password" name="psw_repeat" required>

		    <label>
				<input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
		    </label>

		    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

		    <div class="clearfix">
				<button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
				<button type="submit" class="signup">Sign Up</button>
		    </div>
		</div>
    </form>
</div>

<?php } ?>