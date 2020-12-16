<?php
	session_start();
	include "../include/dbconnection.inc.php";
	include "../controller/adminController.controller.php";
	$emailErr="";
	$memErr = "";
	$bdErr = "";
	$expErr = "";
	$telErr = "";
	$erros =[];
	if(strlen($_SESSION['userName'])==NULL){   
		header('../mainPageView/index.php');
	}else{
		$controller=AdminController::getinstance(); 
		if(isset($_POST['addMember'])){
			
			$memNo=$_POST['memNo'];
			$memcount = strlen((string) $memNo);
			if($memcount != 6){
				$memErr = "Membership number should be in between 6";
				$erros[] =$memErr;
			}
			$name=$_POST['name'];
			$address=$_POST['address'];
			$birthday=$_POST['birthday'];
			$today = date("Y-m-d");
			if($birthday > $today){
				$bdErr = "Birthday should be a past date";
				$erros[] =$bdErr;
			}
			// $birthday=date_format($date1,"Y/m/d H:i:s");
			
			$school=$_POST['school'];
			$tele=$_POST['tele'];
			$teleCount = strlen((string) $tele);
			// if($teleCount != 10 or is_int($tele)){
			// 	$telErr = "Mobile number should be a valid number";
			// 	$erros[] =$telErr;
			// }
			$email = $_POST["email"];
			// check if e-mail address is well-formed
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErr = "Invalid email format";
				$erros[] =$emailErr;
			}
			$expirationdate= $_POST['expirationdate'];
			if($expirationdate <= $today){
				$expErr = "Expiration Date can not be a past date";
				$erros[] = $expErr;
			}
			
			
			$guarantor=$_POST['guarantor'];
			$receiptNo=$_POST['receiptNo'];
						
			
			  
			if (count($erros) == 0){
				$member=Member::getInstance($memNo);
				$member->setMember($memNo,$name,$address,$birthday,$school,$tele,$email,$expirationdate,$guarantor,$receiptNo);
				$msg=$controller->insert($member);
				$_SESSION['msg']=$msg;
			}
		}elseif(isset($_POST['removeMember'])){ 

			
			$memNo=$_POST['memNo'];
			$name=$_POST['name'];
			$address=$_POST['address'];
			$birthday=$_POST['birthday'];
			$school=$_POST['school'];
			$tele=$_POST['tele'];
			$email=$_POST['email'];
			$expirationdate=$_POST['expirationdate'];
			$guarantor=$_POST['guarantor'];
			$receiptNo=$_POST['receiptNo'];
			
			
			$member=Member::getInstance($memNo);
			$member->setMember($memNo,$name,$address,$birthday,$school,$tele,$email,$expirationdate,$guarantor,$receiptNo);
			$msg=$controller->remove($member);
			$_SESSION['msg']=$msg;
		
		}elseif(isset($_POST['renew'])){ 

			
			$memNo=$_POST['memNo'];
			$name=$_POST['name'];
			$address=$_POST['address'];
			$birthday=$_POST['birthday'];
			$school=$_POST['school'];
			$tele=$_POST['tele'];
			$email=$_POST['email'];
			$date=date_create($_POST['expirationdate']);
			$expirationdate=date_format($date,"Y/m/d ");
			$guarantor=$_POST['guarantor'];
			$receiptNo=$_POST['receiptNo'];
			
			
			$member=Member::getInstance($memNo);
			
			$member->setMember($memNo,$name,$address,$birthday,$school,$tele,$email,$expirationdate,$guarantor,$receiptNo);
			$msg=$controller->update($member);
			$_SESSION['msg']=$msg;
		
		}elseif(isset($_POST['paid'])){ 
			if ($_POST['memNo']==NULL){
				$memNo="Not registered";
			}else{
				$memNo=$_POST['memNo'];
			}
			
			$receiptNo=$_POST['receiptNo'];
			$amount=$_POST['amount'];
			$description=$_POST['description'];
			$name=$_POST['name'];
			$staffID=$_POST['staffID'];	
			
			$deposite=Deposite::getInstance();
			$deposite->setDeposite($memNo,$receiptNo,$amount,$description,$name,$staffID);
			$msg=$controller->insert($deposite);
			$_SESSION['msg']=$msg;
		
		}
		if (isset($_SESSION['msg'])){ 
			$msg=$_SESSION['msg'];
			echo "<script type='text/javascript'>alert('$msg');</script>";
		
			
			unset($_SESSION['msg']); 
		}
		
	}	


?>


<!doctype html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../style/MembersArea.charitha.css"type="text/css"/>
	<link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
	<title>Members Area</title>
