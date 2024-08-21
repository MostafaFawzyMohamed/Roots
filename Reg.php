<?php
	$connect = mysqli_connect("localhost", "root", "","roots");
	$email = $_POST["email"];	
	$Password = $_POST["password"];
	$CPassword = $_POST["cpassword"];
	$firstname = $_POST["first"];
	$lastname = $_POST["last"];
	$birth=$_POST["birth"];
	$gender=$_POST["gender"];
	$code=$_POST['code'];
	$mobile=$_POST["phone"];
	$phone=$code . $mobile;
	$address=$_POST["address"];
	if ($Password != $CPassword) {
		echo "<script>alert('Password and confirm password does not match!!');";
		echo "window.location.href = 'Register.html'";
		echo "</script>";
	}
	else{
			session_start();
			$_SESSION["email"] = $email;
			$sql = "INSERT INTO `customer`(`Customer_id`, `C_Fname`, `C_Lname`, `C_address`, `C_phone`, `C_email`, `C_birthdate`, `C_Password`, `C_Gender`)
			VALUES  (NULL, '$firstname', '$lastname', '$address', '$phone', '$email','$birth','$Password','$gender')";
			if(mysqli_query($connect, $sql)){
				header("Location: profile.php");
			}
			else{
				echo "<script>alert('Invalid Registrations !');";
				echo "window.location.href = 'Register.html'";
				echo "</script>";
			}
	}
?>