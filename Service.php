<?php 
$connect = mysqli_connect("localhost", "root", "","roots");
$query = "SELECT * FROM `services`";
$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
?>
<center>
<div style="height:1200px; width:90%; left:110px;">
<div style="overflow-x:auto;">
<table border="0">
<tr>
<?php 
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
?>
	<td>
	<center>
		<div style="background-color:white; width:350px; align:center;">
		<img src="<?php echo $row["S_img"] ?>" style="height:425px; width:350px; border: 1px solid white; background-color:white; padding: 10px;"><br><br>
		<?php 
		
			echo $row["S_title"] . "<br>" . "The price from " .$row["S_price"] . " SAR" ;
		?>
		</div>
	</td>
	<?php 
	if($row['S_id']==2||$row['S_id']==4||$row['S_id']==6||$row['S_id']==8||$row['S_id']==10||$row['S_id']==12){
		echo "</tr>";
	}
		}
	}
	?>
	<td>
	</tr>
</table>
</div>
</div>
<br><br>

<div>
</div>


<div>
</div>
