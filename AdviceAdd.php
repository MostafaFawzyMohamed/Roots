<?php
	$connect = mysqli_connect("localhost", "root", "","roots");
	$title = $_POST["title"];	
	$details = $_POST["details"];
	$sql = "INSERT INTO `advices`(`A_id`, `A_title`, `A_details`)
		VALUES  (NULL, '$title', '$details')";
			if(mysqli_query($connect, $sql)){
				header("Location: ViewAdvices.php");
			}
			else{
				echo "<script>alert('Failed Added !');";
				echo "window.location.href = 'AddAdvice.php'";
				echo "</script>";
			}
		
	
?>