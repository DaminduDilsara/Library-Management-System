<?php
$con=new mysqli('localhost','root','','newlibrarydb');
                        if($con->connect_error){
                            echo 'Connection Faild: '.$con->connect_error;
                        }else{
$select = "DELETE from donation where DonationID='".$_GET['del_id']."'";
$query = mysqli_query($con, $select) or die($select);
header ("Location: donationApprove.view.php");
}
?>