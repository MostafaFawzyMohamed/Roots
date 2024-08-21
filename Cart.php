<?php
session_start();
$cookie_name = "email";
$email = $_SESSION["email"];
$cookie_value = $email;
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
$connect = mysqli_connect("localhost", "root", "", "roots");
mysqli_query($connect, "SET CHARACTER SET 'utf8'");
$query2 = "SELECT * FROM `customer` WHERE C_email='$email'";
$query3 = "SELECT * FROM `planter` WHERE P_email='$email'";
$result2 = mysqli_query($connect, $query2) or die(mysqli_error($connect));
$count2 = mysqli_num_rows($result2);
$result3 = mysqli_query($connect, $query3) or die(mysqli_error($connect));
$count3 = mysqli_num_rows($result3);
$id = "";
$name = "";
$type = "";
if ($count2 == 1) {
	if ($result2->num_rows > 0) {
		// output data of each row
		while ($row = $result2->fetch_assoc()) {
			$name = $row["C_Fname"] . "&nbsp" . $row["C_Lname"];
			$type = "Customer";
			$id = $row["Customer_id"];
		}
	}
} else if ($count3 == 1) {
	if ($result3->num_rows > 0) {
		// output data of each row
		while ($row = $result3->fetch_assoc()) {
			$name = $row["P_Fname"] . "&nbsp" . $row["P_Lname"];
			$type = "Planter";
			$id = $row["Planter_id"];
		}
	}
}
$count = 0;
if ($type == "Planter")
	$query3 = "SELECT * FROM `cart` WHERE Planter_id = '$id'";
else
	$query3 = "SELECT * FROM `cart` WHERE Customer_id = '$id'";
$result3 = mysqli_query($connect, $query3) or die(mysqli_error($connect));
if ($result3->num_rows > 0) {
	// output data of each row
	while ($row = $result3->fetch_assoc()) {
		$count++;
	}
}
$finalTotal = 0;
$i = 1;

?>
<!DOCTYPE html>
<html>

