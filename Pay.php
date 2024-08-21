<?php 
$connect = mysqli_connect("localhost", "root", "","roots");
$email=$_POST['email'];
$type=$_POST['type'];

$CUSTOMER_ID = $PLANTER_ID = 0;


if(isset($_POST['id'])){
	$id=$_POST['id'];
}
else{
	$query2 = "SELECT * FROM `customer` WHERE C_email='$email'";
	$query3 = "SELECT * FROM `planter` WHERE P_email='$email'";
	$result2 = mysqli_query($connect, $query2) or die(mysqli_error($connect));
	$count2 = mysqli_num_rows($result2);
	$result3 = mysqli_query($connect, $query3) or die(mysqli_error($connect));
	$count3 = mysqli_num_rows($result3);
	if ($count2 == 1)
	{
		if ($result2->num_rows > 0) {
			// output data of each row
				while($row = $result2->fetch_assoc()) {
					$id=$row["Customer_id"];
					$CUSTOMER_ID = $id;
			}
		}
	}
	else if ($count3 == 1){
		if ($result3->num_rows > 0) {
			// output data of each row
			while($row = $result3->fetch_assoc()) {
				$id=$row["Planter_id"];
				$PLANTER_ID = $id;
			}
		}
	}
}
$total=$_POST['total'];
$method=$_POST['method'];
$credit=$_POST['credit'];
$cardname=$_POST['cardname'];
$month=$_POST['month'];
$year=$_POST['year'];
$cvv=$_POST['cvv'];
if($type=="Planter"){

	$PLANTER_ID = $id;

	if($method=="Credit Card")
		$sql = "INSERT INTO `payment`(`payment_id`, `payment_method`, `card_number`, `NameOnCard`, `month`, `year`, `security_code`, `total`, `Cust_id`, `Planter_id`)
				VALUES  (NULL, '$method', '$credit', '$cardname','$month','$year','$cvv','$total','0','$id')";
	else if($method=="Apple Pay"){
		$sql = "INSERT INTO `payment`(`payment_id`, `payment_method`, `card_number`, `NameOnCard`, `month`, `year`, `security_code`, `total`, `Cust_id`, `Planter_id`)
				VALUES  (NULL, '$method', '$credit', '$cardname','$month','$year','$cvv','$total','0','$id')";
	}
	else if($method=="Cash On Delivery")
		$sql = "INSERT INTO `payment`(`payment_id`, `payment_method`, `card_number`, `NameOnCard`, `month`, `year`, `security_code`, `total`, `Cust_id`, `Planter_id`)
				VALUES  (NULL, '$method', '', '','0','0','','$total','0','$id')";
	
	if(mysqli_query($connect, $sql)){


		$sqlcart = "SELECT * FROM cart WHERE Planter_id = '$id'";
		$result = mysqli_query($connect, $sqlcart) or die(mysqli_error($connect));
		if( mysqli_num_rows($result) > 0){
			while($row = $result->fetch_assoc()) {
				$oID = $row['O_id'];
				$iID = $row['I_id'];
				$tID = $row['T_id'];
				$customerID = $row['Customer_id'];
				$planterID = $row['Planter_id'];

				$sql3="INSERT INTO `productorderedhistory`(`OH_id`, `O_id`, `I_id`, `T_id`, `Customer_id`, `Planter_id`)
				VALUES  (NULL, '$oID', '$iID', '$tID' , '$customerID' , '$planterID')";
				$result3=mysqli_query($connect, $sql3);

			}
		}


		$sqlcart = "SELECT * FROM cartnotlogin";
		$result = mysqli_query($connect, $sqlcart) or die(mysqli_error($connect));
		if( mysqli_num_rows($result) > 0){
			while($row = $result->fetch_assoc()) {
				$oID = $row['O_id'];
				$iID = $row['I_id'];
				$tID = $row['T_id'];
				$customerID = $CUSTOMER_ID;
				$planterID = $PLANTER_ID;

				$sql3="INSERT INTO `productorderedhistory`(`OH_id`, `O_id`, `I_id`, `T_id`, `Customer_id`, `Planter_id`)
				VALUES  (NULL, '$oID', '$iID', '$tID' , '$customerID' , '$planterID')";
				$result3=mysqli_query($connect, $sql3);

			}
		}




				$sql2 = "DELETE FROM `cart` WHERE `Planter_id`='" . $id . "'";
				$sql3 = "DELETE FROM `cartnotlogin`";
				if(mysqli_query($connect, $sql2)){
					if(mysqli_query($connect, $sql3)){
						echo "<script>alert('Payment Successfully !');</script>";
						echo "<script>window.location='SuccessfulRequest.php'</script>";
					}
				}
	}
}
else if($type=="Customer"){

	$CUSTOMER_ID = $id;

	if($method=="Credit Card")
		$sql = "INSERT INTO `payment`(`payment_id`, `payment_method`, `card_number`, `NameOnCard`, `month`, `year`, `security_code`, `total`, `Cust_id`, `Planter_id`)
				VALUES  (NULL, '$method', '$credit', '$cardname', $month ,'$year','$cvv','$total','$id','0')";
	else if($method=="Apple Pay")
		$sql = "INSERT INTO `payment`(`payment_id`, `payment_method`, `card_number`, `NameOnCard`, `month`, `year`, `security_code`, `total`, `Cust_id`, `Planter_id`)
				VALUES  (NULL, '$method', '$credit', '$cardname', $month ,'$year','$cvv','$total','$id', 0)";
	else if($method=="Cash On Delivery")
		$sql = "INSERT INTO `payment`(`payment_id`, `payment_method`, `card_number`, `NameOnCard`, `month`, `year`, `security_code`, `total`, `Cust_id`, `Planter_id`)
				VALUES  (NULL, '$method', '', '','0','0','','$total','$id','0')";

	if(mysqli_query($connect, $sql)){

				$sqlcart = "SELECT * FROM cart WHERE Customer_id = '$id'";
				$result = mysqli_query($connect, $sqlcart) or die(mysqli_error($connect));
				if( mysqli_num_rows($result) > 0){
					while($row = $result->fetch_assoc()) {
						$oID = $row['O_id'];
						$iID = $row['I_id'];
						$tID = $row['T_id'];
						$customerID = $row['Customer_id'];
						$planterID = $row['Planter_id'];

						$sql3="INSERT INTO `productorderedhistory`(`OH_id`, `O_id`, `I_id`, `T_id`, `Customer_id`, `Planter_id`)
						VALUES  (NULL, '$oID', '$iID', '$tID' , '$customerID' , '$planterID')";
						$result3=mysqli_query($connect, $sql3);

					}
				}


				$sqlcart = "SELECT * FROM cartnotlogin";
				$result = mysqli_query($connect, $sqlcart) or die(mysqli_error($connect));
				if( mysqli_num_rows($result) > 0){
					while($row = $result->fetch_assoc()) {
						$oID = $row['O_id'];
						$iID = $row['I_id'];
						$tID = $row['T_id'];
						$customerID = $CUSTOMER_ID;
						$planterID = $PLANTER_ID;

						$sql3="INSERT INTO `productorderedhistory`(`OH_id`, `O_id`, `I_id`, `T_id`, `Customer_id`, `Planter_id`)
						VALUES  (NULL, '$oID', '$iID', '$tID' , '$customerID' , '$planterID')";
						$result3=mysqli_query($connect, $sql3);

					}
				}


				$sql2 = "DELETE FROM `cart` WHERE `Customer_id`='" . $id . "'";
				$sql3 = "DELETE FROM `cartnotlogin`";
				if(mysqli_query($connect, $sql2)){
					if(mysqli_query($connect, $sql3)){
						echo "<script>alert('Payment Successfully !');</script>";
						echo "<script>window.location='SuccessfulRequest.php'</script>";
					}
		}
	}
}
else
{
	echo "<script>alert('Payment Failed !');";
	echo "</script>";
}
?>