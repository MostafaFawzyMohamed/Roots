<?php
session_start();
$cookie_name = "email";
$cookie_value = $_SESSION["email"];
$email=$_SESSION["email"];
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
$connect = mysqli_connect("localhost", "root", "","roots");
$query = "SELECT * FROM `customer` WHERE C_email='$email'";
$query2 = "SELECT * FROM `planter` WHERE P_email='$email'";
$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
$count = mysqli_num_rows($result);
$result2 = mysqli_query($connect, $query2) or die(mysqli_error($connect));
$count2 = mysqli_num_rows($result2);
$name="";
if ($count == 1){
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {			
			$type="Customer";
			$id=$row["Customer_id"];
			$name=$row["C_Fname"] . "&nbsp" . $row["C_Lname"];
			$first=$row["C_Fname"];
			$last=$row["C_Lname"];
			$email=$row["C_email"];
			$address=$row["C_address"];
			$phone=$row["C_phone"];
			$birth=$row["C_birthdate"];
			$gender=$row["C_Gender"];
		}
	}
}
else if ($count2 == 1){
	if ($result2->num_rows > 0) {
		// output data of each row
		while($row = $result2->fetch_assoc()) {
			$type="Planter";
			$id=$row["Planter_id"];
			$name=$row["P_Fname"] . "&nbsp" . $row["P_Lname"];
			$first=$row["P_Fname"];
			$last=$row["P_Lname"];
			$email=$row["P_email"];
			$address=$row["P_Address"];
			$phone=$row["P_phone"];
			$birth=$row["P_birthdate"];
			$gender=$row["P_Gender"];
		}
	}
}
$count3=0;
if($type=="Planter")
	$query3 = "SELECT * FROM `cart` WHERE Planter_id=".$id;
else
	$query3 = "SELECT * FROM `cart` WHERE Customer_id=".$id;
$result3 = mysqli_query($connect, $query3) or die(mysqli_error($connect));
if ($result3->num_rows > 0) {
	// output data of each row
	while($row = $result3->fetch_assoc()) {
		$count3++;
	}
}
$finalTotal=0;
$i=1;
?>
<!DOCTYPE html >
<html>
<head>
	<title>Profile</title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="style2.css">
	<style>
	.container {
    max-width: 800px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
}

p {
	font-size:20px;
}

button {
    background-color: black;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #2a453c;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: left;
}

th {
    background-color: #2a453c;
    color: white;
}

	</style>
</head>
<body class="Login">
<div id="cat2" >
                    <ul style="background-color: #DCDCDC;">
					<div class="class1 filter dropdown">
						<li id="Home" class="active filter"><a href="indexAfter.php">Home</a></li>
					</div>
						<div class="class1 filter dropdown" style="height:68px;" >
						<li><button class="class1 button3 dropbtn2" style="height:70px;">
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
						<div style="top:-30px;  left:100px; height:40px; width:50px; " class="class1 filter dropdown">
						
					<?php 
						if($email!="admin@roots.info"){?>
							<a href="Cart.php"><button class="button1" style="border:0px; background-color: #DCDCDC; height:70px; "></a><img src="img/cart2.png" style="max-width:100px; height:50px;"></button></a>
							
						<?php } ?>
						</div>
						<div style="top:-25px;  left:100px; height:30px; width:50px; " class="class1 filter dropdown">
						<a href="Cart.php"><?php echo $count3; ?></a>
						</div>
                    </ul>

					<?php 
						if($email!="admin@roots.info"){?>							
							<div style="text-align:right;">
								<a href="profile.php"><p style="font-size:25px;"><?php echo $name;?></p></a>
								<a href="Logout.php"><button class="button button4">Logout</button></a><br>
								
							</div>
					<?php } ?>
					
