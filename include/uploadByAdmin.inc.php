<?php
session_start();
include_once('../include/dbconnection.inc.php');
//include_once('../controller/usercontroller.controller.php');
include_once('../controller/creationController.controller.php');

// spl_autoload_register('autoload');

if (isset($_POST['submit'])){
    $file = $_FILES['file'];
    $me= $_POST['memNo'];
    $fileName =  $_FILES['file']['name'];
    $fileTmpName =  $_FILES['file']['tmp_name'];
    $fileSize =  $_FILES['file']['size'];
    $fileError =  $_FILES['file']['error'];
    $fileType =  $_FILES['file']['type'];
    $validation = false;

    
        $host = "localhost";
        $user = "root";
        $pwd= "";
        $dbName = "newlibrarydb";

        $dsn = 'mysql:host='.$host.';dbname='.$dbName;
        $con = new PDO($dsn,$user,$pwd);
        $con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);

        $sql = "SELECT * FROM member WHERE MembershipNo = {$me}  and Deleted = 0";

        $query = $con->prepare($sql);
        // echo '<pre>';
        // var_dump($me);
        // echo '</pre>';
        // die();

        $query->execute(); 
        
        $query = $query->fetchAll();
        // echo '<pre>';
        // var_dump($query);
        // echo '</pre>';
        // die();

        if($query != null){
          $validation = true;  
        }

    
    

    $fileExt = explode('.',$fileName );
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg','jpeg','png');

    if ($validation){

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError===0) {
            if ($fileSize< 10000000) {
                //$fileNameNew = uniqid('',true).".".$fileActualExt;
                $fileDestination = '../uploads/'.$fileName;
                move_uploaded_file($fileTmpName, $fileDestination);
                $newObj=new CreationMaker(new AdminCreation());
                $newObj->setInfo($me,$fileName,$fileActualExt);
                $newObj->addCreation();
                
                
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
        $msg= "You cannot upload this type of files!";
        header("Location:../view/adminCreation.view.php? msg=$msg");
    }
    }else{
        $msg= "This Membership Number is invalid!";
        header("Location:../view/adminCreation.view.php? msg=$msg");
    }


}
