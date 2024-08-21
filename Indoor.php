<?php
$connect = mysqli_connect("localhost", "root", "","roots");
$query = "SELECT * FROM `indoor`";
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
		header("Location: IndoorAfter.php");
	}
	else{
		setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
		header("Location: IndoorAfter.php");
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
	<meta charset="utf-8"/>
	<title>Indoor</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
<style>
* {box-sizing: border-box}
.mySlides1, .mySlides2 {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a grey background color */
.prev:hover, .next:hover {
  background-color: #f1f1f1;
  color: black;
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
						<li><button class="class1 dropbtn">
							Products	
						</button></li>
						<div class="dropdown-content" style="top:90px;">
							<a href="indoor.php">Indoor Plants</a>
							<a href="outdoor.php">Outdoor Plants</a>
							<a href="Tools.php">Tools & Equipments</a>
						</div></div>
						<div class="class1 filter dropdown">
							<li id="Services" class="active filter"><a href="Services.php">Services</a></li>
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
<div style="overflow-x:auto;">
<table border="0">
<tr>
<?php 
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
?>

		<?php 
			if($row['I_id']==13){
				$img=$row['I_img'];
				?>
				<td>
				<center>
				<div class="slideshow-container">
				<div class="mySlides1">
				<div style="background-color:white; width:350px; align:center;">
				<img src="<?php echo $row["I_img"] ;?>" style="height:425px; width:350px; border: 1px solid white; background-color:white; padding: 10px;"><br>
				<?php echo $row["I_title"] ?><br><?php echo $row["I_price"] ?> SAR
				<br><?php echo "Units: ".$row["I_quantity"] ?><br>
				<form method="post" action="AddTCart.php">
				<input type="text" name="Product_id" value="<?php echo $row["I_id"] ?>" hidden>
				<input type="text" name="Product_type" value="Indoor" hidden>
				<input type="number" name="quantity" value="1" hidden>
				<br>
				<button class="button button4" type="submit"><i class="fa fa-shopping-cart" style="font-size:25px"> +</i></button>
				</form>
				<?php 
				$Rating = "SELECT * FROM `rating` WHERE I_ID=".$row["I_id"] ;
				$sumRating=0;
				$i=0;
				$resultRate = mysqli_query($connect, $Rating) or die(mysqli_error($connect));
				if($resultRate->num_rows > 0 ){
					while($row3 = $resultRate->fetch_assoc()) {
						if($row3["I_ID"]==$row["I_id"]){
								$i++;
								$sumRating+=$row3["Rating_Value"];
						}
					}
					$avg=$sumRating/$i;
					echo "Rate : " . $avg;
				}
				
				?> 
				<br>
				<?php 
					if(isset($_GET['success'])&&isset($_GET['id'])&&$row["I_id"]==$_GET['id']){
					?>
					<p style="color:green;">&#10003; The product has been added successfully</p>
				<?php } ?>
				</div>
				</div>
		<?php
			}
			if($row['I_id']==14){
			?>
			<div class="mySlides1">
			<div style="background-color:white; width:350px; align:center;">
			<img src="<?php echo $row["I_img"] ;?>" style="height:425px; width:350px; border: 1px solid white; background-color:white; padding: 10px;"><br>
			<?php echo $row["I_title"] ?><br><?php echo $row["I_price"] ?> SAR
			<br><?php echo "Units: ".$row["I_quantity"] ?><br>
			<form method="post" action="AddTCart.php">
				<input type="text" name="Product_id" value="<?php echo $row["I_id"] ?>" hidden>
				<input type="text" name="Product_type" value="Indoor" hidden>
				<input type="number" name="quantity" value="1" hidden>
				<br>
				<button class="button button4" type="submit"><i class="fa fa-shopping-cart" style="font-size:25px"> +</i></button>
			</form>
			<br>
			<?php 
				$Rating = "SELECT * FROM `rating` WHERE I_ID=".$row["I_id"] ;
				$sumRating=0;
				$i=0;
				$resultRate = mysqli_query($connect, $Rating) or die(mysqli_error($connect));
				if($resultRate->num_rows > 0 ){
					while($row3 = $resultRate->fetch_assoc()) {
						if($row3["I_ID"]==$row["I_id"]){
								$i++;
								$sumRating+=$row3["Rating_Value"];
						}
					}
					$avg=$sumRating/$i;
					echo "Rate : " . $avg;
				}
				
				?> 
			<?php 
				if(isset($_GET['success'])&&isset($_GET['id'])&&$row["I_id"]==$_GET['id']){
				?>
				<p style="color:green;">&#10003; The product has been added successfully</p>
			<?php } ?>
			</div>
			</div>
		<?php
			echo "<div style='text-align:center'>";
			echo "<span onclick='current(1, 0)'><img src='". $img . "' style='height:50px; width:50px;'/></span>";
			echo "<span onclick='current(2, 0)'><img src='". $row["I_img"] . "' style='height:50px; width:50px;'/></span>";
			echo "</div></div></td>";
		}
		if($row['I_id']==15){
				$img=$row['I_img'];
				?>
				<td>
				<center>
				<div class="slideshow-container">
				<div class="mySlides2">
				<div style="background-color:white; width:350px; align:center;">
				<img src="<?php echo $row["I_img"] ;?>" style="height:425px; width:350px; border: 1px solid white; background-color:white; padding: 10px;"><br>
				<?php echo $row["I_title"] ?><br><?php echo $row["I_price"] ?> SAR
				<br><?php echo "Units: ".$row["I_quantity"] ?><br>
				<form method="post" action="AddTCart.php">
				<input type="text" name="Product_id" value="<?php echo $row["I_id"] ?>" hidden>
				<input type="text" name="Product_type" value="Indoor" hidden>
				<input type="number" name="quantity" value="1" hidden>
				<br>
				<button class="button button4" type="submit"><i class="fa fa-shopping-cart" style="font-size:25px"> +</i></button>
				</form>
				<br>
				<?php 
				$Rating = "SELECT * FROM `rating` WHERE I_ID=".$row["I_id"] ;
				$sumRating=0;
				$i=0;
				$resultRate = mysqli_query($connect, $Rating) or die(mysqli_error($connect));
				if($resultRate->num_rows > 0 ){
					while($row3 = $resultRate->fetch_assoc()) {
						if($row3["I_ID"]==$row["I_id"]){
								$i++;
								$sumRating+=$row3["Rating_Value"];
						}
					}
					$avg=$sumRating/$i;
					echo "Rate : " . $avg;
				}
				
				?> 
				<?php 
				if(isset($_GET['success'])&&isset($_GET['id'])&&$row["I_id"]==$_GET['id']){
				?>
				<p style="color:green;">&#10003; The product has been added successfully</p>
				<?php } ?>
				</div>
				</div>
		<?php
			}
			
			if($row['I_id']==16){
			$img2=$row['I_img'];
			?>
			<div class="mySlides2">
			<div style="background-color:white; width:350px; align:center;">
			<img src="<?php echo $row["I_img"] ;?>" style="height:425px; width:350px; border: 1px solid white; background-color:white; padding: 10px;"><br>
			<?php echo $row["I_title"] ?><br><?php echo $row["I_price"] ?> SAR
			<br><?php echo "Units: ".$row["I_quantity"] ?><br>
			<form method="post" action="AddTCart.php">
				<input type="text" name="Product_id" value="<?php echo $row["I_id"] ?>" hidden>
				<input type="text" name="Product_type" value="Indoor" hidden>
				<input type="number" name="quantity" value="1" hidden>
				<br>
				<button class="button button4" type="submit"><i class="fa fa-shopping-cart" style="font-size:25px"> +</i></button>
			</form>
			<br>
			<?php 
				$Rating = "SELECT * FROM `rating` WHERE I_ID=".$row["I_id"] ;
				$sumRating=0;
				$i=0;
				$resultRate = mysqli_query($connect, $Rating) or die(mysqli_error($connect));
				if($resultRate->num_rows > 0 ){
					while($row3 = $resultRate->fetch_assoc()) {
						if($row3["I_ID"]==$row["I_id"]){
								$i++;
								$sumRating+=$row3["Rating_Value"];
						}
					}
					$avg=$sumRating/$i;
					echo "Rate : " . $avg;
				}
				
				?> 
			<?php 
				if(isset($_GET['success'])&&isset($_GET['id'])&&$row["I_id"]==$_GET['id']){
				?>
				<p style="color:green;">&#10003; The product has been added successfully</p>
			<?php } ?>
			</div>
			</div>
			
		<?php
			}
			if($row['I_id']==17){
			?>
			<center>
			<div class="mySlides2">
			<div style="background-color:white; width:350px; align:center;">
			<img src="<?php echo $row["I_img"] ;?>" style="height:425px; width:350px; border: 1px solid white; background-color:white; padding: 10px;"><br>
			<?php echo $row["I_title"] ?><br><?php echo $row["I_price"] ?> SAR
			<br><?php echo "Units: ".$row["I_quantity"] ?><br>
			<form method="post" action="AddTCart.php">
				<input type="text" name="Product_id" value="<?php echo $row["I_id"] ?>" hidden>
				<input type="text" name="Product_type" value="Indoor" hidden>
				<input type="number" name="quantity" value="1" hidden>
				<br>
				<button class="button button4" type="submit"><i class="fa fa-shopping-cart" style="font-size:25px"> +</i></button>
			</form>
			<?php 
				$Rating = "SELECT * FROM `rating` WHERE I_ID=".$row["I_id"] ;
				$sumRating=0;
				$i=0;
				$resultRate = mysqli_query($connect, $Rating) or die(mysqli_error($connect));
				if($resultRate->num_rows > 0 ){
					while($row3 = $resultRate->fetch_assoc()) {
						if($row3["I_ID"]==$row["I_id"]){
								$i++;
								$sumRating+=$row3["Rating_Value"];
						}
					}
					$avg=$sumRating/$i;
					echo "Rate : " . $avg;
				}
				
				?> 
			<?php 
				if(isset($_GET['success'])&&isset($_GET['id'])&&$row["I_id"]==$_GET['id']){
				?>
				<p style="color:green;">&#10003; The product has been added successfully</p>
			<?php } ?>
			</div>
			</div>
			<?php
			echo "<div style='text-align:center'>";
			echo "<span onclick='current(1, 1)'><img src='". $img . "' style='height:50px; width:50px;'/></span>";
			echo "<span onclick='current(2, 1)'><img src='". $img2 . "' style='height:50px; width:50px;'/></span>";
			echo "<span onclick='current(3, 1)'><img src='". $row["I_img"] . "' style='height:50px; width:50px;'/></span>";
			echo "</div></div></td>";
		}
		if($row['I_id']==18){
				$img=$row['I_img'];
				?>
				<td>
				<center>
				<div class="slideshow-container">
				<div class="mySlides3">
				<div style="background-color:white; width:350px; align:center;">
				<img src="<?php echo $row["I_img"] ;?>" style="height:425px; width:350px; border: 1px solid white; background-color:white; padding: 10px;"><br>
				<?php echo $row["I_title"] ?><br><?php echo $row["I_price"] ?> SAR
				<br><?php echo "Units: ".$row["I_quantity"] ?><br>
				<form method="post" action="AddTCart.php">
				<input type="text" name="Product_id" value="<?php echo $row["I_id"] ?>" hidden>
				<input type="text" name="Product_type" value="Indoor" hidden>
				<input type="number" name="quantity" value="1" hidden>
				<br>
				<button class="button button4" type="submit"><i class="fa fa-shopping-cart" style="font-size:25px"> +</i></button>
				</form>
				<?php 
				$Rating = "SELECT * FROM `rating` WHERE I_ID=".$row["I_id"] ;
				$sumRating=0;
				$i=0;
				$resultRate = mysqli_query($connect, $Rating) or die(mysqli_error($connect));
				if($resultRate->num_rows > 0 ){
					while($row3 = $resultRate->fetch_assoc()) {
						if($row3["I_ID"]==$row["I_id"]){
								$i++;
								$sumRating+=$row3["Rating_Value"];
						}
					}
					$avg=$sumRating/$i;
					echo "Rate : " . $avg;
				}
				
				?> 
				<?php 
				if(isset($_GET['success'])&&isset($_GET['id'])&&$row["I_id"]==$_GET['id']){
				?>
				<p style="color:green;">&#10003; The product has been added successfully</p>
				<?php } ?>
				</div>
				</div>
		<?php
			}
			
			if($row['I_id']==19){
			$img2=$row['I_img'];
			?>
			<div class="mySlides3">
			<div style="background-color:white; width:350px; align:center;">
			<img src="<?php echo $row["I_img"] ;?>" style="height:425px; width:350px; border: 1px solid white; background-color:white; padding: 10px;"><br>
			<?php echo $row["I_title"] ?><br><?php echo $row["I_price"] ?> SAR
			<br><?php echo "Units: ".$row["I_quantity"] ?><br>
			<form method="post" action="AddTCart.php">
				<input type="text" name="Product_id" value="<?php echo $row["I_id"] ?>" hidden>
				<input type="text" name="Product_type" value="Indoor" hidden>
				<input type="number" name="quantity" value="1" hidden>
				<br>
				<button class="button button4" type="submit"><i class="fa fa-shopping-cart" style="font-size:25px"> +</i></button>
			</form>
			<?php 
				$Rating = "SELECT * FROM `rating` WHERE I_ID=".$row["I_id"] ;
				$sumRating=0;
				$i=0;
				$resultRate = mysqli_query($connect, $Rating) or die(mysqli_error($connect));
				if($resultRate->num_rows > 0 ){
					while($row3 = $resultRate->fetch_assoc()) {
						if($row3["I_ID"]==$row["I_id"]){
								$i++;
								$sumRating+=$row3["Rating_Value"];
						}
					}
					$avg=$sumRating/$i;
					echo "Rate : " . $avg;
				}
				
			?> 
			<?php 
				if(isset($_GET['success'])&&isset($_GET['id'])&&$row["I_id"]==$_GET['id']){
				?>
				<p style="color:green;">&#10003; The product has been added successfully</p>
			<?php } ?>
			</div>
			</div>
			
		<?php
			}
			if($row['I_id']==20){
				$img3=$row['I_img'];
			?>
			<center>
			<div class="mySlides3">
			<div style="background-color:white; width:350px; align:center;">
			<img src="<?php echo $row["I_img"] ;?>" style="height:425px; width:350px; border: 1px solid white; background-color:white; padding: 10px;"><br>
			<?php echo $row["I_title"] ?><br><?php echo $row["I_price"] ?> SAR
			<br><?php echo "Units: ".$row["I_quantity"] ?><br>
			<form method="post" action="AddTCart.php">
				<input type="text" name="Product_id" value="<?php echo $row["I_id"] ?>" hidden>
				<input type="text" name="Product_type" value="Indoor" hidden>
				<input type="number" name="quantity" value="1" hidden>
				<br>
				<button class="button button4" type="submit"><i class="fa fa-shopping-cart" style="font-size:25px"> +</i></button>
			</form>
			<?php 
				$Rating = "SELECT * FROM `rating` WHERE I_ID=".$row["I_id"] ;
				$sumRating=0;
				$i=0;
				$resultRate = mysqli_query($connect, $Rating) or die(mysqli_error($connect));
				if($resultRate->num_rows > 0 ){
					while($row3 = $resultRate->fetch_assoc()) {
						if($row3["I_ID"]==$row["I_id"]){
								$i++;
								$sumRating+=$row3["Rating_Value"];
						}
					}
					$avg=$sumRating/$i;
					echo "Rate : " . $avg;
				}
				
			?> 
			<?php 
				if(isset($_GET['success'])&&isset($_GET['id'])&&$row["I_id"]==$_GET['id']){
				?>
				<p style="color:green;">&#10003; The product has been added successfully</p>
			<?php } ?>
			</div>
			</div>
			<?php
			}
			if($row['I_id']==21){
			?>
			<center>
			<div class="mySlides3">
			<div style="background-color:white; width:350px; align:center;">
			<img src="<?php echo $row["I_img"] ;?>" style="height:425px; width:350px; border: 1px solid white; background-color:white; padding: 10px;"><br>
			<?php echo $row["I_title"] ?><br><?php echo $row["I_price"] ?> SAR
			<br><?php echo "Units: ".$row["I_quantity"] ?><br>
			<form method="post" action="AddTCart.php">
				<input type="text" name="Product_id" value="<?php echo $row["I_id"] ?>" hidden>
				<input type="text" name="Product_type" value="Indoor" hidden>
				<input type="number" name="quantity" value="1" hidden>
				<br>
				<button class="button button4" type="submit"><i class="fa fa-shopping-cart" style="font-size:25px"> +</i></button>
			</form>
			<?php 
				$Rating = "SELECT * FROM `rating` WHERE I_ID=".$row["I_id"] ;
				$sumRating=0;
				$i=0;
				$resultRate = mysqli_query($connect, $Rating) or die(mysqli_error($connect));
				if($resultRate->num_rows > 0 ){
					while($row3 = $resultRate->fetch_assoc()) {
						if($row3["I_ID"]==$row["I_id"]){
								$i++;
								$sumRating+=$row3["Rating_Value"];
						}
					}
					$avg=$sumRating/$i;
					echo "Rate : " . $avg;
				}
				
			?> 
			<?php 
				if(isset($_GET['success'])&&isset($_GET['id'])&&$row["I_id"]==$_GET['id']){
				?>
				<p style="color:green;">&#10003; The product has been added successfully</p>
			<?php } ?>
			</div>
			</div>
			<?php
			echo "<div style='text-align:center'>";
			echo "<span onclick='current(1, 2)'><img src='". $img . "' style='height:50px; width:50px;'/></span>";
			echo "<span onclick='current(2, 2)'><img src='". $img2 . "' style='height:50px; width:50px;'/></span>";
			echo "<span onclick='current(3, 2)'><img src='". $img3 . "' style='height:50px; width:50px;'/></span>";
			echo "<span onclick='current(4, 2)'><img src='". $row["I_img"] . "' style='height:50px; width:50px;'/></span>";
			echo "</div></div></td>";
		}	
	else if($row['I_id']!=13&&$row['I_id']!=14&&$row['I_id']!=15&&$row['I_id']!=16&&$row['I_id']!=17&&$row['I_id']!=18&&$row['I_id']!=19&&$row['I_id']!=20&&$row['I_id']!=21){
		?>
			<td>
			<center>
			<div style="background-color:white; width:350px; align:center;">
		<img src="<?php echo $row["I_img"] ?>" style="height:425px; width:350px; border: 1px solid white; background-color:white; padding: 10px;"><br>
		<?php 
		
			echo "<p style='font-size:18px;'>".$row["I_title"] . "<br>" .$row["I_price"] . " SAR</p>" ;
		?>
		<?php echo "Units: ".$row["I_quantity"] ?><br>
		<form method="post" action="AddTCart.php">
			<input type="text" name="Product_id" value="<?php echo $row["I_id"] ?>" hidden>
			<input type="text" name="Product_type" value="Indoor" hidden>
			<input type="number" name="quantity" value="1" hidden>
			<br>
			<button class="button button4" type="submit"><i class="fa fa-shopping-cart" style="font-size:25px"> +</i></button>
		</form>
		<?php 
				$Rating = "SELECT * FROM `rating` WHERE I_ID=".$row["I_id"] ;
				$sumRating=0;
				$i=0;
				$resultRate = mysqli_query($connect, $Rating) or die(mysqli_error($connect));
				if($resultRate->num_rows > 0 ){
					while($row3 = $resultRate->fetch_assoc()) {
						if($row3["I_ID"]==$row["I_id"]){
								$i++;
								$sumRating+=$row3["Rating_Value"];
						}
					}
					$avg=$sumRating/$i;
					echo "Rate : " . $avg;
				}
				
				?> 
		<?php 
			if(isset($_GET['success'])&&isset($_GET['id'])&&$row["I_id"]==$_GET['id']){
		?>
		<p style="color:green;">&#10003; The product has been added successfully</p>
		<?php } ?>
		</div>
	<?php
	}
	if($row['I_id']==3||$row['I_id']==6||$row['I_id']==9||$row['I_id']==12||$row['I_id']==21|$row['I_id']==21){
		echo "</tr>";
	}
		}
	}
	?>
	</td>
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
<script>
let slideIndex = [1,1,1];
let slideId = ["mySlides1", "mySlides2" , "mySlides3" ]
showSlides(1, 0);
showSlides(1, 1);
showSlides(1, 2);

function plusSlides(n, no) {
  showSlides(slideIndex[no] += n, no);
}

function current(n, no) {
  showSlides(slideIndex[no] = n, no);
}

function showSlides(n, no) {
  let i;
  let x = document.getElementsByClassName(slideId[no]);
  if (n > x.length) {slideIndex[no] = 1}    
  if (n < 1) {slideIndex[no] = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex[no]-1].style.display = "block";  
}

</script>
</body>

</html>
<?php 
}
?>