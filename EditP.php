<?php
	$connect = mysqli_connect("localhost", "root", "","roots");
	$id= $_POST["id"];
	$type=$_POST["type"];
	$email = $_POST["email"];	
	$price = $_POST["price"];
	$quantity = $_POST["quantity"];
	
		if($type=="Indoor"){
			$sql="UPDATE indoor SET `I_price`='$price',`I_quantity`='$quantity'
			 WHERE `I_id`='" . $id . "'" ;
			
			if(mysqli_query($connect, $sql)){
				echo "<script>alert('Modified successfully!');";
				header("Location: EditPlant.php");
			}
			else{
				echo "<script>alert('Modified Failed!');";
				header("Location: EditPlant.php");
				echo "</script>";
			}
		}
		else if($type=="Outdoor"){
			$sql="UPDATE outdoor SET `O_price`='$price',`O_quantity`='$quantity'
			WHERE `O_id`='" . $id . "'" ;
			
			if(mysqli_query($connect, $sql)){
				echo "<script>alert('Modified successfully!');";
				header("Location: EditPlant.php");
			}
			else{
				echo "<script>alert('Modified Failed!');";
				header("Location: EditPlant.php");
				echo "</script>";
			}
		}
	
?>