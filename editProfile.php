<?php
	$connect = mysqli_connect("localhost", "root", "","roots");
	$id= $_POST["id"];
	$type=$_POST["type"];
	$email = $_POST["email"];	
	$firstname = $_POST["first"];
	$lastname = $_POST["last"];
	$birth=$_POST["birth"];
	$gender=$_POST["gender"];
	$code=$_POST['code'];
	$mobile=$_POST["phone"];
	$phone=$code . $mobile;
	$address=$_POST["address"];
	
		if($type=="Planter"){
			$sql="UPDATE planter SET `P_Fname`='$firstname',`P_Lname`='$lastname',
			`P_email`='$email' ,`P_phone`='$phone' , `P_birthdate`='$birth' , `P_Address`='$address' , 
			`P_Gender`='$gender' WHERE `Planter_id`='" . $id . "'" ;
			
			if(mysqli_query($connect, $sql)){
				header("Location: profile.php");
			}
			else{
				echo "<script>alert('Invalid Registrations !');";
				echo "window.location.href = 'Register.html'";
				echo "</script>";
			}
		}
		else if($type=="Customer"){
			$sql="UPDATE customer SET `C_Fname`='$firstname',`C_Lname`='$lastname',
			`C_email`='$email' ,`C_phone`='$phone' , `C_birthdate`='$birth' , `C_address`='$address' , 
			`C_Gender`='$gender' WHERE `Customer_id`='" . $id . "'" ;
			
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