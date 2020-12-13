<?php

//include_once('../includes/connect.php');
include_once("../view/donreq.con.php");
if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $type = $_POST['type'];
    $des = $_POST['des'];


    $objct = new Donation($name, $address, $email, $phone, $type, $des);
    $res = $objct->insertTo($name, $address, $email, $phone, $type, $des);
}
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

<?php include('navbar.php');?>

<div class="row">

    <div class="leftcolumn">

        <div class="cardNewContact">

            <div class="visionMissionTextMedium">Spread wisdom with your donations</div><br>

            <form action="" method="post">

                <div class="donationTextSmall">Full Name:</div>
                <input type="text" name="name" placeholder="Your Name..."> <br>
                <div class="donationTextSmall">Address:</div>
                <input type="text" name="address" placeholder="Your Address..."><br>
                <div class="donationTextSmall">Email:</div>
                <input type="text" name="email" placeholder="Your Email..."><br>
                <div class="donationTextSmall">Telephone:</div>
                <input type="text" name="phone" placeholder="Contact Number..."><br>
                <div class="donationTextSmall">Donation Type:</div>
                <input type="text" name="type" placeholder="Money / Books"><br>
                <div class="donationTextSmall">Description:</div>
                <input type="text" name="des" placeholder="Say something about donation..." style="height: 150px;"><br>
                <button type="submit" name="submit">Submit</button>

            </form>
        </div>
    </div>

    <div class="rightcolumn">
        <div class="card">

            <?php include('adminLogin.php');?>
            <?php include('userLogin.php');?>
            <?php include('userRegister.php');?>


        </div>

        <div class="card3">
            <p><img src="../images/phone.png" style="width:30px;height:25px;"/><sup> +94 76 782 3793</sup></p>
            <p><img src="../images/email.png" style="width:30px;height:30px;"/><a href="https://lib.justinwigewardhana@gmail.com/" target="_blank" style="text-decoration:none"><sup> lib.justinwigewardhana@gmail.com</sup></a> </p>
        </div>

        <div class="card">
            <?php include('slideShowQuotes.php');?>
        </div>
    </div>

</div>

<?php include('footer.php');?>

</body>
</html>
