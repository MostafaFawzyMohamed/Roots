<?php
	$connect = mysqli_connect("localhost", "root", "","roots");
	if(isset($_POST['type']) and isset($_POST['id'])){
	$type= $_POST['type'];
	$id = $_POST["id"];	
	}
	else {
		$type= "";
		$id = "";
	}
	$quantity= $_POST["quantity"];
	$PType= $_POST["Product_type"];
	$PID= $_POST["Product_id"];
	settype($PID, 'int');
	
		if($type=="Planter"){
			if($PType=="Outdoor"){
				$sqlCart="SELECT * FROM `cart` WHERE `O_id`=".$PID;
				$result = mysqli_query($connect, $sqlCart) or die(mysqli_error($connect));
				if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					if($row["Prod_type"]==$PType){
						$sqlCart2="UPDATE `cart` SET `quantity`=`quantity`+'$quantity' WHERE `O_id`='$PID'";
						$sql2="UPDATE `Outdoor` SET `O_quantity`=`O_quantity`-1 WHERE `O_id`='$PID'";
						if(mysqli_query($connect, $sqlCart2)&&mysqli_query($connect, $sql2)){
						echo "<script>window.location='OutdoorAfter.php?success=1&id=". $PID . "'</script>";
					}}
							
				}
				}
				else{
				$sql = "INSERT INTO `cart`(`cart_id`, `Prod_type`, `O_id`, `I_id`, `T_id`, `quantity`,`Customer_id`,`Planter_id`)
				VALUES  (NULL, '$PType', '$PID', '0' , '0' , '$quantity','0','$id')";
				$sql2="UPDATE `outdoor` SET `O_quantity`=`O_quantity`-1 WHERE `O_id`='$PID'";
				// $sql3="INSERT INTO `productorderedhistory`(`OH_id`, `O_id`, `I_id`, `T_id`, `Customer_id`, `Planter_id`)
				// VALUES  (NULL, '$PID', '0', '0' , '0' , '$id')";
				// $result3=mysqli_query($connect, $sql3);
				if(mysqli_query($connect, $sql)&&mysqli_query($connect, $sql2)){
					echo "<script>window.location='OutdoorAfter.php?success=1&id=". $PID . "'</script>";
				}
				}
			}
			if($PType=="Indoor"){
				$sqlCart="SELECT * FROM `cart` WHERE `I_id`=".$PID;
				$result = mysqli_query($connect, $sqlCart) or die(mysqli_error($connect));
				if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					if($row["Prod_type"]==$PType){
						$sqlCart2="UPDATE `cart` SET `quantity`=`quantity`+'$quantity' WHERE `I_id`='$PID'";
						$sql2="UPDATE `indoor` SET `I_quantity`=`I_quantity`-1 WHERE `I_id`='$PID'";
						if(mysqli_query($connect, $sqlCart2)&&mysqli_query($connect, $sql2)){
						echo "<script>window.location='indoorAfter.php?success=1&id=". $PID . "'</script>";
					}}
							
				}
				}
				else{
				$sql = "INSERT INTO `cart`(`cart_id`, `Prod_type`, `O_id`, `I_id`, `T_id`, `quantity`,`Customer_id`,`Planter_id`)
				VALUES  (NULL, '$PType', '0', '$PID' , '0' , '$quantity','0','$id')";
				$sql2="UPDATE `indoor` SET `I_quantity`=`I_quantity`-1 WHERE `I_id`='$PID'";
				// $sql3="INSERT INTO `productorderedhistory`(`OH_id`, `O_id`, `I_id`, `T_id`, `Customer_id`, `Planter_id`)
				// VALUES  (NULL, '0', '$PID', '0' , '0' , '$id')";
				// $result3=mysqli_query($connect, $sql3);
				if(mysqli_query($connect, $sql)&&mysqli_query($connect, $sql2)){
					echo "<script>window.location='indoorAfter.php?success=1&id=". $PID . "'</script>";
				}
				}
			}
			if($PType=="Tools"){
			$sqlCart="SELECT * FROM `cart` WHERE `T_id`=".$PID;
				$result = mysqli_query($connect, $sqlCart) or die(mysqli_error($connect));
				if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					if($row["Prod_type"]==$PType){
						$sqlCart2="UPDATE `cart` SET `quantity`=`quantity`+'$quantity' WHERE `T_id`='$PID'";
						$sql2="UPDATE `Tools` SET `T_quantity`=`T_quantity`-1 WHERE `T_id`='$PID'";
						if(mysqli_query($connect, $sqlCart2)&&mysqli_query($connect, $sql2)){
						echo "<script>window.location='ToolsAfter.php?success=1&id=". $PID . "'</script>";
					}}
							
				}
				}
				else{
				$sql = "INSERT INTO `cart`(`cart_id`, `Prod_type`, `O_id`, `I_id`, `T_id`, `quantity`,`Customer_id`,`Planter_id`)
				VALUES  (NULL, '$PType', '0', '0' , '$PID' , '$quantity','0','$id')";
				$sql2="UPDATE `Tools` SET `T_quantity`=`T_quantity`-1 WHERE `T_id`='$PID'";
				// $sql3="INSERT INTO `productorderedhistory`(`OH_id`, `O_id`, `I_id`, `T_id`, `Customer_id`, `Planter_id`)
				// VALUES  (NULL, '0', '0', '$PID' , '0' , '$id')";
				// $result3=mysqli_query($connect, $sql3);
				if(mysqli_query($connect, $sql)&&mysqli_query($connect, $sql2)){
					echo "<script>window.location='ToolsAfter.php?success=1&id=". $PID . "'</script>";
				}
				}
			}
		}
		else if($type=="Customer"){
			if($PType=="Outdoor"){
				$sqlCart="SELECT * FROM `cart` WHERE `O_id`=".$PID;
				$result = mysqli_query($connect, $sqlCart) or die(mysqli_error($connect));
				if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					if($row["Prod_type"]==$PType){
						$sqlCart2="UPDATE `cart` SET `quantity`=`quantity`+'$quantity' WHERE `O_id`='$PID'";
						$sql2="UPDATE `Outdoor` SET `O_quantity`=`O_quantity`-1 WHERE `O_id`='$PID'";
						if(mysqli_query($connect, $sqlCart2)&&mysqli_query($connect, $sql2)){
						echo "<script>window.location='OutdoorAfter.php?success=1&id=". $PID . "'</script>";
					}}
							
				}
				}
				else{
				$sql = "INSERT INTO `cart`(`cart_id`, `Prod_type`, `O_id`, `I_id`, `T_id`, `quantity`,`Customer_id`,`Planter_id`)
				VALUES  (NULL, '$PType',$PID, '0', 0 , '$quantity','$id', 0)";
				$sql2="UPDATE `outdoor` SET `O_quantity`=`O_quantity`-1 WHERE `O_id`= $PID";
				// $sql3="INSERT INTO `productorderedhistory`(`OH_id`, `O_id`, `I_id`, `T_id`, `Customer_id`, `Planter_id`)
				// VALUES  (NULL, '$PID', 0, 0 , '$id' , 0)";
				// $result3=mysqli_query($connect, $sql3);
				if(mysqli_query($connect, $sql)&&mysqli_query($connect, $sql2)){
					echo "<script>window.location='OutdoorAfter.php?success=1&id=". $PID . "'</script>";
				}
				}
			}
			if($PType=="Indoor"){
				$sqlCart="SELECT * FROM `cart` WHERE `I_id`=".$PID;
				$result = mysqli_query($connect, $sqlCart) or die(mysqli_error($connect));
				if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					if($row["Prod_type"]==$PType){
						$sqlCart2="UPDATE `cart` SET `quantity`=`quantity`+'$quantity' WHERE `I_id`='$PID'";
						$sql2="UPDATE `indoor` SET `I_quantity`=`I_quantity`-1 WHERE `I_id`='$PID'";
						if(mysqli_query($connect, $sqlCart2)&&mysqli_query($connect, $sql2)){
						echo "<script>window.location='indoorAfter.php?success=1&id=". $PID . "'</script>";
					}}
							
				}
				}
				else{
				$sql = "INSERT INTO `cart`(`cart_id`, `Prod_type`, `O_id`, `I_id`, `T_id`, `quantity`,`Customer_id`,`Planter_id`)
				VALUES  (NULL, '$PType', 0, '$PID' , 0 , '$quantity','$id',0)";
				$sql2="UPDATE `indoor` SET `I_quantity`=`I_quantity`-1 WHERE `I_id`='$PID'";
				// $sql3="INSERT INTO `productorderedhistory`(`OH_id`, `O_id`, `I_id`, `T_id`, `Customer_id`, `Planter_id`)
				// VALUES  (NULL, 0, '$PID', 0 , '$id' , 0)";
				// $result3=mysqli_query($connect, $sql3);
				if(mysqli_query($connect, $sql)&&mysqli_query($connect, $sql2)){
					echo "<script>window.location='indoorAfter.php?success=1&id=". $PID . "'</script>";
				}
				}
			}
			if($PType=="Tools"){
			$sqlCart="SELECT * FROM `cart` WHERE `T_id`=".$PID;
				$result = mysqli_query($connect, $sqlCart) or die(mysqli_error($connect));
				if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					if($row["Prod_type"]==$PType){
						$sqlCart2="UPDATE `cart` SET `quantity`=`quantity`+'$quantity' WHERE `T_id`='$PID'";
						$sql2="UPDATE `Tools` SET `T_quantity`=`T_quantity`-1 WHERE `T_id`='$PID'";
						if(mysqli_query($connect, $sqlCart2)&&mysqli_query($connect, $sql2)){
						echo "<script>window.location='ToolsAfter.php?success=1&id=". $PID . "'</script>";
					}}
							
				}
				}
				else{
				$sql = "INSERT INTO `cart`(`cart_id`, `Prod_type`, `O_id`, `I_id`, `T_id`, `quantity`,`Customer_id`,`Planter_id`)
				VALUES  (NULL, '$PType', '0', '0' , '$PID' , '$quantity','$id','0')";
				$sql2="UPDATE `Tools` SET `T_quantity`=`T_quantity`-1 WHERE `T_id`='$PID'";
				// $sql3="INSERT INTO `productorderedhistory`(`OH_id`, `O_id`, `I_id`, `T_id`, `Customer_id`, `Planter_id`)
				// VALUES  (NULL, 0, 0, '$PID' , '$id' , 0)";
				// $result3=mysqli_query($connect, $sql3);
				if(mysqli_query($connect, $sql)&&mysqli_query($connect, $sql2)){
					echo "<script>window.location='ToolsAfter.php?success=1&id=". $PID . "'</script>";
				}
				}
			}	
		}
		else if($type==""){		
			if($PType=="Outdoor"){
				$sqlCart="SELECT * FROM `cartnotlogin` WHERE `O_id`=".$PID;
				$result = mysqli_query($connect, $sqlCart) or die(mysqli_error($connect));
				if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					if($row["Prod_type"]==$PType){
						$sqlCart2="UPDATE `cartnotlogin` SET `quantity`=`quantity`+'$quantity' WHERE `O_id`='$PID'";
						$sql2="UPDATE `Outdoor` SET `O_quantity`=`O_quantity`-1 WHERE `O_id`='$PID'";
						if(mysqli_query($connect, $sqlCart2)&&mysqli_query($connect, $sql2)){
						echo "<script>window.location='Outdoor.php?success=1&id=". $PID . "'</script>";
					}}
							
				}
				}
				else{
				$sql = "INSERT INTO `cartnotlogin`(`cart_id`, `Prod_type`, `O_id`, `I_id`, `T_id`, `quantity`)
				VALUES  (NULL, '$PType', '$PID', '0' , '0' , '$quantity')";
				$sql2="UPDATE `outdoor` SET `O_quantity`=`O_quantity`-1 WHERE `O_id`='$PID'";
				if(mysqli_query($connect, $sql)&&mysqli_query($connect, $sql2)){
					echo "<script>window.location='Outdoor.php?success=1&id=". $PID . "'</script>";
				}
				}
			}
			else if($PType=="Indoor"){
				$sqlCart="SELECT * FROM `cartnotlogin` WHERE `I_id`=".$PID;
				$result = mysqli_query($connect, $sqlCart) or die(mysqli_error($connect));
				if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					if($row["Prod_type"]==$PType){
						$sqlCart2="UPDATE `cartnotlogin` SET `quantity`=`quantity`+'$quantity' WHERE `I_id`='$PID'";
						$sql2="UPDATE `indoor` SET `I_quantity`=`I_quantity`-1 WHERE `I_id`='$PID'";
						if(mysqli_query($connect, $sqlCart2)&&mysqli_query($connect, $sql2)){
						echo "<script>window.location='indoor.php?success=1&id=". $PID . "'</script>";
					}}
							
				}
				}
				else{
				$sql = "INSERT INTO `cartnotlogin`(`cart_id`, `Prod_type`, `O_id`, `I_id`, `T_id`, `quantity`)
				VALUES  (NULL, '$PType', '0', '$PID' , '0' , '$quantity')";
				$sql2="UPDATE `indoor` SET `I_quantity`=`I_quantity`-1 WHERE `I_id`='$PID'";
				if(mysqli_query($connect, $sql)&&mysqli_query($connect, $sql2)){
					echo "<script>window.location='indoor.php?success=1&id=". $PID . "'</script>";
				}
				}
			}
			else if($PType=="Tools"){
			$sqlCart="SELECT * FROM `cartnotlogin` WHERE `T_id`=".$PID;
				$result = mysqli_query($connect, $sqlCart) or die(mysqli_error($connect));
				if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					if($row["Prod_type"]==$PType){
						$sqlCart2="UPDATE `cartnotlogin` SET `quantity`=`quantity`+'$quantity' WHERE `T_id`='$PID'";
						$sql2="UPDATE `Tools` SET `T_quantity`=`T_quantity`-1 WHERE `T_id`='$PID'";
						if(mysqli_query($connect, $sqlCart2)&&mysqli_query($connect, $sql2)){
						echo "<script>window.location='Tools.php?success=1&id=". $PID . "'</script>";
					}}
							
				}
				}
				else{
				$sql = "INSERT INTO `cartnotlogin`(`cart_id`, `Prod_type`, `O_id`, `I_id`, `T_id`, `quantity`)
				VALUES  (NULL, '$PType', '0', '0' , '$PID' , '$quantity')";
				$sql2="UPDATE `Tools` SET `T_quantity`=`T_quantity`-1 WHERE `T_id`='$PID'";
				if(mysqli_query($connect, $sql)&&mysqli_query($connect, $sql2)){
					echo "<script>window.location='Tools.php?success=1&id=". $PID . "'</script>";
				}
				}
			}
		
		
		

		else
		{
			echo "<script>alert('Added Failed !');";
			echo "</script>";
		}
		}
		
	
?>