</div>
<br>
<div class="container">
    <h1><?php echo $type; ?> Profile</h1>
    <!-- Customer Information Display -->
    <div id="customerInfo">
        <p><strong>First Name:</strong> <span id="firstName"><?php echo $first; ?></span></p>
        <p><strong>Last Name:</strong> <span id="lastName"><?php echo $last; ?></span></p>
        <p><strong>Email:</strong> <span id="email"><?php echo $email; ?></span></p>
        <p><strong>Phone:</strong> <span id="phone"><?php echo $phone;?></span></p>
        <p><strong>Location:</strong> <span id="location"><?php echo $address;?></span></p>
		<p><strong>Birthday Date:</strong> <span id="location"><?php echo $birth;?></span></p>
		<p><strong>Gender:</strong> <span id="location"><?php echo $gender;?></span></p>
        <button onclick="editProfile()">Edit Profile</button>
	</div>
		<!-- Customer Information Form (Initially Hidden) -->
		
		<form id="editForm" method="post" action="editProfile.php" style="display: none;">
			<input type="number" name="id" value="<?php echo $id; ?>" hidden>
			<input type="text" name="type" value="<?php echo $type; ?>" hidden>
		<table>
        <tr>
			<td>
				<label for="editFirstName">First Name:</label>
			</td>
			<td>
				<input type="text" name="first" value="<?php echo $first; ?>" required><br>
			</td>
		</tr>
		<tr>
			<td>
				<label for="editLastName">Last Name:</label>
			</td>
			<td>
				<input type="text" name="last" value="<?php echo $last; ?>" required><br>
			</td>
		</tr>
		<tr>
			<td>
				<label for="editEmail">Email:</label>
			</td>
			<td>
				<input type="email" name="email" value="<?php echo $email; ?>" required><br>
			</td>
		</tr>
		<tr>
			<td>
				<label for = "editphone"> Phone:</label>
			</td>
			<td><select name="code" style="width:100px;">
						<option value="+966">+966</option>
						<option value="+965">+965</option>
						<option value="+970">+970</option>
						<option value="+971">+971</option>						
					</select>
					<input style="width:415px;" type="text" placeholder="phone" name="phone" pattern="[0-9]{9}" id="phone" required></input>
			</td>
		</tr>
		<tr>
			<td>
				<label for = "editlocation">location:</label>
			</td>
			<td>
				<input type="text" name="address" value="<?php echo $address;?>" required><br>
			</td>
		</tr>
		<tr>
			<td>
				<label for = "editlocation">Birthdate:</label>
			</td>
			<td>
				<input type="text" name="birth" value="<?php echo $birth;?>" required><br>
			</td>
		</tr>
		<tr>
			<td>
				<label for = "editlocation">Gender:</label>
			</td>
			<td>
				<input type="text" name="gender" value="<?php echo $gender;?>" required><br>
			</td>
		</tr>
		</table>
        <input type="submit" class="button button4" value="Save">
    </form>
	<br><br>
	<!-- Previous Orders Table -->
    <h1>Previous Services</h1>
    <table>
        <thead>
            <tr>
                <th>Service Title</th>
			<th>Customer ID</th> 
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
	<?php 
	if($type=="Planter")
		$query3 = "SELECT * FROM `servicesorders`";
	else
		$query3 = "SELECT * FROM `servicesorders` WHERE Cust_id=".$id;
	$result3 = mysqli_query($connect, $query3) or die(mysqli_error($connect));
			if ($result3->num_rows > 0) {
				
				
				// output data of each row
				echo "<center>";
				while($row = $result3->fetch_assoc()) {
					$SID=$row["S_id"];
					$Status=$row["S_status"];
					$Cust_id=$row["Cust_id"];
					$query4= "SELECT * FROM `services` WHERE S_id=".$SID;
					$result4 = mysqli_query($connect, $query4) or die(mysqli_error($connect));
					if ($result4->num_rows > 0) {
						while($row2 = $result4->fetch_assoc()){
							$STitle=$row2["S_title"];
						
	?>
            <tr>
                <td style="width:500px;"><?php echo $STitle; ?></td>
				<td style="width:125px;"><?php echo $Cust_id ?></td>
				<?php if($type=="Planter"){ ?>
				
				<form method="post" action="UpdateStatus.php" >
				<input type="number" name="id" value="<?php echo $row["Ord_ID"]; ?>" hidden>
					<td>
						<?php if($row["S_status"]=="Pending"){ ?>
						<select name="status" style="width:100%;">
							<option value=""><?php echo $row["S_status"]; ?></option>
							<option value="Accept">Accept</option>
							<option value="Reject">Reject</option>
						</select>
						<input type="submit" class="button button4" style="width:100%;">
						<?php } 
						else {
						?>
							<select name="status" style="width:100%;" disabled>
							<option value="<?php  echo $row["S_status"]; ?>"><?php echo $row["S_status"]; ?></option>
							</select>
						<?php 
						}
						?>
					</td>
				</form>
				<?php }
				else {
					 echo "<td>". $Status . "</td>";
				}?>
			</tr>
            <!-- Add more rows for additional orders -->
       
		<?php
						}
					}
					
				}
			}
		?>
		 </tbody>
    </table>
	<br><br>
	    <!-- Previous Orders Table -->
    <h1>Previous Orders</h1>
     <table>
        <thead>
            <tr>
                <th>Order ID</th>
				<th><?php echo $type; ?> ID</th> 
                <th>Method</th>
				<th>Total</th>
            </tr>
        </thead>
        <tbody>
	<?php 
	if($type=="Planter")
		$query3 = "SELECT * FROM `payment` WHERE Planter_id=".$id;
	else
		$query3 = "SELECT * FROM `payment` WHERE Cust_id=".$id;
	$result3 = mysqli_query($connect, $query3) or die(mysqli_error($connect));
			if ($result3->num_rows > 0) {
				// output data of each row
				echo "<center>";
				while($row = $result3->fetch_assoc()) {
					$Pid=$row["payment_id"];
					$method=$row["payment_method"];
					$total=$row["total"];
					if($type=="Customer")
						$Cust_id=$row["Cust_id"];
					else
						$Planter_id=$row["Planter_id"];
					
	?>
            <tr>
                <td><?php echo $Pid; ?></td>
				<?php if($type=="Planter"){?>
					<td><?php echo $Planter_id; ?></td>
				<?php }else{ ?>
					<td><?php echo $Cust_id; }?></td>
				<td><?php echo $method ?></td>
				<td><?php echo $total ?> SAR</td>
			</tr>
            <!-- Add more rows for additional orders -->
       
		<?php
				}
			}
		?>
		 </tbody>
    </table>
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
    function editProfile() {
        document.getElementById('customerInfo').style.display = 'none';
        document.getElementById('editForm').style.display = 'block';
    }

    function saveProfile() {
        // You can use AJAX to send the form data to the server for processing
        // For simplicity, we'll just update the displayed values here
        document.getElementById('firstName').innerText = document.getElementById('editFirstName').value;
        document.getElementById('lastName').innerText = document.getElementById('editLastName').value;
        document.getElementById('email').innerText = document.getElementById('editEmail').value;
        document.getElementById('phone').innerText = document.getElementById('editphone').value;
        document.getElementById('location').innerText = document.getElementById('editlocation').value;


        // Hide the form and display the updated customer information
        document.getElementById('editForm').style.display = 'none';
        document.getElementById('customerInfo').style.display = 'block';
    }
	
	function UpdateStatus() {
        document.getElementById('editStatus').style.display = 'block';
    }

   
</script>
</body>

</html>