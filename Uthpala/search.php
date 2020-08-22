
<!DOCTYPE html>
<html>
<head>
	<title>Search Item</title>
	<link rel="stylesheet" type="text/css" href="s.css">

</head>
<body>
	<?php include('header.php');?>
		<div class="s-middle">
			<div class="s-left">
                    <form action="" method="post">
                        <input type="text" name="search">
                        <input type="submit" name="submit" value="Search" >
                    </form>
					
				<h3>Search Results</h3>	
                    
                    <?php
                        $search_value=$_POST["search"];
                        $con=new mysqli('localhost','root','','testphp');
                        if($con->connect_error){
                            echo 'Connection Faild: '.$con->connect_error;
                        }else{
                            $sql="select * from books where Name like '%$search_value%'";
                            $res=$con->query($sql);
                            if (mysqli_num_rows($res) > 0) { ?>
                                <table align="center" border="1px" style="width:600px; line-height:40px; background-color: white; color: black;">
                                    <tr>
                                    <th colspan="4"><h2>Search Results</h2></th>
                                    </tr>
                                    <t>
                                    <th> Name </th>
                                    <th> Author </th>
                                    <th> Available</th>
                                    </t>
                    <?php

                        while($row=$res->fetch_assoc()){
                    ?>

                    <tr>
                        <td><?php echo $row['Name']; ?></td>
                        <td><?php echo $row['Author']; ?></td>
                        <td><?php echo $row['Available']; ?></td>
                    </tr>     

        
                    <?php
                        } 

                        }else{echo "No Match results";}
                        }
                    ?>    
                        </table>
		
			</div>
	
			<div class="s-right">
                <h1>New Arrivals</h1>
			</div>
		</div>
	<?php include('footer.php');?>
</body>
</html>