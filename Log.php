<?php  
 $connect = mysqli_connect("localhost", "root", "","roots");;

if (isset($_POST['email']) and isset($_POST['password']) and isset($_POST['type']))
{
	
$email = $_POST['email'];
$password = $_POST['password'];
$type= $_POST['type'];

if($type=="Customer"){
	$query = "SELECT * FROM `customer` WHERE C_email='$email' and C_Password='$password'";
	$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
	$count = mysqli_num_rows($result);
	if ($count == 1)
	{
		session_start();
		$_SESSION["email"] = $email;
		$cookie_name = "email";
		$cookie_value = $email;
		setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
		header("Location: profile.php");
	}
	else{
		echo "<script>alert('Invalid Login !');";
		echo "window.location.href = 'Login.html'";
		echo "</script>";
	}
}

else if($type=="Planter"){
	$query2 = "SELECT * FROM `planter` WHERE P_email='$email' and Password='$password'";
	$result2 = mysqli_query($connect, $query2) or die(mysqli_error($connect));
	$count2 = mysqli_num_rows($result2);
	if ($count2 == 1)
	{
		session_start();
		$_SESSION["email"] = $email;
		$cookie_name = "email";
		$cookie_value = $email;
		setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
		header("Location: profile.php");
	}
	else{
		echo "<script>alert('Invalid Login !');";
		echo "window.location.href = 'Login.html'";
		echo "</script>";
	}
}
else if($type=="Admin"){
	session_start();
	$_SESSION["email"] = $email;
	$query2 = "SELECT * FROM `admin` WHERE email='$email' and password='$password'";
	$result2 = mysqli_query($connect, $query2) or die(mysqli_error($connect));
	$count2 = mysqli_num_rows($result2);
	if ($count2 == 1)
	{
		$cookie_name = "email";
		$cookie_value = $email;
		setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
		//header("Location: adminPannel.php?email=".$email);
		header("Location: adminPannel.php");
	}
	else{
		echo "<script>alert('Invalid Login !');";
		echo "window.location.href = 'Login.html'";
		echo "</script>";
	}
}
else{
	echo "<script>alert('Invalid Login !');";
	echo "window.location.href = 'Login.html'";
	echo "</script>";
}
}
?>

