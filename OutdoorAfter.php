<?php
session_start();
$cookie_name = "email";
$email=$_SESSION["email"];
$connect = mysqli_connect("localhost", "root", "","roots");
$query = "SELECT * FROM `outdoor`";
mysqli_query($connect,"SET CHARACTER SET 'utf8'");
$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
$cookie_value = $email;
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
$query2 = "SELECT * FROM `customer` WHERE C_email='$email'";
$query3 = "SELECT * FROM `planter` WHERE P_email='$email'";
$result2 = mysqli_query($connect, $query2) or die(mysqli_error($connect));
$count2 = mysqli_num_rows($result2);
$result3 = mysqli_query($connect, $query3) or die(mysqli_error($connect));
$count3 = mysqli_num_rows($result3);
$type="";
$id="";
$name="";
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
	<meta charset="utf-8"/>
	<title>Outdoor</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
		.rate {
		float: center;
		height: 46px;
		padding: 0 100px;
		}
		.rate:not(:checked) > input {
			position:absolute;
			top:-9999px;
		}
		.rate:not(:checked) > label {
			float:right;
			width:1em;
			overflow:hidden;
			white-space:nowrap;
			cursor:pointer;
			font-size:30px;
			color:#ccc;
		}
		.rate:not(:checked) > label:before {
			content: '★ ';
		}
		.rate > input:checked ~ label {
			color: #ffc700;    
		}
		.rate:not(:checked) > label:hover,
		.rate:not(:checked) > label:hover ~ label {
			color: #deb217;  
		}
		.rate > input:checked + label:hover,
		.rate > input:checked + label:hover ~ label,
		.rate > input:checked ~ label:hover,
		.rate > input:checked ~ label:hover ~ label,
		.rate > label:hover ~ input:checked ~ label {
			color: #c59b08;
		}
	</style>
</head>
<body class="Login">
<div id="cat2" >
                    <ul style="background-color: #DCDCDC;">
					<div class="class1 filter dropdown">
						<li id="Home" class="active filter"><a href="indexAfter.php">Home</a></li>
					</div>
						<div class="class1 filter dropdown" style="height:68px;">
						<li><button class="class1 dropbtn" style="height:70px ">
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
						<div class="class1 filter dropdown" >
							<li id="Advice" class=" filter"><a href="AdvicesAfter.php">Advice & FAQs</a></li>
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
						</div>
						<div style="top:-25px;  left:100px; height:30px; width:50px; " class="class1 filter dropdown">
							<a href="Cart.php"><?php echo $count; ?></a>
						</div>
						<?php } ?>
                    </ul>
					<?php 
						if($email!="admin@roots.info"){?>
					
							<div style="text-align:right;">
								<a href="profile.php"><p style="font-size:25px;"><?php echo $name;?></p></a>
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
<div style="overflow-x:auto;">
<table border="0">
<tr>
<?php 
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
		 $title=$row["O_title"];
?>
	<td>
	<?php if($row["O_quantity"]==0){ ?>
	<center>
		<div style="background-color:#C0C0C0; filter: brightness(70%); width:350px; align:center;">
		<img src="<?php echo $row["O_img"] ?>" style="height:425px; width:350px; border: 1px solid white; background-color:white; padding: 10px;"><br>
		<?php 
		
			echo "<p style='font-size:18px;'>".$row["O_title"] . "<br><br>" .$row["O_price"] . " SAR</p>" ;
		?>
		<br><br><?php echo "Units: ".$row["O_quantity"] ?>
		<h3>Out Of Stock</h3><br><br>
		</div>
	<?php }else { ?>
	<center>
		<div style="background-color:white; width:350px; align:center;">
		
		<img src="<?php echo $row["O_img"] ?>" style="height:425px; width:350px; border: 1px solid white; background-color:white; padding: 10px;"><br>
		<?php 
		
			echo "<p style='font-size:18px;'>".$row["O_title"] . "<br>" .$row["O_price"] . " SAR</p>" ;
		?>
		<?php echo "Units: ".$row["O_quantity"] ?><br>
		<form method="post" action="AddTCart.php">
			<input type="text" name="Product_id" value="<?php echo $row["O_id"] ?>" hidden>
			<input type="text" name="Product_type" value="Outdoor" hidden>
			<input type="number" name="quantity" value="1" hidden>
			<?php if($type=="Customer" || $type=="Planter") {?>
			<input type="number" name="id" value=<?php echo $id; ?> hidden>
			<input type="text" name="type" value="<?php echo $type; ?>" hidden>
			<button class="button button4" type="submit"><i class="fa fa-shopping-cart" style="font-size:25px"> +</i></button>
		</form>
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
			if($type=="Customer"){
				$sqlRating = "SELECT * FROM `productorderedhistory` WHERE Customer_id=".$id; 
				$sqlPayment= "SELECT * FROM `payment` WHERE Cust_id=".$id; 
			}
			else{
				$sqlRating = "SELECT * FROM `productorderedhistory` WHERE Planter_id=".$id;
				$sqlPayment= "SELECT * FROM `payment` WHERE Planter_id=".$id; 
			}
			$resultRating = mysqli_query($connect, $sqlRating) or die(mysqli_error($connect));
			$resultPayment = mysqli_query($connect, $sqlPayment) or die(mysqli_error($connect));
			if ($resultPayment->num_rows > 0 && $resultRating->num_rows > 0) {
			// output data of each row
			echo "<center>";
			while($row2 = $resultRating->fetch_assoc()) {
				$Oid=$row2["O_id"];
				if($row["O_id"]==$Oid){
		?>
		<form method="post" action="Rating.php">
			<input type="number" name="id" value="<?php echo $id; ?>" hidden>
			<input type="text" name="email" value="<?php echo $email; ?>" hidden>
			<input type="text" name="type" value="<?php echo $type; ?>" hidden>
			<input type="text" name="Product_type" value="<?php echo "Outdoor"; ?>" hidden>
			<input type="number" name="Product_id" value="<?php echo $row["O_id"]; ?>" hidden>
			
			<div class="rate" id=<?php echo $title; ?>>
				<input type="radio"  id="<?php echo $title; ?> - 5" name="rate" value="5" />
				<label for="<?php echo $title; ?> - 5" title="5">5</label>
				<input type="radio" id="<?php echo $title; ?> - 4" name="rate" value="4" />
				<label for="<?php echo $title; ?> - 4" title="4">4</label>
				<input type="radio" id="<?php echo $title; ?> - 3" name="rate" value="3" />
				<label for="<?php echo $title; ?> - 3" title="3">3</label>
				<input type="radio"  id="<?php echo $title; ?> - 2" name="rate" value="2" />
				<label for="<?php echo $title; ?> - 2" title="2">2</label>
				<input type="radio"  id="<?php echo $title; ?> - 1"  name="rate" value="1" />
				<label for="<?php echo $title; ?> - 1"  title="1">1</label>
			</div>
			<br>
			<input type="submit" class="button button4" name="submit" value="Rate">
		</form><?php break; ?>
			<?php }} } ?>
		<br>
		<?php }
			if(isset($_GET['success'])&&isset($_GET['id'])&&$row["O_id"]==$_GET['id']){
			?>
			<p style="color:green;">&#10003; The product has been added successfully</p>
		<?php }} ?>
		</div>
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