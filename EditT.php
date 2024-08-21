<?php
	$connect = mysqli_connect("localhost", "root", "","roots");
	$id= $_POST["id"];
	$email = $_POST["email"];	
	$price = $_POST["price"];
	$quantity = $_POST["quantity"];
	$sql="UPDATE tools SET `T_price`='$price',`T_quantity`='$quantity'
	WHERE `T_id`='" . $id . "'" ;
	if(mysqli_query($connect, $sql)){
		echo "<script>alert('Modified successfully!');";
		header("Location: EditTool.php");
	}
	else
	{
		echo "<script>alert('Modified Failed!');";
		header("Location: EditTool.php");
		echo "</script>";
	}
	
?>