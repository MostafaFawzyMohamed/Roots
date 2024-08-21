<?php
session_start();
if(isset($_SESSION["email"])) {
	$cookie_name = "email";
	session_start();
	$email=$_SESSION["email"];
	$cookie_value = $email;
	if($email!="admin@roots.info"){
		setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
		header("Location: Cart.php");
	}
	else{
		setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
		header("Location: AdminPannel.php");
	}
} 
else {
	$count=0;
	$connect = mysqli_connect("localhost", "root", "","roots");
	mysqli_query($connect,"SET CHARACTER SET 'utf8'");
	$finalTotal=0;
	$i=1;
	$query3 = "SELECT * FROM `cartnotlogin`";
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

<title>Cart</title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="cat">
                    <ul>
						<li id="Home" class="filter"><a href="index.php">Home</a></li>
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
							<li id="Services" class=" filter"><a href="Services.php">Services</a></li>
						</div>
						<div class="class1 filter dropdown">
							<li id="Advice" class=" filter"><a href="Advices.php">Advice & FAQs</a></li>
						</div>
						<div style="top:-30px;  left:120px; height:40px; width:50px; " class="class1 filter dropdown">
							<a href="CartWithoutLogin.php"><button class=" button1" style="border:0px; background-color: #2a453c; height:100px; "><img src="img/cart.png" style="max-width:80px; max-height:50px;"></button></a>
						</div>
						<div style="top:-25px;  left:100px; height:30px; width:50px; " class="class1 filter dropdown">
						<a href="CartWithoutLogin.php" style="color:white;"><?php echo $count; ?></a>
						</div>
					
                    </ul>
					<div align="right">
							<a href="Login.html"><button class="button button4">Login</button></a>
							<a href="Register.html"><button class="button button4">Registration</button></a>
					</div>
					
</div>
<h1 style="color: #2a453c;">Your Cart</h1></center>
<div class="split left" style="width:1200px; height:1200px;  left:50px;" align="left">
	
    <form id="" method="post" action="Payment.php">
        <table style="width:1200px;">
		<th style="text-align:left" colspan="2">PRODUCT</th>
		<th>PRICE</th>
		<th>QUANTITY</th>
		<th>TOTAL</th>
		<th>Delete</th>
		<?php 
		$prodPrice=0;
		$prodTitle="";
		$query3 = "SELECT * FROM `cartnotlogin`";
		$result3 = mysqli_query($connect, $query3) or die(mysqli_error($connect));
		if ($result3->num_rows > 0) {
			$list = [];
			var_dump($list);
			//var_dump($result3->fetch_assoc());
			//var_dump( mysqli_fetch_all($result3, 1));
			while($row = $result3->fetch_assoc()){
				$list[] = $row;
			}
			var_dump($list);
			exit;
			// output data of each row
			echo "<center>";
			while($row = $result3->fetch_assoc()) {
				$cart_id=$row["cart_id"];
				$ptype=$row["Prod_type"];
				$Oid=$row["O_id"];
				$Iid=$row["I_id"];
				$Tid=$row["T_id"];
				$quantity=$row["quantity"];
				if($ptype=="Outdoor"){
					$sqlImg="Select O_title,O_img,O_price FROM outdoor WHERE O_id=".$Oid;
					$result4 = mysqli_query($connect, $sqlImg) or die(mysqli_error($connect));
					if ($result4->num_rows > 0) {
						// output data of each row
						echo "<center>";
						while($row = $result4->fetch_assoc()) {
							$prodImg=$row["O_img"];
							$prodPrice=$row["O_price"];
							$prodTitle=$row["O_title"];
						}
					}
				}
				else if($ptype=="Indoor"){
					$sqlImg="Select I_title,I_img,I_price FROM indoor WHERE I_id=".$Iid;
					$result4 = mysqli_query($connect, $sqlImg) or die(mysqli_error($connect));
					if ($result4->num_rows > 0) {
						// output data of each row
						echo "<center>";
						while($row = $result4->fetch_assoc()) {
							$prodImg=$row["I_img"];
							$prodPrice=$row["I_price"];
							$prodTitle=$row["I_title"];
						}
					}
				}
				else if($ptype=="Tools"){
					$sqlImg="Select T_title,T_img,T_price FROM tools WHERE T_id=".$Tid;
					$result4 = mysqli_query($connect, $sqlImg) or die(mysqli_error($connect));
					if ($result4->num_rows > 0) {
						// output data of each row
						echo "<center>";
						while($row = $result4->fetch_assoc()) {
							$prodImg=$row["T_img"];
							$prodPrice=$row["T_price"];
							$prodTitle=$row["T_title"];
						}
					}
				}
					
		?>
		<tr>
			<td><img src="<?php echo $prodImg; ?>" style="height:150px; width:100px;"> </td><td><?php echo $prodTitle; ?></td>
			<?php if($i==1){ ?>
			<td><span id="<?php echo "price-".$i;?>"><?php echo $prodPrice; ?> SAR</td>
			<td><input style="width:100px;" type="number" id="<?php echo "quantity-".$i;?>" name="quantity" value="<?php echo $quantity; ?>" oninput="calc();" min="1" max="5"></td>
			<?php 
			}
			else if($i==2){ ?>
				<td><span id="<?php echo "price-".$i;?>"><?php echo $prodPrice; ?> SAR</td>
				<td><input style="width:100px;" type="number" id="<?php echo "quantity-".$i;?>" name="quantity" value="<?php echo $quantity; ?>" oninput="calc2();" min="1" max="5"></td>
			<?php 
			}
			else if($i==3){ ?>
				<td><span id="<?php echo "price-".$i;?>"><?php echo $prodPrice; ?> SAR</td>
				<td><input style="width:100px;" type="number" id="<?php echo "quantity-".$i;?>" name="quantity" value="<?php echo $quantity; ?>" oninput="calc3();" min="1" max="5"></td>
			<?php 
			}
			else if($i==4){ ?>
				<td><span id="<?php echo "price-".$i;?>"><?php echo $prodPrice; ?> SAR</td>
				<td><input style="width:100px;" type="number" id="<?php echo "quantity-".$i;?>" name="quantity" value="<?php echo $quantity; ?>" oninput="calc4();" min="1" max="5"></td>
			<?php 
			}
			else if($i==5){ ?>
				<td><span id="<?php echo "price-".$i;?>"><?php echo $prodPrice; ?> SAR</td>
				<td><input style="width:100px;" type="number" id="<?php echo "quantity-".$i;?>" name="quantity" value="<?php echo $quantity; ?>" oninput="calc5();" min="1" max="5"></td>
			<?php 
			}
				$total=$quantity*$prodPrice; 
				$finalTotal+=$total;
			?>
			
			<td><p><span id="<?php echo "total-".$i;?>"><?php echo $total; ?></span> SAR</p></td>
			<td><a href="deleteFromCart2.php?cart_id=<?php echo $cart_id; ?>"><p style="color:red;"><span>&#x2716;</p></a></td>
		</tr>
		<?php
		$i++;
		}
		
		}
		?>
			
        </table>
    </form>
	<br><br><br><br><br>
		</div>
		<br><br><br><br>
	<div class="split right" style="width:400px; background:white;  height:450px; right:100px;;">
	<br><br>
		<h1 style="text-align:left; color: #2a453c;">&nbsp &nbsp Order Summary</h1><br><br>
		<form method="post" action="Login2.php">
		<table style="width:75%; text-align:left;">
			<tr>
				<td>Subtotal</td>
				<td><p><span id="<?php echo "total-".$i;?>"><?php echo $finalTotal;?></span> SAR</p></td>
			</tr>
			<tr>
				<td>Shipping</td>
				<td>Free</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>Total</td>
				<?php  ?>
				<td><p><span id="total-7"><?php echo $finalTotal;?></span> SAR</p></td>
			</tr>
			<tr>
				
				<input type="number" name="total" id="Total" onchange="calc();" value="<?php echo $finalTotal; ?>" hidden>
				<td colspan="2"><button type="submit" class="button button3" style="width:355px;">CHECKOUT</button></a></td>
			</form>
			</tr>
		</table>
		
	</div>
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php } ?>
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
<script>
function calc() 
{
  var price = document.getElementById("price-1").innerHTML;
  var quantity = document.getElementById("quantity-1").value;
  var total = parseFloat(price) * quantity
  document.getElementById("total-1").innerHTML = total
  document.getElementById("total-2").innerHTML = total
  document.getElementById("total-7").innerHTML = total
  document.getElementById("Total").value = total
}
function calc2() 
{
  var price = document.getElementById("price-1").innerHTML;
  var quantity = document.getElementById("quantity-1").value;
  var price2 = document.getElementById("price-2").innerHTML;
  var quantity2 = document.getElementById("quantity-2").value; 
  var total = parseFloat(price) * quantity  
  var total2 = parseFloat(price2) * quantity2
  var total3 = total + total2
  document.getElementById("total-1").innerHTML = total
  document.getElementById("total-2").innerHTML = total2
  document.getElementById("total-3").innerHTML = total3
  document.getElementById("total-7").innerHTML = total3
  document.getElementById("Total").value = total3
}
function calc3() 
{
  var price = document.getElementById("price-1").innerHTML;
  var quantity = document.getElementById("quantity-1").value;
  var price2 = document.getElementById("price-2").innerHTML;
  var quantity2 = document.getElementById("quantity-2").value; 
  var price3 = document.getElementById("price-3").innerHTML;
  var quantity3 = document.getElementById("quantity-3").value;
  var total = parseFloat(price) * quantity  
  var total2 = parseFloat(price2) * quantity2
  var total3 = parseFloat(price3) * quantity3
  var total4 = total + total2 + total3
  document.getElementById("total-1").innerHTML = total
  document.getElementById("total-2").innerHTML = total2
  document.getElementById("total-3").innerHTML = total3
  document.getElementById("total-4").innerHTML = total4
  document.getElementById("total-7").innerHTML = total4
  document.getElementById("Total").value = total4
}
function calc4() 
{
  var price = document.getElementById("price-1").innerHTML;
  var quantity = document.getElementById("quantity-1").value;
  var price2 = document.getElementById("price-2").innerHTML;
  var quantity2 = document.getElementById("quantity-2").value; 
  var price3 = document.getElementById("price-3").innerHTML;
  var quantity3 = document.getElementById("quantity-3").value;
  var price4 = document.getElementById("price-4").innerHTML;
  var quantity4 = document.getElementById("quantity-4").value;
  var total = parseFloat(price) * quantity  
  var total2 = parseFloat(price2) * quantity2
  var total3 = parseFloat(price3) * quantity3
  var total4 = parseFloat(price4) * quantity4
  var total5 = total + total2 + total3 + total4
  document.getElementById("total-1").innerHTML = total
  document.getElementById("total-2").innerHTML = total2
  document.getElementById("total-3").innerHTML = total3
  document.getElementById("total-4").innerHTML = total4
  document.getElementById("total-5").innerHTML = total5
  document.getElementById("total-7").innerHTML = total5
  document.getElementById("Total").value = total5
}
function calc5() 
{
  var price = document.getElementById("price-1").innerHTML;
  var quantity = document.getElementById("quantity-1").value;
  var price2 = document.getElementById("price-2").innerHTML;
  var quantity2 = document.getElementById("quantity-2").value; 
  var price3 = document.getElementById("price-3").innerHTML;
  var quantity3 = document.getElementById("quantity-3").value;
  var price4 = document.getElementById("price-4").innerHTML;
  var quantity4 = document.getElementById("quantity-4").value;
  var price5 = document.getElementById("price-5").innerHTML;
  var quantity5 = document.getElementById("quantity-5").value;
  var total = parseFloat(price) * quantity  
  var total2 = parseFloat(price2) * quantity2
  var total3 = parseFloat(price3) * quantity3
  var total4 = parseFloat(price4) * quantity4
  var total5 = parseFloat(price5) * quantity5
  var total6 = total + total2 + total3 + total4 + total5
  var total7 = total6
  document.getElementById("total-1").innerHTML = total
  document.getElementById("total-2").innerHTML = total2
  document.getElementById("total-3").innerHTML = total3
  document.getElementById("total-4").innerHTML = total4
  document.getElementById("total-5").innerHTML = total5
  document.getElementById("total-6").innerHTML = total6
  document.getElementById("total-7").innerHTML = total7
  document.getElementById("Total").value = total7
}
</script>
</body>
</html>