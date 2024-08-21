<?php
	$connect = mysqli_connect("localhost", "root", "","roots");
	$id= $_POST["id"];
	$email = $_POST["email"];	
	$details = $_POST["details"];
	$title= $_POST['title'];
	$sql="UPDATE advices SET `A_title`='$title'
	WHERE `A_id`='" . $id . "'" ;
	
	if(mysqli_query($connect, $sql)){
		echo "<script>alert('Modified successfully!');";
		header("Location: EditAdvice.php");
		echo "</script>";
	}
	else
	{
		echo "<script>alert('Modified Failed!');";
		header("Location: EditAdvice.php");
		echo "</script>";
	}
	
?>