<head>

	<title>Cart</title>
	<meta charset="utf-8" />
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
			<div class="class1 filter dropdown">
				<li id="Home" class="filter"><a href="indexAfter.php">Home</a></li>
			</div>
			<div class="class1 filter dropdown">
				<li><button class="class1 dropbtn">
						Products
					</button></li>
				<div class="dropdown-content" style="top:100px;">
					<a href="indoorAfter.php">Indoor Plants</a>
					<a href="OutdoorAfter.php">Outdoor Plants</a>
					<a href="ToolsAfter.php">Tools & Equipments</a>
				</div>
			</div>
			<div class="class1 filter dropdown">
				<li id="Services" class="filter"><a href="ServicesAfter.php">Services</a></li>
			</div>
			<div class="class1 filter dropdown">
				<li id="Advice" class="filter"><a href="AdvicesAfter.php">Advice & FAQs</a></li>
			</div>
			<div style="top:-30px;  left:120px; height:40px; width:50px; " class="class1 filter dropdown">

				<?php
				if ($email != "admin@roots.info") { ?>
					<a href="Cart.php"><button class=" button1" style="border:0px; background-color: #2a453c; height:100px; "><img src="img/cart.png" style="max-width:80px; max-height:50px;"></button></a>
				<?php } ?>
			</div>
			<div style="top:-25px;  left:100px; height:30px; width:50px; " class="class1 filter dropdown">
				<a href="Cart.php" style="color:white;"><?php echo $count; ?></a>
			</div>
		</ul>
		<?php
		if ($email != "admin@roots.info") { ?>


			<div style="text-align:right;">
				<a href="profile.php">
					<p style="font-size:25px;"><?php echo $name; ?></p>
				</a>
				<a href="Logout.php"><button class="button button4">Logout</button></a><br>

			</div>
		<?php
		}
		?>
	</div>
	<h1 style="color: #2a453c;">Your Cart</h1>
	</center>
	<div class="split left" style="width:1200px; height:1200px;  left:50px;" align="left">

		<form id="" method="post" action="Payment.php">
			<table id="cart-table" style="width:1200px;">
				<thead>
					<tr>
						<th style="text-align:left" colspan="2">PRODUCT</th>
						<th>PRICE</th>
						<th>QUANTITY</th>
						<th>TOTAL</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$prodPrice = 0;
					$prodTitle = "";
					if ($type == "Planter")
						$query3 = "SELECT * FROM `cart` WHERE Planter_id = '$id'";
					else
						$query3 = "SELECT * FROM `cart` WHERE Customer_id = '$id'";
					$result3 = mysqli_query($connect, $query3) or die(mysqli_error($connect));
					if ($result3->num_rows > 0) {
						// output data of each row
						echo "<center>";
						while ($row = $result3->fetch_assoc()) {
							$cart_id = $row["cart_id"];
							$ptype = $row["Prod_type"];
							$Oid = $row["O_id"];
							$Iid = $row["I_id"];
							$Tid = $row["T_id"];
							$quantity = $row["quantity"];
							$count++;
							if ($ptype == "Outdoor") {
								$sqlImg = "Select O_title,O_img,O_price FROM outdoor WHERE O_id=" . $Oid;
								$result4 = mysqli_query($connect, $sqlImg) or die(mysqli_error($connect));
								if ($result4->num_rows > 0) {
									// output data of each row
									echo "<center>";
									while ($row = $result4->fetch_assoc()) {
										$prodImg = $row["O_img"];
										$prodPrice = $row["O_price"];
										$prodTitle = $row["O_title"];
									}
								}
							} else if ($ptype == "Indoor") {
								$sqlImg = "Select I_title,I_img,I_price FROM indoor WHERE I_id=" . $Iid;
								$result4 = mysqli_query($connect, $sqlImg) or die(mysqli_error($connect));
								if ($result4->num_rows > 0) {
									// output data of each row
									echo "<center>";
									while ($row = $result4->fetch_assoc()) {
										$prodImg = $row["I_img"];
										$prodPrice = $row["I_price"];
										$prodTitle = $row["I_title"];
									}
								}
							} else if ($ptype == "Tools") {
								$sqlImg = "Select T_title,T_img,T_price FROM tools WHERE T_id=" . $Tid;
								$result4 = mysqli_query($connect, $sqlImg) or die(mysqli_error($connect));
								if ($result4->num_rows > 0) {
									// output data of each row
									echo "<center>";
									while ($row = $result4->fetch_assoc()) {
										$prodImg = $row["T_img"];
										$prodPrice = $row["T_price"];
										$prodTitle = $row["T_title"];
									}
								}
							}

					?>
							<tr>
								<td><img src="<?php echo $prodImg; ?>" style="height:150px; width:100px;"> </td>
								<td><?php echo $prodTitle; ?></td>
								<td><span id="<?php echo "price-" . $i; ?>"><?php echo $prodPrice; ?> SAR</td>
								<td><input class="quantity-input" style="width:100px;" type="number" id="<?php echo "quantity-" . $i; ?>" name="quantity" value="<?php echo $quantity; ?>" min="1" max="5"></td>

								<?php
								$total = $quantity * $prodPrice;
								$finalTotal += $total;
								?>

								<td>
									<p><span class="item-total" id="<?php echo "total-" . $i; ?>"><?php echo $total; ?></span> SAR</p>
								</td>
								<td><a href="deleteFromCart.php?cart_id=<?php echo $cart_id; ?>">
										<p style="color:red;"><span>&#x2716;</p>
									</a></td>
							</tr>
					<?php
							$i++;
						}
					}
					?>
				</tbody>
			</table>
		</form>

	</div>
	<br><br><br><br>
	<div class="split right" style="width:400px; background:white;  height:450px; right:125px;margin:auto;">
		<br><br>
		<h1 style="text-align:left; color: #2a453c;">&nbsp &nbsp Order Summary</h1><br><br>
		<form method="post" action="payment.php">
			<table style="width:75%; text-align:left;">
				<tr>
					<td>Subtotal</td>
					<td>
						<p><span id="sub-total"><?php echo $finalTotal; ?></span> SAR</p>
					</td>
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
					<td>
						<p><span id="total-7"><?php echo $finalTotal; ?></span> SAR</p>
					</td>
				</tr>
				<tr>

					<input type="text" name="email" value="<?php echo $email; ?>" hidden>
					<input type="number" name="total" id="Total" onchange="calc();" value="<?php echo $finalTotal; ?>" hidden>
					<input type="number" name="id" value="<?php echo $id; ?>" hidden>
					<?php
					if ($type == "Planter") { ?>
						<input type="text" name="type" value="<?php echo "Planter"; ?>" hidden>
					<?php } else {
					?>
						<input type="text" name="type" value="<?php echo "Customer"; ?>" hidden>
					<?php } ?>
					<td colspan="2"><button type="submit" class="button button3" style="width:355px;">CHECKOUT</button></a></td>
		</form>
		</tr>
		</table>

	</div>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<footer>
		<img src="logo.png" width="250px" alt="Roots Logo">
		<p>“Roots” turns your place into a green breather</p>
		<p>Copyright 2023-2024. All rights reserved by Roots Project</p>
		<div class="social-links">
			<a href="https://instagram.com/roots_pl?igshid=YzAwZjE1ZTI0Zg%3D%3D&utm_source=qr"><img src="./img/instgram.png" alt="" height="50px" /></a>&nbsp &nbsp &nbsp
			<a href="mailto:Roots.pl00@gmail.com"><img src="./img/mail.png" alt="" height="70px" /></a>
			<a href="https://wa.me/+966545010018"><img src="img/whatsapp.png" alt="" height="80px" /></a>
		</div>
	</footer>

	<script>
		function updateTotals() {
			var rows = document.querySelectorAll('#cart-table tbody tr');
			var total = 0;

			// console.log(rows);
			rows.forEach(function(row) {

				// console.log(row.cells[2].textContent);
				var price = parseFloat(row.cells[2].textContent);
				var quantityInput = row.querySelector('.quantity-input');
				var quantity = parseFloat(quantityInput.value);
				var itemTotal = price * quantity;

				row.querySelector('.item-total').textContent = itemTotal.toFixed(2);
				total += itemTotal;
			});

			document.getElementById('Total').textContent = total.toFixed(2);
			document.getElementById('total-7').textContent = total.toFixed(2);
			document.getElementById('sub-total').textContent = total.toFixed(2);
		}

		var quantityInputs = document.querySelectorAll('.quantity-input');
		quantityInputs.forEach(function(input) {
			input.addEventListener('input', updateTotals);
		});
	</script>

</body>

</html>