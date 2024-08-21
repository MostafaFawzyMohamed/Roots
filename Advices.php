<?php
$connect = mysqli_connect("localhost", "root", "","roots");
$query = "SELECT * FROM `advices`";
$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
session_start();
if(isset($_SESSION["email"])) {
	$cookie_name = "email";
	session_start();
	$email=$_SESSION["email"];
	$cookie_value = $email;
	if($email=="admin@roots.info"){
		setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
		header("Location: AdvicesAfter.php");
	}
	else{
		setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
		header("Location: AdvicesAfter.php");
	}
} 
else {
$count=0;
$query3 = "SELECT * FROM `cartnotlogin`";
$connect = mysqli_connect("localhost", "root", "","roots");
$result3 = mysqli_query($connect, $query3) or die(mysqli_error($connect));
		if ($result3->num_rows > 0) {
			while($row = $result3->fetch_assoc()) {
				$count++;
			}
		}
	

?>
<!DOCTYPE html>
<html>
<head>
	<title>Advices & FAQs</title>
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
    </style>
</head>
<body class="Login">
<div id="cat2">
                    <ul style="background-color: #DCDCDC;">
					<div class="class1 filter dropdown">
						<li id="Home" class="filter"><a href="index.php">Home</a></li>
					</div>
						<div class="class1 filter dropdown">
						<li><button class="class1 dropbtn2">
							Products	
						</button></li>
						<div class="dropdown-content" style="top:100px;">
							<a href="indoor.php">Indoor Plants</a>
							<a href="outdoor.php">Outdoor Plants</a>
							<a href="Tools.php">Tools & Equipments</a>
						</div></div>
						<div class="class1 filter dropdown">
							<li  id="Services" class="filter"><a href="Services.php">Services</a></li>
						</div>
						<div class="class1 filter dropdown">
							<li style="background-color:#2a453c;" id="Advice" class="active filter"><a href="Advices.php" style="color:white;">Advice & FAQs</a></li>
						</div>
						<div style="top:-30px;  left:120px; height:40px; width:50px; " class="class1 filter dropdown">
							<a href="CartWithoutLogin.php"><button class=" button1" style="border:0px; background-color: #DCDCDC; height:60px; "><img src="img/cart2.png" style="max-width:80px; max-height:50px;"></button></a>
						</div>
						<div style="top:-25px;  left:100px; height:30px; width:50px; " class="class1 filter dropdown">
						<a href="CartWithoutLogin.php"><?php echo $count; ?></a>
						</div>
                    </ul>
					<div align="right">
							<a href="Login.html"><button class="button button4">Login</button></a>
							<a href="Register.html"><button class="button button4">Registration</button></a>
					</div>
					
</div>
<?php 
if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
?>
<div class="tab-container">
        <button class="tab-button" onclick="openTab('<?php echo $row['A_id'] ;?>')"> <?php echo $row['A_title']; ?>:</button>
		
        <div id="<?php echo $row['A_id'] ; ?>" class="tab">
            <div class="qa">
                <div class="detials">
					<?php echo $row['A_details']; ?>
				</div>
			</div>
		</div>
</div>
<?php 
	} 
} 
?>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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
<?php 
}
?>