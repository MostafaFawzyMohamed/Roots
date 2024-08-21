<?php
	$connect = mysqli_connect("localhost", "root", "","roots");
	$email=$_POST['email'];
	$type= $_POST['type'];
	$id = $_POST["id"];	
	$rate= $_POST["rate"] ?? 1;
	$PType= $_POST["Product_type"];
	$PID= $_POST["Product_id"];
	settype($PID, "int");
		if($type=="Planter"){

			$sql = "SELECT * FROM rating WHERE 0 == 1 LIMIT 1";			

			if($PType=="Outdoor"){

				$sqlOldRate = "SELECT * FROM rating WHERE P_ID = '$id' AND O_ID = '$PID'";
				$result =  mysqli_query($connect, $sqlOldRate);
				if(mysqli_num_rows($result) > 0){
					$row = $result->fetch_assoc();
					$sql = "UPDATE rating SET Rating_Value = $rate WHERE Rate_id = " . $row['Rate_id'];
				}
				else 
				{
					$sql = "INSERT INTO `rating`(`Rate_id`, `Rating_Value`, `C_ID`, `P_ID`,`O_ID`,`I_ID`,`T_ID`)
					VALUES  (NULL, '$rate', '0', '$id','$PID','0','0')";
				}

			if(mysqli_query($connect, $sql)){
				echo "<script>alert('Rating Successfully !');</script>";
				echo "<script>window.location='OutdoorAfter.php'</script>";
			}

			}
			else if($PType=="Indoor"){

				$sqlOldRate = "SELECT * FROM rating WHERE P_ID = '$id' AND I_ID = '$PID'";
				$result =  mysqli_query($connect, $sqlOldRate);
				if(mysqli_num_rows($result) > 0){
					$row = $result->fetch_assoc();
					$sql = "UPDATE rating SET Rating_Value = $rate WHERE Rate_id = " . $row['Rate_id'];
				}
				else{
					$sql = "INSERT INTO `rating`(`Rate_id`, `Rating_Value`, `C_ID`, `P_ID`,`O_ID`,`I_ID`,`T_ID`)
					VALUES  (NULL, '$rate', '0', '$id','0','$PID','0')";
				}

			if(mysqli_query($connect, $sql)){
				echo "<script>alert('Rating Successfully !');</script>";
				echo "<script>window.location='indoorAfter.php'</script>";
			}
			}
			else if($PType=="Tools"){

				$sqlOldRate = "SELECT * FROM rating WHERE P_ID = '$id' AND T_ID = '$PID'";
				$result =  mysqli_query($connect, $sqlOldRate);
				if(mysqli_num_rows($result) > 0){
					$row = $result->fetch_assoc();
					$sql = "UPDATE rating SET Rating_Value = $rate WHERE Rate_id = " . $row['Rate_id'];
				}
				else{

					$sql = "INSERT INTO `rating`(`Rate_id`, `Rating_Value`, `C_ID`, `P_ID`,`O_ID`,`I_ID`,`T_ID`)
					VALUES  (NULL, '$rate', '0', '$id','0','0','$PID')";
				}

				
			if(mysqli_query($connect, $sql)){
				echo "<script>alert('Rating Successfully !');</script>";
				echo "<script>window.location='ToolsAfter.php'</script>";
			}
			}
			else{
				echo "<script>alert('Rating Failed !');";
				echo "</script>";
			}
		}
		else if($type=="Customer"){
			$sql = "SELECT * FROM rating WHERE 0 == 1 LIMIT 1";	

			if($PType=="Outdoor"){

				$sqlOldRate = "SELECT * FROM rating WHERE C_ID = '$id' AND O_ID = '$PID'";
				$result =  mysqli_query($connect, $sqlOldRate);
				if(mysqli_num_rows($result) > 0){
					$row = $result->fetch_assoc();
					$sql = "UPDATE rating SET Rating_Value = $rate WHERE Rate_id = " . $row['Rate_id'];
				}
				else 
				{
					$sql = "INSERT INTO `rating`(`Rate_id`, `Rating_Value`, `C_ID`, `P_ID`,`O_ID`,`I_ID`,`T_ID`)
					VALUES  (NULL, '$rate', '$id', '0','$PID','0','0')";
				}


				if(mysqli_query($connect, $sql)){
				echo "<script>alert('Rating Successfully !');</script>";
				echo "<script>window.location='OutdoorAfter.php'</script>";
				}
				else{
				echo "<script>alert('Rating Failed !');";
				echo "</script>";
				}
			}
			else if($PType=="Indoor"){

				$sqlOldRate = "SELECT * FROM rating WHERE C_ID = '$id' AND I_ID = '$PID'";
				$result =  mysqli_query($connect, $sqlOldRate);
				if(mysqli_num_rows($result) > 0){
					$row = $result->fetch_assoc();
					$sql = "UPDATE rating SET Rating_Value = $rate WHERE Rate_id = " . $row['Rate_id'];
				}
				else{
					$sql = "INSERT INTO `rating`(`Rate_id`, `Rating_Value`, `C_ID`, `P_ID`,`O_ID`,`I_ID`,`T_ID`)
					VALUES  (NULL, '$rate', '$id', 0, 0,'$PID', 0)";
				}
				


				if(mysqli_query($connect, $sql)){
				echo "<script>alert('Rating Successfully !');</script>";
				echo "<script>window.location='indoorAfter.php'</script>";
				}
				else{
				echo "<script>alert('Rating Failed !');";
				echo "</script>";
				}
			}
			else if($PType=="Tools"){


				$sqlOldRate = "SELECT * FROM rating WHERE C_ID = '$id' AND T_ID = '$PID'";
				$result =  mysqli_query($connect, $sqlOldRate);
				if(mysqli_num_rows($result) > 0){
					$row = $result->fetch_assoc();
					$sql = "UPDATE rating SET Rating_Value = $rate WHERE Rate_id = " . $row['Rate_id'];
				}
				else{

					$sql = "INSERT INTO `rating`(`Rate_id`, `Rating_Value`, `C_ID`, `P_ID`,`O_ID`,`I_ID`,`T_ID`)
					VALUES  (NULL, '$rate', '$id', '0','0','0','$PID')";
				}


				if(mysqli_query($connect, $sql)){
				echo "<script>alert('Rating Successfully !');</script>";
				echo "<script>window.location='ToolsAfter.php'</script>";
				}
				else{
				echo "<script>alert('Rating Failed !');";
				echo "</script>";
				}
			}
		}
	
?>