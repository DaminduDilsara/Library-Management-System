<?php
session_start();
include_once('../include/dbconnection.inc.php');
//include_once('../controller/usercontroller.controller.php');
include_once('../controller/creationController.controller.php');



if (isset($_POST['submit'])){
	$file = $_FILES['file'];
    $me= $_POST['memNo'];
	$fileName =  $_FILES['file']['name'];
	$fileTmpName =  $_FILES['file']['tmp_name'];
    $fileSize =  $_FILES['file']['size'];
    $fileError =  $_FILES['file']['error'];
    $fileType =  $_FILES['file']['type'];


    $fileExt = explode('.',$fileName );
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg','jpeg','png','pdf','doc','docx','txt');

    if (in_array($fileActualExt, $allowed)) {
    	if ($fileError===0) {
    		if ($fileSize< 10000000) {
    			$fileNameNew = uniqid('',true).".".$fileActualExt;
    			//$fileDestination = '../uploads/'.$fileNameNew;
    			//move_uploaded_file($fileTmpName, $fileDestination);
                $newObj=new CreationMaker(new AdminCreation());
                $newObj->setInfo($me,$fileName,$fileTmpName)->addCreation();
                
                
                $msg= "Successfully Uploaded!";

    			header("Location:../view/adminCreation.view.php? msg=$msg");
    			
    		}else{
    			$msg= "Your file is too big!";
    			header("Location:../view/adminCreation.view.php? msg=$msg");
    		}
    	}else{
    		$msg= "There was an error uploading your file!";
    		header("Location:../view/adminCreation.view.php? msg=$msg");
    	}
    }else{
    	$msg= "You cannot upload files of this type!";
    	header("Location:../view/adminCreation.view.php? msg=$msg");
    }


}
