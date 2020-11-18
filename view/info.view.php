<?php
	session_start();
	include "../include/dbconnection.inc.php";
	include "../controller/adminController.controller.php";
	if(strlen($_SESSION['userName'])==NULL){   
		header('../index.php');
	}else{
        $controller=AdminController::getinstance(); 
		$barcode=0;
		$id=0;
		$memNo=0;
		$staffId=0;
		$book=Book::getInstance($barcode);
		$newspaper=Newspaper::getInstance($id);
		$member=Member::getInstance($memNo);
		$staffMember=Staff::getInstance($staffId);
		$bookData=$controller->showData($book);
		$newspaperData=$controller->showData($newspaper);
		$memberData=$controller->showData($member);
		$staffData=$controller->showData($staffMember);
	}
?>
<!doctype html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../style/info.charitha.css"type="text/css"/>
	<link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
	<title>Info Page </title>
</head>
<body>
	<header>
		<?php
			include("../include/header.inc.php");
		?>
		<?php
		include	"../include/adminNavbar.inc.php";
	?>
	</header>
    <button class="tablink" onclick="openPage('Book', this, 'red')"id="defaultOpen">Books</button>
    <button class="tablink" onclick="openPage('Newspaper', this, 'green')" >Newspapers</button>
    <button class="tablink" onclick="openPage('Member', this, 'blue')">Members</button>
    <button class="tablink" onclick="openPage('Staff', this, 'orange')">Staff</button>

    <div id="Book" class="tabcontent">
        
		<table align="center" border="1px" style="width:600px; line-height:40px; color: black;">
                            
                                    <t>
                                    <th> ISBN </th>
                                    <th> Title </th>
									<th> Sub Title </th>
                                    <th> Author </th>
                                    
                                    
                                    </t>
        	

               
                      <?php 
                       while ($row = mysqli_fetch_array($bookData)) {?>
                        <tr>
 <td><?php echo $row['ISBN']; ?></td>
 <td><?php echo $row['Title']; ?></td>
 <td><?php echo $row['SubTitle']; ?></td>
 <td><?php echo $row['Author']; ?></td>
 </tr>
 <?php
					   }
?>
 </table>
    </div>

    <div id="Newspaper" class="tabcontent">
        
        <table align="center" border="1px" style="width:600px; line-height:40px; color: black;">
                            
                                    <t>
                                    <th> NewspaperID </th>
                                    <th> NewspaperName</th>
									                              
                                    
                                    </t>
        	

               
                      <?php 
                       while ($row = mysqli_fetch_array($newspaperData)) {?>
                        <tr>
 <td><?php echo $row['NewspaperID']; ?></td>
 <td><?php echo $row['NewspaperName']; ?></td>
 
 </tr>
 <?php
					   }
?>
 </table>
    </div>

    <div id="Member" class="tabcontent">
        
	<table align="center" border="1px" style="width:600px; line-height:40px; color: black;">
                            
							<t>
							<th> MembershipNo </th>
							<th> Name </th>
							<th> Address </th>
							<th> Telephone </th>
							<th> Email </th>
							
							
							</t>
	

	   
			  <?php 
			   while ($row = mysqli_fetch_array($memberData)) {?>
				<tr>
<td><?php echo $row['MembershipNo']; ?></td>
<td><?php echo $row['Name']; ?></td>
<td><?php echo $row['Address']; ?></td>
<td><?php echo $row['Telephone']; ?></td>
<td><?php echo $row['Email']; ?></td>
</tr>
<?php
			   }
?>
</table>
    </div>

    <div id="Staff" class="tabcontent">
        
	<table align="center" border="1px" style="width:600px; line-height:40px; color: black;">
                            
							<t>
							<th> StaffID </th>
							<th> Name </th>
							<th> Post </th>
							<th> Address </th>
							<th> ContactNo </th>
							
							
							</t>
	

	   
			  <?php 
			   while ($row = mysqli_fetch_array($staffData)) {?>
				<tr>
<td><?php echo $row['StaffID']; ?></td>
<td><?php echo $row['Name']; ?></td>
<td><?php echo $row['Post']; ?></td>
<td><?php echo $row['Address']; ?></td>
<td><?php echo $row['ContactNo']; ?></td>
</tr>
<?php
			   }
?>
</table>
    </div>
</body>
<style>

</style>
<script>
function openPage(pageName, elmnt, color) {
  // Hide all elements with class="tabcontent" by default */
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Remove the background color of all tablinks/buttons
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }

  // Show the specific tab content
  document.getElementById(pageName).style.display = "block";

  // Add the specific color to the button used to open the tab content
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
<footer>
	<?php
		include("../include/footer.inc.php");
	?>
</footer>