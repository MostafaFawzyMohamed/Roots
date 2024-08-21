<?php
	$connect = mysqli_connect("localhost", "root", "","roots");
	$status=$_POST['status'];
	$id=$_POST['id'];
	$sql = "UPDATE `servicesorders` SET `S_status`='$status' WHERE `Ord_ID`='$id'";
			
	if(mysqli_query($connect, $sql)){
				header("Location: profile.php?option=".$status);
	}
	else
	{
		echo "<script>alert('Failed Service Request Update!');";
		header("Location: profile.php");
		echo "</script>";
	}
	
?>