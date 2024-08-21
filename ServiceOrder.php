<?php
	$connect = mysqli_connect("localhost", "root", "","roots");
	$email=$_POST['email'];
	$status=$_POST['status'];
	$id=$_POST['Cust_id'];
	$S_id=$_POST['id'];
	$sql = "INSERT INTO `servicesorders`(`Ord_ID`,`S_id`, `S_status`, `Cust_id`)
			VALUES  (NULL,'$S_id', '$status', '$id')";
	if(mysqli_query($connect, $sql)){
				header("Location: profile.php");
	}
	else
	{
		echo "<script>alert('Failed Service Order!');";
		header("Location: ServiceAfter.php");
		echo "</script>";
	}
	
?>