<?php 
if(isset($_POST['total'])){
	$total = $_POST['total'];
}
?>
<!DOCTYPE html >
<html>
<head>
<title>Login</title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="Login">
<div id="cat2" >
                    <ul style="background-color: #DCDCDC;">
						<div class="class1 filter dropdown">
							<li id="Home" class=" filter"><a href="index.php">Home</a></li>
						</div>
						<div class="class1 filter dropdown">
						<li><button class="class1 dropbtn2">
							Products	
						</button></li>
						<div class="dropdown-content" style="top:90px;">
							<a href="indoor.php">Indoor Plants</a>
							<a href="outdoor.php">Outdoor Plants</a>
							<a href="Tools.php">Tools & Equipments</a>
						</div></div>
						<div class="class1 filter dropdown">
							<li id="Services" class=" filter"><a href="Services.php">Services</a></li>
						</div>
						<div class="class1 filter dropdown">
							<li id="Advice" class=" filter"><a href="Advices.php">Advice & FAQs</a></li
						</div>
                    </ul>
					<div align="right">
							<a href="Login.html"><button class="button button4">Login</button></a>
							<a href="Register.html"><button class="button button4">Registration</button></a>
					</div>
					
</div>
<div class="class2" align="center">		

    <form id="" method="post" action="Payment.php">
        <table class="rounded-corners">
		<input type="number" name="total" value="<?php echo $total;?>" hidden>
		<th>
			<legend><a href="index.html"><img src="logo.png" align="center" width="20%"></a></legend>
			<center><h1 style="color: #2a453c;">Login</h1>
		</th>
		<tr>
			<td><center><div style="width:100%;">
				<select name="type" required>
					<option value="">Select A Type</option>
					<option value="Admin">Admin</option>
					<option value="Planter">Planter</option>
					<option value="Customer">Customer</option>
				</select>
			</div></center>
		</tr>
            <tr>
                <td><input placeholder="Email" type="email" name="email" id="email" 
				title="email (format: xxx@xxx.com)" 
				pattern="^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$" required/></td>
            </tr>
            <tr>
                <td><input type="password" placeholder="Password" name="password" id="password" required/></td>
            </tr>
		<tr><td>
			<button class="button button3" style="width:255px;">Submit</button></a>
			<input type="reset" class="button button2" style="width:255px;" value="Reset"/> 
		</td>
		</tr>
        </table>
					   
    </form>
	<br><br><br><br><br>
		</div>
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