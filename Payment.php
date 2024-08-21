<!DOCTYPE html >
<?php
session_start();
$cookie_name = "email";
$email=$_POST['email'];
if($email==""){
	$email=$_SESSION["email"];
}
$_SESSION["email"]=$email;
$cookie_value = $email;
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
$connect = mysqli_connect("localhost", "root", "","roots");
mysqli_query($connect,"SET CHARACTER SET 'utf8'");
$query2 = "SELECT * FROM `customer` WHERE C_email='$email'";
$query3 = "SELECT * FROM `planter` WHERE P_email='$email'";
$result2 = mysqli_query($connect, $query2) or die(mysqli_error($connect));
$count2 = mysqli_num_rows($result2);
$result3 = mysqli_query($connect, $query3) or die(mysqli_error($connect));
$count3 = mysqli_num_rows($result3);
$total=$_POST['total'];
$name = "";
?>
<!DOCTYPE html >
<html>
<head>

<title>Payment</title>
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
						<div class="class1 filter dropdown">
							<li id="Home" class="filter" ><a href="indexAfter.php">Home</a></li>
						</div>
						<div class="class1 filter dropdown">
						<li><button class="class1 dropbtn">
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
							<li id="Advice" class="filter"><a href="AdvicesAfter.php">Advice & FAQs</a></li>
						</div>
						<div style="top:-30px;  left:120px; height:40px; width:50px; " class="class1 filter dropdown">
						
					<?php 
						if($email!="admin@roots.info"){?>
							<a href="Cart.php"><button class=" button1" style="border:0px; background-color: #2a453c; height:100px; "><img src="img/cart.png" style="max-width:100px; height:50px;"></button></a>
						<?php } ?>
						</div>
                    </ul>
					<?php 
						if($email!="admin@roots.info"){?>
					
							<?php 
								if ($count2 == 1)
								{
									if ($result2->num_rows > 0) {
									// output data of each row
									while($row = $result2->fetch_assoc()) {
										$name=$row["C_Fname"] . "&nbsp" . $row["C_Lname"];
										$type="Customer";
										$id=$row["Customer_id"];
										}
									}
								}
								else if ($count3 == 1){
									if ($result3->num_rows > 0) {
									// output data of each row
									echo "<center>";
									while($row = $result3->fetch_assoc()) {
										$name=$row["P_Fname"] . "&nbsp" . $row["P_Lname"];
										$type="Planter";
										$id=$row["Planter_id"];
									}
								}
							}
							?>
							<div style="text-align:right;">
								<a href="profile.php"><p style="font-size:25px;"><?php echo $name;?></p></a>
								<a href="Logout.php"><button class="button button4">Logout</button></a><br>
								
							</div>
					<?php 
					} 
					?>
</div>

<div class="split left" style="width:1700px; height:1200px;  left:50px;" align="left">
<center>
<h1 style="color: #2a453c;">Payment Info</h1>
<h4 style="color: #C0C0C0;">&nbsp All transaction are secure and encrypted.</h4>
    <form id="" method="post" action="Pay.php" onsubmit="return validateForm()">
	<input type="text" name="email" value="<?php echo $email; ?>" hidden>
	<input type="number" name="total" value="<?php echo $total; ?>" hidden>
	<input type="number" name="id" value="<?php echo $id; ?>" hidden>
	<input type="text" name="type" value="<?php echo $type; ?>" hidden>
        <table style="width:400px;">
			<tr>
				<td><input type="radio" style="width:50px; height:25px;" name="method" value="Credit Card"></td><td><span style="text-align:left; font-size:25px;">Credit Card</span></td>
			</tr>
			<tr>
				<td><input type="radio" style="width:50px; height:25px;" name="method" value="Apple Pay"></td><td><span style="text-align:left; font-size:25px;">Apple Pay</span></td>
			</tr>
			<tr>
				<td><input type="radio" style="width:50px; height:25px;" name="method" value="Cash On Delivery"></td><td><span style="text-align:left; font-size:25px;">Cash On Delivery</span></td>
			</tr>
			<tr>
				<td colspan="2"><input type="text" style="width:325px; height:25px;" name="credit" placeholder="Card number"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="text" style="width:325px; height:25px;" name="cardname" placeholder="Name on card"></td>
			</tr>
			<tr>
				<td colspan="3"><input type="number" style="width:75px; height:25px;" name="month" placeholder="MM" max=99 >
				<input type="number" style="width:90px; height:25px;" name="year" placeholder="YYYY" max=9999>
				<input type="number" style="width:150px; height:25px;" name="cvv" placeholder="security code" max=999></td>
			</tr>
			<tr>
				<td colspan="2"><button type="submit" class="button button4" style="width:200px;" name="submit">Pay</button></td>
			</tr>
        </table>
    </form>
</div>
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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
  function validateForm() {
    // Validate method radio button
    var method = document.getElementsByName("method");
    var methodSelected = false;
    for (var i = 0; i < method.length; i++) {
      if (method[i].checked) {
        methodSelected = true;
        break;
      }
    }
    if (!methodSelected) {
      alert("Please select a payment method.");
      return false;
    }

    // Validate card details if Credit Card or Apple Pay is selected
    var selectedMethod = document.querySelector('input[name="method"]:checked').value;
    if (selectedMethod === "Credit Card" || selectedMethod === "Apple Pay") {
		
	  var credit = 	document.forms[0]["credit"].value;
      var cardName = document.forms[0]["cardname"].value;
      var month = document.forms[0]["month"].value;
      var year = document.forms[0]["year"].value;
      var cvv = document.forms[0]["cvv"].value;
	  

	  if (credit === "") {
        alert("Please fill card number.");
        return false;
      }

      if (cardName === "") {
        alert("Please fill Name on the card .");
        return false;
      }

      if (year === "") {
        alert("Please fill year.");
        return false;
      }

      if (cvv === "") {
        alert("Please security code.");
        return false;
      }
    }

    // Form is valid, allow submission
    return true;
  }
</script>

</body>
</html>