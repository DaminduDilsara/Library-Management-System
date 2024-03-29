<?php
include_once('../include/dbconnection.inc.php');
include_once('../controller/usercontroller.controller.php');

    $cont = UserController::getInstance();
    if (isset($_POST['login'])){

		$memNo = $_POST['memNo']; // removes backslashes
		$psw = $_POST['psw'];

		$rows = $cont -> UserLogin($memNo, $psw);
        if($rows){
            if ($cont->checkExpire($memNo)){
                session_start();
                $_SESSION['memNo'] = $memNo;
                header("Location: ExpiredPage.php");
            }else {
                session_start();
                $_SESSION['memNo'] = $memNo;
                header("Location: ../view/whole.view.php");
            }
        }else{
			echo "<div class='login_Messages'><h3>Username/password is incorrect.</h3>Click here to <a href='index.php'>Login Again</a></div>";
			$run = true;
		}
    }
    else{
?>


<!-- Button to open the modal login form -->
<button onclick="document.getElementById('id01').style.display='block'" class="">Member Login</button>

<!-- The Modal -->
<div id="id01" class="modal">
    <span onclick="document.getElementById('id01').style.display='none'"class="close" title="Close Modal">&times;</span>

    <!-- Modal Content -->
    <form class="modal-content animate" action="index.php" method="post">
		<div class="imgcontainer">
		    <img src="../images/userLogin.webp" style="width:100px;height:100px">
		</div>

		<div class="container">
		    <label for="memNo"><b>Membership No:</b></label>
		    <input type="text" placeholder="Enter Membership No:" name="memNo" required>

		    <label for="psw"><b>Password</b></label>
		    <input type="password" placeholder="Enter Password" name="psw" required>

		    <button type="submit" name="login" value="Login">Login</button>
		    <label>
				<input type="checkbox" checked="checked" name="remember"> Remember me
		    </label>
		</div>

		<div class="container" style="background-color:#f1f1f1">
		    <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
		    <span class="psw">Forgot <a href="#">password?</a></span>
		</div>
    </form>
</div>

<?php } ?>