<?php
$connect = mysqli_connect("localhost", "root", "","roots");
$query = "SELECT * FROM `outdoor`";
mysqli_query($connect,"SET CHARACTER SET 'utf8'");
$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
session_start();
if(isset($_SESSION["email"])) {
	$cookie_name = "email";
	session_start();
	$email=$_SESSION["email"];
	$cookie_value = $email;
	if($email=="admin@roots.info"){
		setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
		header("Location: OutdoorAfter.php");
	}
	else{
		setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
		header("Location: OutdoorAfter.php");
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
<!DOCTYPE html >
<html>
<head>
	<title>Outdoor</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="Login">
<div id="cat2">
                    <ul style="background-color: #DCDCDC;">
					<div class="class1 filter dropdown">
						<li id="Home" class="filter"><a href="index.php">Home</a></li>
					</div>
						<div class="class1 filter dropdown">
						<li><button class="class1 dropbtn">
							Products	
						</button></li>
						<div class="dropdown-content" style="top:100px;">
							<a href="indoor.php">Indoor Plants</a>
							<a href="outdoor.php">Outdoor Plants</a>
							<a href="Tools.php">Tools & Equipments</a>
						</div></div>
						<div class="class1 filter dropdown">
							<li id="Services" class="active filter"><a href="Services.php" >Services</a></li>
						</div>
						<div class="class1 filter dropdown">
							<li id="Advice" class="filter"><a href="Advices.php">Advice & FAQs</a></li>
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
<div style="top:150px; overflow-x:auto;">
<table border="0">
<tr>
<?php 
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
?>
	<td>
	<?php if($row["O_quantity"]==0){ ?>
	<center>
		<div style="background-color:#C0C0C0; filter: brightness(70%); width:350px; align:center;">
		<img src="<?php echo $row["O_img"] ?>" style="height:425px; width:350px; border: 1px solid white; background-color:white; padding: 10px;"><br>
		<?php 
		
			echo "<p style='font-size:18px;'>".$row["O_title"] . "<br>" .$row["O_price"] . " SAR</p>" ;
		?>
		<?php echo "Units: ".$row["O_quantity"] ?><br>
		<h3>Out Of Stock</h3><br><br><br><br>
		</div>
	<?php }else { ?>
	<center>
		<div style="background-color:white; width:350px; align:center;">
		<img src="<?php echo $row["O_img"] ?>" style="height:425px; width:350px; border: 1px solid white; background-color:white; padding: 10px;"><br>
		<?php 
		
			echo "<p style='font-size:18px;'>".$row["O_title"] . "<br>" .$row["O_price"] . " SAR</p>" ;
		?>
		<br><?php echo "Units: ".$row["O_quantity"] ?><br>
		<form method="post" action="AddTCart.php">
			<input type="text" name="Product_id" value="<?php echo $row["O_id"] ?>" hidden>
			<input type="text" name="Product_type" value="Outdoor" hidden>
			<input type="number" name="quantity" value="1" hidden>
			<br>
			<button class="button button4" type="submit"><i class="fa fa-shopping-cart" style="font-size:25px"> +</i></button>
		</form>
		<br>
		<?php 
			$Rating = "SELECT * FROM `rating` WHERE O_ID=".$row["O_id"] ;
			$sumRating=0;
			$i=0;
			$resultRate = mysqli_query($connect, $Rating) or die(mysqli_error($connect));
			if($resultRate->num_rows > 0 ){
				while($row3 = $resultRate->fetch_assoc()) {
					if($row3["O_ID"]==$row["O_id"]){
							$i++;
							$sumRating+=$row3["Rating_Value"];
					}
				}
				$avg=$sumRating/$i;
				echo "Rate : " . $avg;
			}
			
		?> 
		<?php 
			if(isset($_GET['success'])&&isset($_GET['id'])&&$row["O_id"]==$_GET['id']){
			?>
			<p style="color:green;">&#10003; The product has been added successfully</p>
		<?php } ?>
		</div>
	<?php } ?>
	</td>
	<?php 
	if($row['O_id']==3||$row['O_id']==6||$row['O_id']==9||$row['O_id']==12||$row['O_id']==15||$row['O_id']==18||$row['O_id']==21||$row['O_id']==23||$row['O_id']==26||$row['O_id']==29||$row['O_id']==32||$row['O_id']==25){
		echo "</tr>";
	}
		}
	}
	?>
	<td>
</tr>
</table>
<br>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br>
<footer>
        <img src="logo.png" width="250px" alt="Roots Logo">        
        <p>Copyright 2023-2024. All rights reserved by Roots Project</p>
		<div class="social-links">
                <a href="https://instagram.com/roots_pl?igshid=YzAwZjE1ZTI0Zg%3D%3D&utm_source=qr"><img src="./img/instgram.png" alt=""  height="50px" /></a>&nbsp &nbsp &nbsp
                <a href="mailto:Roots.pl00@gmail.com"><img src="./img/mail.png" alt="" height="70px"/></a>
				<a href="https://wa.me/+966545010018"><img src="img/whatsapp.png" alt="" height="80px"/></a>
		</div>
</footer>
</body>

</html>
<?php 
}
?>