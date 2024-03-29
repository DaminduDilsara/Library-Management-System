<?php
	session_start();
	include "../include/dbconnection.inc.php";
	include "../controller/adminController.controller.php";
	$returnErr = "";
	$expErr="";
	$erros =[];
	if(strlen($_SESSION['userName'])==NULL){   
		header('../index.php');
	}else{
		$controller=AdminController::getinstance(); 
		if(isset($_POST['lend'])){
			
			date_default_timezone_set('Asia/Colombo');
			$today=date("Y-m-d");
			$id=$_POST['id'];
			$barcode=$_POST['barcode'];
			$memNo=$_POST['memNo'];
			$expirationdate= $_POST['expirationdate'];
			if($expirationdate <= $today){
				$expErr = "Expiration Date can not be a past date";
				$erros[] = $expErr;
			}
			
			$returndate=$_POST['returndate'];
			$staffID=$_POST['staffID'];
			$receiptNo=$_POST['receiptNo'];
			
			$isbn=$_POST['isbn'];
			$subject=$_POST['subject'];
			$title=$_POST['title'];
			$sub=$_POST['sub'];
			$author=$_POST['author'];
			$editor=$_POST['editor'];
			$publisher=$_POST['publisher'];
			$section=$_POST['section'];
			$place=$_POST['place'];
			$date=$_POST['date'];
			$pages=$_POST['pages'];
			$price=$_POST['price'];
			$dim=$_POST['dim'];
			$cd=$_POST['cd'];
			$categary=$_POST['categary'];

			if (count($erros) == 0){
				$borrow=BorrowSession::getInstance($barcode);
				$borrow->setBorrowSession($id,$barcode,$memNo,$expirationdate,$returndate,$staffID,$receiptNo);
				$msg1=$controller->insert($borrow);
				$_SESSION['msg1']=$msg1;

				$book=Book::getInstance($barcode);
				$book->setBook($barcode,$isbn,$subject,$title,$sub,$author,$editor,$publisher,$section,$place,$date,$pages,$price,$dim,$cd,$categary);
				$msg=$controller->update($book);
				$_SESSION['msg']=$msg;
			}
		}elseif(isset($_POST['return'])){ 
			date_default_timezone_set('Asia/Colombo');
			$today=date("Y-m-d");
			
			$id=$_POST['id'];
			$barcode=$_POST['barcode'];
			$memNo=$_POST['memNo'];
			$expirationdate=$_POST['expirationdate'];
			$returndate=$_POST['returndate'];
			
			if ($returndate!=$today){
				$returnErr="*You should be insert the today's date";
				$erros[] =$returnErr;
			}
			$staffID=$_POST['staffID'];
			$receiptNo=$_POST['receiptNo'];
			
			$isbn=$_POST['isbn'];
			$subject=$_POST['subject'];
			$title=$_POST['title'];
			$sub=$_POST['sub'];
			$author=$_POST['author'];
			$editor=$_POST['editor'];
			$publisher=$_POST['publisher'];
			$section=$_POST['section'];
			$place=$_POST['place'];
			$date=$_POST['date'];
			$pages=$_POST['pages'];
			$price=$_POST['price'];
			$dim=$_POST['dim'];
			$cd=$_POST['cd'];
			$categary=$_POST['categary'];
			
			if (count($erros) == 0){
				$borrow=BorrowSession::getInstance();
				$borrow->setBorrowSession($id,$barcode,$memNo,$expirationdate,$returndate,$staffID,$receiptNo);
				$msg1=$controller->update($borrow);
				$_SESSION['msg1']=$msg1;

				$book=Book::getInstance($barcode);
				$book->setBook($barcode,$isbn,$subject,$title,$sub,$author,$editor,$publisher,$section,$place,$date,$pages,$price,$dim,$cd,$categary);
				$msg=$controller->update($book);
			}
		
		}elseif(isset($_POST['paid'])){ 
			$barcode=0;
			
			$receiptNo=$_POST['receiptNo'];
			$amount=$_POST['amount'];
			$description=$_POST['description'];
			$memNo=$_POST['memNo'];
			$staffID=$_POST['staffID'];	
			$name=$_POST['name'];
			$id=$_POST['id'];
			$expirationdate=$_POST['expirationdate'];
			$returndate=$_POST['returndate'];

			$deposite=Deposite::getInstance();
			$deposite->setDeposite($memNo,$receiptNo,$amount,$description,$name,$staffID);
			$msg=$controller->insert($deposite);
			$borrowSession=BorrowSession::getInstance();
			$borrowSession->setBorrowSession($id,$barcode,$memNo,$expirationdate,$returndate,$staffID,$receiptNo);
			$msg2=$controller->updateFine($borrowSession);
			$_SESSION['msg']=$msg;
		
		}
		if (isset($_SESSION['msg1'])){ 
			$msg=$_SESSION['msg1'];
			echo "<script type='text/javascript'>alert('$msg1');</script>";
		
			
			unset($_SESSION['msg1']); 
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
	<link rel="stylesheet" href="../style/Lend.charitha.css"type="text/css"/>
	<link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
	<title>Lending Session</title>
</head>
<body>
	<header>
		<?php
			include("../include/header.inc.php");
		?>
		<?php
		include	"../include/adminNavbar.inc.php";
	?>
	<br><br>
		<h2>Lending Session</h2>
	</header>
	<div class="tab">
		<button class="button" onclick="openTab(event,'Lend')"id="default">Lend</button>
		<button class="button" onclick="openTab(event,'Return')">Return</button>
		<button class="button" onclick="openTab(event,'Fine')">Pay Fine</button>
	</div>
	<div id="Lend" class="content">
		<form method=post>
			</br></br></br>
			<h1>Lend Book</h1>
			
			<input style=padding-left:25px type="number" name="id" placeholder="BorrowSessionID" required/>
			<input style=padding-left:25px type="number" name="barcode" placeholder="Barcode No:" required />
			<input style=padding-left:25px type="text" name="memNo" placeholder="Membership No:"required />
			<input style=padding-left:25px type="text" onfocus="(this.type='date')" name="expirationdate" onblur="(this.type='text')" placeholder="ExpirationDate" required/>
			<span class="error" style= color:#FF0000><?php echo $expErr;?></span>
			<input type="hidden" name="returndate" placeholder="Return Date" />
			<input style=padding-left:25px type="number" name="staffID" placeholder="Staff ID" required/>
			<input type="hidden" name="receiptNo" placeholder="Receipt NO:" />
			
			<input type="hidden" name="isbn"placeholder="ISBN" />
			<input type="hidden" name="subject"placeholder="Subject" />
			<input type="hidden" name="title"placeholder="Title"/>
			<input type="hidden" name="sub"placeholder="Subtitle" />
			<input type="hidden" name="author"placeholder="Author" />
			<input type="hidden" name="editor"placeholder="Editor" />
			<input type="hidden" name="publisher"placeholder="Publisher" />
			<input type="hidden" name="section"placeholder="Section" />
			<input type="hidden" name="place"placeholder="Published Place" />
			<input type="hidden" name="date" />
			<input type="hidden" name="pages"placeholder="Number of Pages" />
			<input type="hidden" name="price"placeholder="Price" />
			<input type="hidden" name="dim"placeholder="Dimensions" />
			<input type="hidden" name="cd"placeholder="CD_Include" />
			<input type="hidden" name="categary"placeholder="Categary" />
					
			<button name=lend type=submit>LEND</button>
			
		</form>
	</div>
	<div id="Return" class="content">
		<form method=post>
			</br></br></br>
			<h1>Return Book</h1>
			
			<input style=padding-left:25px type="number" name="id" placeholder="BorrowSessionID" required/>
			<input type="hidden" name="barcode" placeholder="Barcode No:" />
			<input type="hidden" name="memNo" placeholder="Membership No:" />
			<input type="hidden" name="expirationdate" placeholder="Expiration Date" />
			<input style=padding-left:25px type="text" name="returndate"onfocus="(this.type='date')"  onblur="(this.type='text')" placeholder="Return Date" required/>
				<span class="error" style= color:#FF0000><?php echo $returnErr;?></span> 
			<input type="hidden" name="staffID" placeholder="Staff ID" />
			<input  type="hidden" name="receiptNo" placeholder="Receipt NO:" />
			
			<input type="hidden" name="isbn"placeholder="ISBN" />
			<input type="hidden" name="subject"placeholder="Subject" />
			<input type="hidden" name="title"placeholder="Title"/>
			<input type="hidden" name="sub"placeholder="Subtitle" />
			<input type="hidden" name="author"placeholder="Author" />
			<input type="hidden" name="editor"placeholder="Editor" />
			<input type="hidden" name="publisher"placeholder="Publisher" />
			<input type="hidden" name="section"placeholder="Section" />
			<input type="hidden" name="place"placeholder="Published Place" />
			<input type="hidden" name="date" />
			<input type="hidden" name="pages"placeholder="Number of Pages" />
			<input type="hidden" name="price"placeholder="Price" />
			<input type="hidden" name="dim"placeholder="Dimensions" />
			<input type="hidden" name="cd"placeholder="CD_Include" />
			<input type="hidden" name="categary"placeholder="Categary" />
			
			<button name=return type=submit>Return</button>
			
		</form>
	</div>
	<div id="Fine" class="content">
		<form method=post>
			</br></br></br>
			<h1>Pay Fine</h1>

			
			<input style=padding-left:25px type="number" name="receiptNo" placeholder="ReceiptNo"required/>
			<input style=padding-left:25px type="number" name="amount"placeholder="Amount" Required/>
			<input style=padding-left:25px type="text" name="description"placeholder="Description" />
			<input style=padding-left:25px type="text" name="memNo"placeholder="Membership No:"required />
			<input style=padding-left:25px type="text" name="name" placeholder="Name"/>
			<input style=padding-left:25px type="number" name="id"placeholder="BorrowSessionID"required />
			<input style=padding-left:25px type="number" name="staffID"placeholder="StaffID"required />
			<input type="hidden" name="expirationdate" placeholder="Expiration Date" />
			<input type="hidden" name="returndate" placeholder="Return Date(YYYY-MM-DD)"/>
			
			<button name=paid type=submit>Paid</button>
			
		</form>
	</div>
	
</br></br></br>

</br></br></br>	
	
</body>

<script>
//load the tabs when click on it
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
		include("../include/footer.inc.php");
	?>
</footer>

