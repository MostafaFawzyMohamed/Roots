<?php
session_start();
$cookie_name = "email";
$email=$_SESSION["email"];
$cookie_value = $email;
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
?>
<!DOCTYPE html >
<html>
<head>
<title>Add Plant</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css"></head>
<body class="Login">
<div id="cat2">
 <ul style="background-color: #DCDCDC;">
					<div class="class1 filter dropdown">
						<li id="Home" class="active filter"><a href="indexAfter.php">Home</a></li>
					</div>
						<div class="class1 filter dropdown">
						<li><button class="class1 dropbtn2" style="height:75px">
							Products	
						</button></li>
						<div class="dropdown-content" style="top:90px;">
							<a href="indoorAfter.php">Indoor Plants</a>
							<a href="OutdoorAfter.php">Outdoor Plants</a>
							<a href="ToolsAfter.php">Tools & Equipments</a>
						</div></div>
						<div class="class1 filter dropdown" >
							<li id="Services" class="filter"><a href="ServicesAfter.php">Services</a></li>
						</div>
						<div class="class1 filter dropdown" >
							<li id="Advice" class=" filter"><a href="AdvicesAfter.php">Advice & FAQs</a></li>
						</div>
                    </ul>
					<div align="right">
							<p><?php echo "Welcome admin";?></p>
							<a href="Logout.php"><button class="button button4">Logout</button></a><br>
					</div>
					
</div>

<div class="class2" align="center">		
    <form id="" method="post" action="AddP.php" enctype="multipart/form-data">

        <table class="rounded-corners" align="center" >
		<th>
			<legend><a href="index.html"><img src="logo.png" align="center" width="20%"></a></legend>
			<center><h1 style="color: #2a453c;">Add Plant</h1>
		</th>
			<tr>
                <td><select name="type" style="width:520px;">
						<option value="Indoor">Indoor</option>
						<option value="Outdoor">Outdoor</option>					
					</select>
				</td>
            </tr>
			<tr>
                <td><input type="text" placeholder="Title" name="title" id="title"></td>
            </tr>
			<tr>
                <td><center><input type="file" placeholder="Image" name="image" required/></td>
            </tr>
            <tr>
                <td>
					<input type="number" placeholder="Price" name="price" id="price" required/>
					</td>
				</div>
			</tr>
			<tr>
                <td>
					<input type="number" placeholder="Quantity" name="quantity" id="quantity" required/>
				</td>
			</tr>
			<td>
			 <a href="home.html"><button class="button button3" style="width:250px;">Add Plant</button></a>
               &nbsp; <input type="reset" class="button button2" style="width:250px;" value="Reset"/>
			</td>
        </table>	  
		</div>
		<br><br><br><br><br>
<footer>
        <img src="logo.png" width="250px" alt="Roots Logo">   
		<p>“Roots” turns your place into a green breather</p>
        <p>Copyright 2023-2024. All rights reserved by Roots Project</p>
		<div class="social-links">
                <a href="https://instagram.com/roots_pl?igshid=YzAwZjE1ZTI0Zg%3D%3D&utm_source=qr"><img src="./img/instgram.png" alt=""  height="50px" /></a>&nbsp &nbsp &nbsp
                <a href="mailto:Roots.pl00@gmail.com"><img src="./img/mail.png" alt="" height="70px"/></a>
				<a href="https://wa.me/+966545010018"><img src="img/whatsapp.png" alt="" height="80px"/></a>
		</div>
</footer>
</body>
</html>