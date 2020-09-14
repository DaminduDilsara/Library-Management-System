<?php
session_start();
include('../include/dbconnection.inc.php');
include('../controller/usercontroller.controller.php');
error_reporting(0);
$memNo=$_SESSION['memNo'];
$obuser=UserController::getInstance();
$result=$obuser->assignInfo($memNo);
?>

<!DOCTYPE html>

<head>
    <title>Online Library Management System | </title>

    <!-- CUSTOM STYLE  -->
    <link href="../style/style-Damindu.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">


</head>

<body>

<?php include('header.php');?>

<div class="row">

    <div class="cardNewContact">

        <div class="visionMissionTextMedium">Sorry, <?php echo ($obuser->getName());?><br>Your account has been expired!</div><br>
        <div class="visionMissionTextSmall">You have to renew your account from the library</div><br>
        <div class="visionMissionTextSmall">For more information you Can Contact the Librarian - +94 76 782 3793 (Mrs. Deepika Priyanthi)</div><br>
        <div class="visionMissionTextMedium">Thank You</div><br>
    </div>



    <?php include('footer.php');?>

</body>
</html>
