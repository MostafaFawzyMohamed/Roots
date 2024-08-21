<?php
	$connect = mysqli_connect("localhost", "root", "","roots");
	$title = $_POST["title"];
	$fileName = $_FILES['image']['name'];
	$fileError = $_FILES['image']['error'];
	$fileType = $_FILES['image']['type'];
	$fileSize = $_FILES['image']['size'];
	$data = file_get_contents($_FILES['image']['tmp_name']);
	$file = $_FILES['image']['tmp_name'];
	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));
	$allowed = array('csv','doc','docx','jpg','pdf','png');
	$price = $_POST["price"];
	$sql="";
	$destination = 'img/Services/' . $fileName;
		if (in_array($fileActualExt, $allowed)){
		if ($fileError == 0){
			if ($fileSize < 5000000){

				$sql = "INSERT INTO `services`(`S_id`, `S_title`, `S_img`, `S_price`)
				VALUES  (NULL, '$title', '$destination', '$price')";

				if(mysqli_query($connect, $sql)){

					if (move_uploaded_file($file, $destination)) {
						echo "<script>alert('Added Successfully !');</script>";
							echo "<script>window.location='ViewServices.php'</script>";
					 }
				}
				 
		}
		}
			
		}
		else{
				echo "<script>alert('Invalid Added !');";
				echo "window.location.href = 'AddTool.php'";
				echo "</script>";
			}			
	
	
	
	
?>