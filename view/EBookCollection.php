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
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<?php
include('../include/header.inc.php');
include('../include/footer.inc.php');
include('../include/navbar.inc.php');
?>




<div class="row" >
        <div class="card" style="height: auto; min-height: 730px; text-align: center;">


            <button type="button" class="collapsible">Harry Potter Book Collection</button>
            <div class="content">
                <table align="center" border="1px" style="width:100%;">
                    <tr>
                        <th colspan="4"></th>
                    </tr>
                    <t>
                        <th> Book </th>
                        <th> Name </th>
                        <th> Download Link </th>
                    </t>
                    <?php
                    $data = $obuser->getEbooks("Harry");
                    while($rows = $data -> fetch_assoc())
                    {
                        ?>
                        <tr>
                            <td><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($rows['Picture'] ).'" height="100" width="70" class="img-thumnail" />'; ?></td>
                            <td><?php echo $rows['Name']; ?></td>
                            <?php $link = $rows['DownloadLink']?>
                            <td><?php echo "<a href='$link'>Download</a>" ; ?>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
            <br><br><br><br><br>

        </div>
</div>

</body>
</html>


<script>
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.maxHeight){
                content.style.maxHeight = null;
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
            }
        });
    }
</script>