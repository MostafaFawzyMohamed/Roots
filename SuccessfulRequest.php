<?php
session_start();
$cookie_name = "email";
$email=$_SESSION["email"];
$cookie_value = $email;
$connect = mysqli_connect("localhost", "root", "","roots");
$query = "SELECT * FROM `advices`";
$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
$query2 = "SELECT * FROM `customer` WHERE C_email='$email'";
$query3 = "SELECT * FROM `planter` WHERE P_email='$email'";
$result2 = mysqli_query($connect, $query2) or die(mysqli_error($connect));
$count2 = mysqli_num_rows($result2);
$result3 = mysqli_query($connect, $query3) or die(mysqli_error($connect));
$count3 = mysqli_num_rows($result3);
$id="";
$name="";
$type="";
if ($count2 == 1)
{
	if ($result2->num_rows > 0) {
		// output data of each row
		while($row = $result2->fetch_assoc()) {
			$name=$row["C_Fname"] . "&nbsp" . $row["C_Lname"];
			$id=$row['Customer_id'];
			$type="Customer";
			$e=$row["C_email"];
		}
	}
}
else if ($count3 == 1){
	if ($result3->num_rows > 0) {
		// output data of each row
		while($row = $result3->fetch_assoc()) {
		$name=$row["P_Fname"] . "&nbsp" . $row["P_Lname"];
		$type="Planter";
		$e=$row["P_email"];
		$id=$row["Planter_id"];
		}
	}
}
$count=0;
if($type=="Planter")
	$query4 = "SELECT * FROM `cart` WHERE Planter_id = '$id'";
else
	$query4 = "SELECT * FROM `cart` WHERE Customer_id = '$id'";
$result4 = mysqli_query($connect, $query4) or die(mysqli_error($connect));
if ($result4->num_rows > 0) {
	// output data of each row
	while($row = $result4->fetch_assoc()) {
		$count++;
	}
}
?>
<!DOCTYPE html >
<html>
<head>
	<title>Successful Request</title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="style.css">
	<style>

        header {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
        }

        h1 {
            font-size: 36px;
        }

        .tab-container {
            max-width: 1200px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
			text-align: center;
        }

        .tab {
            display: none;
        }

        .detials {
            font-size: 16px;
            font-weight: normal;
			padding:25px;
            color: #021503;
			text-align:justify;
			line-height: 1.8;
            margin-bottom: 10px;
        }

        .tab-button {
            background-color:  #2a453c;
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            margin: 5px;
        }

		.success_container{
			background: #263238;
			padding: 30px 0px;
			text-align: center;
			color: #fff;
			margin-top: 60px;
			font-size: large;
		}

		.success_container h3{
			font-size: xx-large;
		}

		.success_container p{
			font-size: x-large;
		}

		.success_container h1{
			text-transform: uppercase;
		}

		.back-button{
			background-color: #fff;
			color: #2a453c;
			font-size: xx-large;
			padding: 10px 30px;
			margin: 15px !important;
			display: inline-block;
			border-radius: 5px;
			text-decoration: none;
		}

		.back-button:hover{
			text-decoration: none;
			border-radius: 0px 30px 30px 30px  ;
		}

		



    </style>
</head>
<body class="Login">
<div id="cat2">
                    <ul style="background-color: #DCDCDC;">
						<div class="class1 filter dropdown">
							<li id="Home" class="filter" ><a href="indexAfter.php">Home</a></li>
						</div>
						<div class="class1 filter dropdown" style="height:68px;">
						<li><button class="class1 dropbtn2" style="height:70px ">
							Products	
						</button></li>
						<div class="dropdown-content" style="top:100px;">
							<a href="indoorAfter.php">Indoor Plants</a>
							<a href="OutdoorAfter.php">Outdoor Plants</a>
							<a href="ToolsAfter.php">Tools & Equipments</a>
						</div></div>
						<div class="class1 filter dropdown" >
							<li id="Services" class="filter"><a href="ServicesAfter.php">Services</a></li>
						</div>
						<div class="class1 filter dropdown">
							<li id="Advice" style="background-color:#2a453c;" class="active filter"><a href="AdvicesAfter.php" style="color:white;">Advice & FAQs</a></li>
						</div>
						<?php if($email=="admin@roots.info"){?>
						<div class="class1 filter dropdown" style="width:200px;">
							<li id="Admin" class="filter"><a href="adminPannel.php">Admin</a></li>
						</div>
						<?php } ?>
						<div style="top:-30px;  left:120px; height:40px; width:50px; " class="class1 filter dropdown">
						
					<?php 
						if($email!="admin@roots.info"){?>
							<a href="Cart.php"><button class=" button1" style="border:0px; background-color: #DCDCDC; height:70px; "><img src="img/cart2.png" style="max-width:100px; height:50px;"></button></a>
						<?php } ?>
						</div>
						<div style="top:-25px;  left:100px; height:30px; width:50px; " class="class1 filter dropdown">
						<a href="Cart.php"><?php echo $count; ?></a>
						</div>
                    </ul>
					<?php 
						if($email!="admin@roots.info"){?>
					
							<div style="text-align:right;">
								<a href="profile.php"><p style="font-size:25px; color:white;"><?php echo $name;?></p></a>
								<a href="Logout.php"><button class="button button4">Logout</button></a><br>
								
							</div>
					<?php } 
					else if($email=="admin@roots.info"){
						?>
						<div style="text-align:right;">
								<p style="font-size:25px;"><p style="font-size:25px; color:white;">Welcome Admin</p></a>
								<a href="Logout.php"><button class="button button4">Logout</button></a><br>
								
						</div>
					<?php
					}
					?>
					
</div>


<div class="success_container">
        <img src="logo.png" width="250px" alt="Roots Logo">        
		<h3>Your request has been sent successfuly.</h3>
		<h1>Thank you</h1>
        <p><b>for shopping form Roots website.</b></p>
		<a class="back-button" href="index.php"> Back to Home page </a>
</div>


<br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br>


<div>
</div>
<footer>
        <img src="logo.png" width="250px" alt="Roots Logo">        
        <p>Copyright 2023-2024. All rights reserved by Roots Project</p>
		<div class="social-links">
                <a href="https://instagram.com/roots_pl?igshid=YzAwZjE1ZTI0Zg%3D%3D&utm_source=qr"><img src="./img/instgram.png" alt=""  height="50px" /></a>&nbsp &nbsp &nbsp
                <a href="mailto:Roots.pl00@gmail.com"><img src="./img/mail.png" alt="" height="70px"/></a>
				<a href="https://wa.me/+966545010018"><img src="img/whatsapp.png" alt="" height="80px"/></a>
		</div>
</footer>
<script>
        function openTab(tabName) {
            var i;
            var tabs = document.getElementsByClassName("tab");
            for (i = 0; i < tabs.length; i++) {
                tabs[i].style.display = "none";
            }
            document.getElementById(tabName).style.display = "block";
        }
</script>
</body>

</html>