<?php
	$run = false;

	require('db.php');
    if (isset($_POST['adminID']) && (!$run)){
		
		$adminID = $_POST['adminID'];
		$psw = $_POST['psw'];

        $query = "SELECT * FROM `userlogin` WHERE membershipNo='$adminID' and password='".md5($psw)."'";
		$result = mysqli_query($con,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['adminID'] = $adminID;
			header("Location: UserMain.php"); 
        }else{
			echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='index.php'>Login</a></div>";
			$run = true;
		}
    }else{
?>


<!-- Button to open the modal login form -->
<button onclick="document.getElementById('id03').style.display='block'" class="">Admin Login</button>

<!-- The Modal -->
<div id="id03" class="modal">
    <span onclick="document.getElementById('id03').style.display='none'"class="close" title="Close Modal">&times;</span>

    <!-- Modal Content -->
    <form class="modal-content animate" action="/action_page.php">
		<div class="imgcontainer">
		    <img src="images/adminLogin.png" style="width:100px;height:100px">
		</div>

		<div class="container">
		    <label for="adminID"><b>Admin ID</b></label>
		    <input type="text" placeholder="Enter Admin ID" name="adminID" required>

		    <label for="psw"><b>Password</b></label>
		    <input type="password" placeholder="Enter Password" name="psw" required>

		    <button type="submit">Login</button>
		    <label>
				<input type="checkbox" checked="checked" name="remember"> Remember me
		    </label>
		</div>

		<div class="container" style="background-color:#f1f1f1">
		    <button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Cancel</button>
		    <span class="psw">Forgot <a href="#">password?</a></span>
		</div>
    </form>
</div>

<?php } ?>