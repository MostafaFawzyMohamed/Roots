<?php
	$connect = mysqli_connect("localhost", "root", "","roots");
	$id= $_POST["id"];
	$email = $_POST["email"];	
	$price = $_POST["price"];
	$sql="UPDATE services SET `S_price`='$price'
	WHERE `S_id`='" . $id . "'" ;
	if(mysqli_query($connect, $sql)){
		echo "<script>alert('Modified successfully!');";
		header("Location: EditService.php");
	}
	else
	{
		echo "<script>alert('Modified Failed!');";
		header("Location: EditService.php");
		echo "</script>";
	}
	
?>