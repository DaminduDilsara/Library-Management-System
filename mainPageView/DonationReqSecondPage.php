<?php

//include_once('../includes/connect.php');
include_once("../controller/donationController.controller.php");
if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $type = $_POST['type'];
    $des = $_POST['des'];


    $objct = new AdminDonation($name, $address, $email, $phone, $type, $des);
    $res = $objct->addDonation($name, $address, $email, $phone, $type, $des);
}
?>


<!DOCTYPE html>

<head>
    <title>Online Library Management System | </title>

    <!-- CUSTOM STYLE  -->
    <link href="../style/style-Damindu.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <style >
        input[type=email]{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
    </style>

</head>

<body>

<?php include('header.php');?>
<?php
        include "../include/adminNavbar.inc.php";
    ?>

<div class="row">

    <div class="cardNewContact">

        <div class="visionMissionTextMedium">Spread wisdom with your donations</div><br>
                    <?php 

        if(isset($_POST['submit']))
         {

      if($res==true){?><div class="succwrap"><strong>SUCCESS</strong>:<?php echo 'Thank You For Joining with us!!! We will contact you soon...'; ?> </div><?php } 
        else{?><div class="errwrap"><strong>ERROR</strong>:<?php echo'Somthing wrong'; ?> </div><?php }}?>

        <form action="" method="post">

            <div class="donationTextSmall">Full Name:</div>
            <input type="text" name="name" placeholder="Your Name..." required/> <br>
            <div class="donationTextSmall">Address:</div>
            <input type="text" name="address" placeholder="Your Address..." required/><br>
            <div class="donationTextSmall">Email:</div>
            <input type="email" name="email" placeholder="Your Email..." required/><br>
            <div class="donationTextSmall">Telephone:</div>
            <input type="text" name="phone" placeholder="Contact Number..." required/><br>
            <div class="donationTextSmall">Donation Type:</div>
            <input type="text" name="type" placeholder="Money / Books" required/><br>
            <div class="donationTextSmall">Description:</div>
            <input type="text" name="des" placeholder="Say something about donation..." style="height: 150px;" required/><br>
            <button type="submit" name="submit">Submit</button>

        </form>
    </div>



    <?php include('footer.php');?>

</body>
</html>
