<?php
	$connect = mysqli_connect("localhost", "root", "","roots");
	$id=$_GET["cart_id"];
	
	$sqlCart = "SELECT * FROM cart WHERE cart_id = '$id'";
	$result = mysqli_query($connect, $sqlCart);
	if(mysqli_num_rows($result) > 0){
		if($row = $result->fetch_assoc()){
			$sqlUpdate = "SELECT 1 FROM cart";
			$proID = 0;
			$pro_quantity = $row['quantity'];
			if($row['Prod_type'] == 'Outdoor'){
				$proID = $row['O_id'];
				$sqlUpdate = "UPDATE Outdoor SET O_quantity = O_quantity + $pro_quantity WHERE O_id = '$proID'" ;
			}

			if($row['Prod_type'] == 'Indoor'){
				$proID = $row['I_id'];
				$sqlUpdate = "UPDATE Indoor SET I_quantity = I_quantity + $pro_quantity WHERE I_id = '$proID'" ;
			}

			if($row['Prod_type'] == 'Tools'){
				$proID = $row['T_id'];
				$sqlUpdate = "UPDATE Tools SET T_quantity = T_quantity + $pro_quantity WHERE T_id = '$proID'" ;
			}

			mysqli_query($connect, $sqlUpdate);

		}

	}
		
	$sql2 = "DELETE FROM `cart` WHERE `cart_id`='" . $id . "'";

	
			if(mysqli_query($connect, $sql2)){
				echo "<script>alert('Deleted Successfully !');</script>";
				echo "<script>window.location='Cart.php'</script>";
			}
	else {
		echo "<script>alert('Deleted Failed !');</script>";
	}
?>