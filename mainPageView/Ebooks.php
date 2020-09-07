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

        <div class="cardEbook">
            <img src="../images/Ebook.webp" style="width:100%; height:65%;">
            <div class="visionMissionTextMedium">E-Books</div><br>
            <div class="visionMissionTextSmall">We have a great collection of E-books Which any member of our library can enjoy reading</div>
            <div class="visionMissionTextMedium">Log in to read and enjoy</div><br>
            <div class="visionMissionTextSmall">Don't have an account? Come to our library to</div>
            <div class="visionMissionTextMedium">Register as a member</div><br>

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
