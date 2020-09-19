<?php
$con=new mysqli('localhost','root','','newlibrarydb');
                        if($con->connect_error){
                            echo 'Connection Faild: '.$con->connect_error;
                        }else{
$select = "UPDATE donation SET Approved=1 where DonationID='".$_GET['app_id']."'";
$query = mysqli_query($con, $select) or die($select);
header ("Location: donationApprove.view.php");
}
?>