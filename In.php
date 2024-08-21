<?php
$connect = mysqli_connect("localhost", "root", "","roots");
$query = "SELECT * FROM `indoor`";
mysqli_query($connect,"SET CHARACTER SET 'utf8'");
$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
?>
<!DOCTYPE html >
<html>
<head>
	<meta charset="utf-8"/>
	<title>Indoor</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
<style>
* {box-sizing: border-box}
.mySlides1, .mySlides2 {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a grey background color */
.prev:hover, .next:hover {
  background-color: #f1f1f1;
  color: black;
}
</style>
</head>
<body>
<div style=" overflow-x:auto;">
<table border="0">
<tr>
<?php 
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
?>

		<?php 
			
			if($row['I_id']==13){
				$img=$row['I_img'];
				?>
				<td>
				<center>
				<div class="slideshow-container">
				<div class="mySlides1">
				<div style="background-color:white; width:250px; align:center;">
				<img src="<?php echo $row["I_img"] ;?>" style="height:325px; width:250px; border: 1px solid white; background-color:white; padding: 10px;"><br>
				<?php echo $row["I_title"] ?><br><?php echo $row["I_price"] ?> SAR
				<br><?php echo "Units: ".$row["I_quantity"] ?><br>
				</div>
				</div>
		<?php
			}
			if($row['I_id']==14){
			?>
			<div class="mySlides1">
			<div style="background-color:white; width:250px; align:center;">
			<img src="<?php echo $row["I_img"] ;?>" style="height:325px; width:250px; border: 1px solid white; background-color:white; padding: 10px;"><br>
			<?php echo $row["I_title"] ?><br><?php echo $row["I_price"] ?> SAR
			<br><?php echo "Units: ".$row["I_quantity"] ?><br>
			</div>
			</div>
		<?php
			echo "<div style='text-align:center'>";
			echo "<span onclick='current(1, 0)'><img src='". $img . "' style='height:50px; width:50px;'/></span>";
			echo "<span onclick='current(2, 0)'><img src='". $row["I_img"] . "' style='height:50px; width:50px;'/></span>";
			echo "</div></div></td>";
		}
		if($row['I_id']==15){
				$img=$row['I_img'];
				?>
				<td>
				<center>
				<div class="slideshow-container">
				<div class="mySlides2">
				<div style="background-color:white; width:250px; align:center;">
				<img src="<?php echo $row["I_img"] ;?>" style="height:325px; width:250px; border: 1px solid white; background-color:white; padding: 10px;"><br>
				<?php echo $row["I_title"] ?><br><?php echo $row["I_price"] ?> SAR
				<br><?php echo "Units: ".$row["I_quantity"] ?><br>
				</div>
				</div>
		<?php
			}
			
			if($row['I_id']==16){
			$img2=$row['I_img'];
			?>
			<div class="mySlides2">
			<div style="background-color:white; width:250px; align:center;">
			<img src="<?php echo $row["I_img"] ;?>" style="height:325px; width:250px; border: 1px solid white; background-color:white; padding: 10px;"><br>
			<?php echo $row["I_title"] ?><br><?php echo $row["I_price"] ?> SAR
			<br><?php echo "Units: ".$row["I_quantity"] ?><br>
			</div>
			</div>
			
		<?php
			}
			if($row['I_id']==17){
			?>
			<center>
			<div class="mySlides2">
			<div style="background-color:white; width:250px; align:center;">
			<img src="<?php echo $row["I_img"] ;?>" style="height:325px; width:250px; border: 1px solid white; background-color:white; padding: 10px;"><br>
			<?php echo $row["I_title"] ?><br><?php echo $row["I_price"] ?> SAR
			<br><?php echo "Units: ".$row["I_quantity"] ?><br>
			</div>
			</div>
			<?php
			echo "<div style='text-align:center'>";
			echo "<span onclick='current(1, 1)'><img src='". $img . "' style='height:50px; width:50px;'/></span>";
			echo "<span onclick='current(2, 1)'><img src='". $img2 . "' style='height:50px; width:50px;'/></span>";
			echo "<span onclick='current(3, 1)'><img src='". $row["I_img"] . "' style='height:50px; width:50px;'/></span>";
			echo "</div></div></td>";
		}
		if($row['I_id']==18){
				$img=$row['I_img'];
				?>
				<td>
				<center>
				<div class="slideshow-container">
				<div class="mySlides3">
				<div style="background-color:white; width:250px; align:center;">
				<img src="<?php echo $row["I_img"] ;?>" style="height:325px; width:250px; border: 1px solid white; background-color:white; padding: 10px;"><br>
				<?php echo $row["I_title"] ?><br><?php echo $row["I_price"] ?> SAR
				<br><?php echo "Units: ".$row["I_quantity"] ?><br>
				</div>
				</div>
		<?php
			}
			
			if($row['I_id']==19){
			$img2=$row['I_img'];
			?>
			<div class="mySlides3">
			<div style="background-color:white; width:250px; align:center;">
			<img src="<?php echo $row["I_img"] ;?>" style="height:325px; width:250px; border: 1px solid white; background-color:white; padding: 10px;"><br>
			<?php echo $row["I_title"] ?><br><?php echo $row["I_price"] ?> SAR
			<br><?php echo "Units: ".$row["I_quantity"] ?><br>
			</div>
			</div>
			
		<?php
			}
			if($row['I_id']==20){
				$img3=$row['I_img'];
			?>
			<center>
			<div class="mySlides3">
			<div style="background-color:white; width:250px; align:center;">
			<img src="<?php echo $row["I_img"] ;?>" style="height:325px; width:250px; border: 1px solid white; background-color:white; padding: 10px;"><br>
			<?php echo $row["I_title"] ?><br><?php echo $row["I_price"] ?> SAR
			<br><?php echo "Units: ".$row["I_quantity"] ?><br>
			</div>
			</div>
			<?php
			}
			if($row['I_id']==21){
			?>
			<center>
			<div class="mySlides3">
			<div style="background-color:white; width:250px; align:center;">
			<img src="<?php echo $row["I_img"] ;?>" style="height:325px; width:250px; border: 1px solid white; background-color:white; padding: 10px;"><br>
			<?php echo $row["I_title"] ?><br><?php echo $row["I_price"] ?> SAR
			<br><?php echo "Units: ".$row["I_quantity"] ?><br>
			</div>
			</div>
			<?php
			echo "<div style='text-align:center'>";
			echo "<span onclick='current(1, 2)'><img src='". $img . "' style='height:50px; width:50px;'/></span>";
			echo "<span onclick='current(2, 2)'><img src='". $img2 . "' style='height:50px; width:50px;'/></span>";
			echo "<span onclick='current(3, 2)'><img src='". $img3 . "' style='height:50px; width:50px;'/></span>";
			echo "<span onclick='current(4, 2)'><img src='". $row["I_img"] . "' style='height:50px; width:50px;'/></span>";
			echo "</div></div></td>";
		}	
	else if($row['I_id']!=13&&$row['I_id']!=14&&$row['I_id']!=15&&$row['I_id']!=16&&$row['I_id']!=17&&$row['I_id']!=18&&$row['I_id']!=19&&$row['I_id']!=20&&$row['I_id']!=21){
		?>
			<td>
			<center>
			<div style="background-color:white; width:250px; align:center;">
		<img src="<?php echo $row["I_img"] ?>" style="height:325px; width:250px; border: 1px solid white; background-color:white; padding: 10px;"><br><br>
		<?php 
		
			echo "<p style='font-size:18px;'>".$row["I_title"] . "<br>" .$row["I_price"] . " SAR</p>" ;
		?>
		<?php echo "Units: ".$row["I_quantity"] ?><br>
		</a>
		</div>
	<?php
	}
	if($row['I_id']==3||$row['I_id']==6||$row['I_id']==9||$row['I_id']==12||$row['I_id']==21|$row['I_id']==21){
		echo "</tr>";
	}
		}
	}
	?>
	</td>
</tr>
</table>
<br>
</div>
<script>
let slideIndex = [1,1,1];
let slideId = ["mySlides1", "mySlides2" , "mySlides3" ]
showSlides(1, 0);
showSlides(1, 1);
showSlides(1, 2);

function plusSlides(n, no) {
  showSlides(slideIndex[no] += n, no);
}

function current(n, no) {
  showSlides(slideIndex[no] = n, no);
}

function showSlides(n, no) {
  let i;
  let x = document.getElementsByClassName(slideId[no]);
  if (n > x.length) {slideIndex[no] = 1}    
  if (n < 1) {slideIndex[no] = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex[no]-1].style.display = "block";  
}

</script>

</body>

</html>