<?php
$cookie_name = "email";
$connect = mysqli_connect("localhost", "root", "","roots");
$query = "SELECT * FROM `outdoor`";
mysqli_query($connect,"SET CHARACTER SET 'utf8'");
$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
?>
<!DOCTYPE html >
<html>
<head>
	<meta charset="utf-8"/>
	<title>Outdoor</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div style="overflow-x:auto;">
<table border="0">
<tr>
<?php 
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
?>
	<td>
	<?php if($row["O_quantity"]==0){ ?>
	<center>
		<div style="background-color:#C0C0C0; filter: brightness(70%); width:250px; align:center;">
		<img src="<?php echo $row["O_img"] ?>" style="height:325px; width:250px; border: 1px solid white; background-color:white; padding: 10px;"><br>
		<?php 
		
			echo "<p style='font-size:18px;'>".$row["O_title"] . "<br>" .$row["O_price"] . " SAR</p>" ;
		?>
		<?php echo "Units: ".$row["O_quantity"] ?>
		</div>
	<?php }else { ?>
	<center>
				<div style="background-color:white; width:250px; align:center;">
		<img src="<?php echo $row["O_img"] ?>" style="height:325px; width:250px; border: 1px solid white; background-color:white; padding: 10px;"><br>
		<?php 
		
			echo $row["O_title"] . "<br>" .$row["O_price"] . " SAR" ;
		?>
		<br><?php echo "Units: ".$row["O_quantity"] ?><br>
		</div>
	<?php } ?>
	</td>
	<?php 
	if($row['O_id']==3||$row['O_id']==6||$row['O_id']==9||$row['O_id']==12||$row['O_id']==15||$row['O_id']==18||$row['O_id']==21||$row['O_id']==23||$row['O_id']==26||$row['O_id']==29||$row['O_id']==32||$row['O_id']==25){
		echo "</tr>";
	}
		}
	}
	?>
	<td>
</tr>
</table>
</div>
</body>

</html>