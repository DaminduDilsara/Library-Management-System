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
    <button class="tablink" onclick="openPage('Book', this, '#c47569')"id="defaultOpen">Books</button>
    <button class="tablink" onclick="openPage('Newspaper', this, '#c47569')" >Newspapers</button>
    <button class="tablink" onclick="openPage('Member', this, '#c47569')">Members</button>
    <button class="tablink" onclick="openPage('Staff', this, '#c47569')">Staff</button>

    <div id="Book" class="tabcontent">
        
		<table align="center" border="1px" style="width:600px; line-height:40px; color: black; background-color:#F9BDB4 ">
                            
                                    <t>
                                    <th> ISBN </th>
                                    <th> Title </th>
									<th> Sub Title </th>
                                    <th> Author </th>
									<th> Status </th>
                                    
                                    
                                    </t>
        	

               
                      <?php 
                       while ($row = mysqli_fetch_array($bookData)) {?>
                        <tr>
 <td><?php echo $row['ISBN']; ?></td>
 <td><?php echo $row['Title']; ?></td>
 <td><?php echo $row['SubTitle']; ?></td>
 <td><?php echo $row['Author']; ?></td>
 <td><?php if (($row['Deleted']==0 )and ($row['Available']==1)){echo "Available";}elseif(($row['Deleted']==1 )) {echo "Deleted";}else{echo "Received";}?></td>
 </tr>
 <?php
					   }
?>
 </table>
    </div>

    <div id="Newspaper" class="tabcontent">
        
        <table align="center" border="1px" style="width:600px; line-height:40px; color: black;background-color:#F9BDB4">
                            
                                    <t>
                                    <th> NewspaperID </th>
                                    <th> NewspaperName</th>
									<th> Time Duration(Days)</th>
									<th> Status</th>
									                              
                                    
                                    </t>
        	

               
                      <?php 
                       while ($row = mysqli_fetch_array($newspaperData)) {?>
                        <tr>
 <td><?php echo $row['NewspaperID']; ?></td>
 <td><?php echo $row['NewspaperName']; ?></td>
 <td><?php echo $row['TimeDuration']; ?></td>
 <td><?php if ($row['Deleted']==0){echo "Available";}else{echo "Deleted";}?></td>
 </tr>
 <?php
					   }
?>
 </table>
    </div>

    <div id="Member" class="tabcontent">
        
	<table align="center" border="1px" style="width:600px; line-height:40px; color: black;background-color:#F9BDB4 ">
                            
							<t>
							<th> MembershipNo </th>
							<th> Name </th>
							<th> Address </th>
							<th> Telephone </th>
							<th> Email </th>
							<th> ExpirationDate </th>
							<th> Status </th>
							
							</t>
	

	   
			  <?php 
			   while ($row = mysqli_fetch_array($memberData)) {?>
				<tr>
<td><?php echo $row['MembershipNo']; ?></td>
<td><?php echo $row['Name']; ?></td>
<td><?php echo $row['Address']; ?></td>
<td><?php echo $row['Telephone']; ?></td>
<td><?php echo $row['Email']; ?></td>
<td><?php echo $row['ExpirationDate']; ?></td>
<td><?php if ($row['Deleted']==0){echo "Available";}else{echo "Deleted";}?></td>
</tr>
<?php
			   }
?>
</table>
    </div>

    <div id="Staff" class="tabcontent">
        
	<table align="center" border="1px" style="width:600px; line-height:40px; color: black;background-color:#F9BDB4">
                            
							<t>
							<th> StaffID </th>
							<th> Name </th>
							<th> Post </th>
							<th> Address </th>
							<th> ContactNo </th>
							<th> Status </th>
							
							
							</t>
	

	   
			  <?php 
			   while ($row = mysqli_fetch_array($staffData)) {?>
				<tr>
<td><?php echo $row['StaffID']; ?></td>
<td><?php echo $row['Name']; ?></td>
<td><?php echo $row['Post']; ?></td>
<td><?php echo $row['Address']; ?></td>
<td><?php echo $row['ContactNo']; ?></td>
<td><?php if ($row['Deleted']==0){echo "Available";}else{echo "Unavailable";}?></td>
</tr>
<?php
			   }
?>
</table>
	</div>
<br><br><br><br>

</body>
<footer>
	<?php
		include("../include/footer.inc.php");
	?>
</footer>
<style>
	.tablink {
    background-color: #555;
    color: White;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    font-size: 17px;
    width: 25%;
    overflow:hidden;
   
  }
  
  .tablink:hover {
    background-color: #777;
  }
  
  /* Style the tab content (and add height:100% for full page content) */
  .tabcontent {
	
    color:#F9BDB4;
    display: none;
    padding: 100px 20px;
    height: 200%;
  }
  .table{
	background-color:#F9BDB4;
  }  
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
