<?php
	
	$connect = mysqli_connect("localhost", "root", "","roots");
	$type = $_POST["type"];	
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
	$quantity = $_POST["quantity"];
	if($type=="Indoor"){
		$destination = 'img/indoor/' . $fileName;
		if (in_array($fileActualExt, $allowed)){
		if ($fileError == 0){
			if ($fileSize < 5000000){

				$sql = "INSERT INTO `indoor`(`I_id`, `I_title`, `I_img`, `I_price`, `I_quantity`)
				VALUES  (NULL, '$title', '$destination', '$price', '$quantity')";

				if(mysqli_query($connect, $sql)){

					if (move_uploaded_file($file, $destination)) {
						echo "<script>alert('Added Successfully !');</script>";
						echo "<script>window.location='ViewIN.php'</script>";
					 }
				}

			}
		}
		}	
		}
	
		
	else if($type=="Outdoor"){
		$destination = 'img/outdoor/' . $fileName;
		if (in_array($fileActualExt, $allowed)){
		if ($fileError == 0){
			if ($fileSize < 5000000){

				$sql = "INSERT INTO `outdoor`(`O_id`, `O_title`, `O_img`, `O_price`, `O_quantity`)
				VALUES  (NULL, '$title', '$destination', '$price', '$quantity')";

				if(mysqli_query($connect, $sql)){

					if (move_uploaded_file($file, $destination)) {
						echo "<script>alert('Added Successfully !');</script>";
						echo "<script>window.location='ViewOut.php'</script>";
					 }
				}

			}
		}
		}
			
		}
		else{
				echo "<script>alert('Invalid Added !');";
				echo "window.location.href = 'AddPlant.php'";
				echo "</script>";
			}			
	
	
	
	
?>