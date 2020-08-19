<?php
include_once('../include/dbconnection.inc.php');
include_once('../controller/usercontroller.controller.php');

    // If form submitted, insert values into the database.
    $cont = UserController::getInstance();
    if (isset($_POST['register'])){
		$memNo = $_POST['memNo']; // removes backslashes
		$email = $_POST['email'];
		$psw = $_POST['psw'];
		$psw_repeat = $_POST['psw_repeat'];

		if ($psw == $psw_repeat){
            $reg = $cont -> userRegister($email,$psw,$memNo);
            if ($reg == "true"){
                echo "<div class='login_Messages'><h3>You are registered successfully.</h3>Click here to <a href='index.php'>Login</a></div>";
            }
            else if ($reg == "false"){
                echo "<div class='login_Messages'><h3>You already have an account.</h3>Click here to <a href='index.php'>Login</a></div>";
            }
            else if ($reg == "noSuch"){
                echo "<div class='login_Messages'><h3>No such Membership number exist!.</h3>Click here to <a href='index.php'>Continue</a></div>";
            }
        }
		else{
		    echo "<div class='login_Messages'><h3>password mismatch.</h3>Click here to <a href='index.php'>Register again</a></div>";
        }
    }else{
?>
<button onclick="document.getElementById('id02').style.display='block'">Member Register</button> <!-- Button to open the modal -->
<div id="id02" class="modal"> <!-- The Modal (contains the Sign Up form) -->
    <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
    <form class="modal-content animate" action="" method="post">
		<div class="container">
			<div>
				<h1>User Register</h1>
				<p>Please fill in this form to create an account. (You must have a Membership number received from the library)</p>
				<hr>
			</div>

		    <label for="email"><b>Email</b></label>
		    <input type="text" placeholder="Enter Email" name="email" required>

		    <label for="memNo"><b>Membership No:</b></label>
		    <input type="text" placeholder="Enter Membership Number" name="memNo" required>

		    <label for="psw"><b>Password</b></label>
		    <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

		    <label for="psw-repeat"><b>Repeat Password</b></label>
		    <input type="password" placeholder="Repeat Password" name="psw_repeat" id="psw_repeat" required>

		    <label>
				<input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
		    </label>

		    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

		    <div class="clearfix">
				<button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
				<button type="submit" name="register" value="register" class="signup">Sign Up</button>
		    </div>
		</div>
    </form>
</div>

<?php } ?>