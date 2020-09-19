<?php
$con=new mysqli('localhost','root','','newlibrarydb');
                        if($con->connect_error){
                            echo 'Connection Faild: '.$con->connect_error;
                        }else{
$select = "UPDATE creation SET Approved=1 where CreationID='".$_GET['app_id']."'";
$query = mysqli_query($con, $select) or die($select);
header ("Location: creationApprove.view.php");
}
?>