</head>
<body>
	<header>
	<?php
	include "../include/header.inc.php";
	?>
	<?php
		include	"../include/adminNavbar.inc.php";
	?>
	<br><br>

		<h2>Members Area</h2>
	</header>
	<div class="tab">
		<button class="button" onclick="openTab(event,'Add')"id="default">AddMember</button>
		<button class="button" onclick="openTab(event,'Remove')">RemoveMember</button>
		<button class="button" onclick="openTab(event,'Renew')">RenewMembership</button>
		<button class="button" onclick="openTab(event,'Deposite')">Payments</button>
	</div>
	<div id="Add" class="content">
		<form method="post">
			</br></br></br>
			<h1>Add member</h1>
			<input style=padding-left:25px type="number" name="memNo" placeholder="MembershipNo" required/>
			<span class="error" style= color:#FF0000><?php echo $memErr;?></span>

			<input style=padding-left:25px type="text" name="name"placeholder="Name" required/>
			<input style=padding-left:25px type="text" name="address"placeholder="Address"required />
			<input style=padding-left:25px type="text" onfocus="(this.type='date')" name="birthday" onblur="(this.type='text')" placeholder="Birthday(YYYY-MM-DD)" required/>
			<span class="error" style= color:#FF0000><?php echo $bdErr;?></span>

			<input style=padding-left:25px type="text" name="school"placeholder="School" />
			<input style=padding-left:25px type="tel" pattern="[0-9]{10}" name="tele"placeholder="Telephone" />
			<span class="error" style= color:#FF0000><?php echo $telErr;?></span>

			<input style=padding-left:25px type="email" name="email"placeholder="Email" />
			<span class="error" style= color:#FF0000><?php echo $emailErr;?></span>

			<input style=padding-left:25px type="number" name="receiptNo"placeholder="Deposite Receipt No:" />

			<input style=padding-left:25px type="text" onfocus="(this.type='date')" name="expirationdate" onblur="(this.type='text')" placeholder="ExpirationDate(YYYY-MM-DD)" required/>
			<span class="error" style= color:#FF0000><?php echo $expErr;?></span>

			<input style=padding-left:25px type="text" name="guarantor"placeholder="Guarantor"required />
			
			
			
			<button name=addMember type="submit">Add</button>
			
		</form>
	</div>
	<div id="Remove" class="content">
		<form method="post">
			</br></br></br>
			<h1>Remove Member</h1>
			
			<input style=padding-left:25px type="number" name="memNo" placeholder="MembershipNo"required/>
			<input type="hidden" name="name"placeholder="Name" />
			<input type="hidden" name="address"placeholder="Address" />
			<input type="hidden" name="birthday"placeholder="Birthday" />
			<input type="hidden" name="school"placeholder="School" />
			<input type="hidden" name="receiptNo"placeholder="Deposite Receipt No:" />
			<input type="hidden" name="tele"placeholder="Telephone" />
			<input type="hidden" name="email"placeholder="Email" />
			<input type="hidden" name="expirationdate"placeholder="ExpirationDate" />
			<input type="hidden" name="guarantor"placeholder="Guarantor" />
			
			
			<button name=removeMember type="submit" onclick="return confirmDelete()">Remove</button>
			
		</form>
	</div>
	<div id="Renew" class="content">
		<form method=post>
			</br></br></br>
			<h1>Renew Membership</h1>
			
			<input style=padding-left:25px type="number" name="memNo" placeholder="MembershipNo"required/>
			<input type="hidden" name="name"placeholder="Name" />
			<input type="hidden" name="address"placeholder="Address" />
			<input type="hidden" name="birthday"placeholder="Birthday" />
			<input type="hidden" name="school"placeholder="School" />
			<input style=padding-left:25px type="number" name="receiptNo"placeholder="Deposite Receipt No:" required/>
			<input type="hidden" name="tele"placeholder="Telephone" />
			<input type="hidden" name="email"placeholder="Email" />
			<input style=padding-left:25px type="text" name="expirationdate"placeholder="ExpirationDate(YYYY-MM-DD)" required/>
			<input type="hidden" name="guarantor"placeholder="Guarantor" />
			
			
			<button name=renew type=submit>Renew</button>
			
		</form>
	</div>
	<div id="Deposite" class="content">
		<form method=post>
			</br></br></br>
			<h1>Payments</h1>
			
			<input style=padding-left:25px type="number" name="receiptNo" placeholder="ReceiptNo"required/>
			<input style=padding-left:25px type="number" name="amount"placeholder="Amount" Required/>
			<input style=padding-left:25px type="text" name="description"placeholder="Description" />
			<input style=padding-left:25px type="text" name="name"placeholder="Name"required />
			<input style=padding-left:25px type="text" name="memNo"placeholder="MembershipNo(If have)" />
			<input style=padding-left:25px type="number" name="staffID"placeholder="StaffID"required />
			
			
			
			<button name=paid type=submit>Paid</button>
			
		</form>
	</div>

	
	
</body>
<script>
//popup the confirmation box
function confirmDelete() {
  return confirm("Are you sure you want to delete?");
}
</script>

<script>
//load the tabs when click on the heading
document.getElementById("default").click();

function openTab(evt, Name) {
  
  var i, content, button;

  
  content = document.getElementsByClassName("content");
  for (i = 0; i < content.length; i++) {
    content[i].style.display = "none";
  }

  
  button = document.getElementsByClassName("button");
  for (i = 0; i < button.length; i++) {
    button[i].className = button[i].className.replace(" active", "");
  }

  
  document.getElementById(Name).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
<footer>
	<?php
	include "../include/footer.inc.php";
	?>

</footer>
</body>
</html>
