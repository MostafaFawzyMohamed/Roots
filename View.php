<?php
session_start();
$cookie_name = "email";
$email=$_SESSION["email"];
$cookie_value = $email;
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
?>
<!DOCTYPE html>
<html>
<head>
	<title>All Products & Service & Advices</title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="style2.css">
	<style>
		html {
			position: relative;
			max-width: 1900px;
			min-width: 1900px;
			margin: auto;
			height: 90%;
		}
	</style>
</head>
<body>
<div id="cat">
                    <ul>
						<li id="Home" class="filter"><a href="indexAfter.php">Home</a></li>
						<div class="class1 filter dropdown">
						<li><button class="class1 dropbtn">
							Products	
						</button></li>
						<div class="dropdown-content">
							<a href="indoorAfter.php">Indoor Plants</a>
							<a href="OutdoorAfter.php">Outdoor Plants</a>
							<a href="ToolsAfter.php">Tools & Equipments</a>
						</div></div>
						<div class="class1 filter dropdown">
							<li id="Services" class="filter"><a href="ServicesAfter.php">Services</a></li>
						</div>
						<div class="class1 filter dropdown">
							<li id="Advice" class=" filter"><a href="AdvicesAfter.php">Advice & FAQs</a></li>
						</div>
						<div class="class1 filter dropdown" style="width:200px;">
							<li id="Admin" class="active filter"><a href="adminPannel.php">Admin</a></li>
						</div>
                    </ul>
					<div align="right">
							<p><?php echo "Welcome admin";?></p>
							<a href="Logout.php"><button class="button button4">Logout</button></a><br>
					</div>
					
</div>
<br><br><br>
<div class="split left" style="left:100px; width:300px;">
<center><a href="index.php"><img src="logo.png" align="center" style="height:200px; width:200px"></a>  
<h1>Admin Pannel</h1><br>
  <button class="button button4 tablinks" style="height:50px; width:250px" onmouseover="openCity(event, 'Plants')">Plants</button><br>
  <button class="button button4 tablinks" style="height:50px; width:250px" onmouseover="openCity(event, 'Tools & Equipments')">Tools & Equipments</button><br>
  <button class="button button4 tablinks" style="height:50px; width:250px" onmouseover="openCity(event, 'services')">Services</button><br>
  <button class="button button4 tablinks" style="height:50px; width:250px" onmouseover="openCity(event, 'Advices')">Advices</button><br>
  <a href="Customers.php"><button class="button button4 tablinks" style="height:50px; width:250px" >Customers</button></a><br>
  <a href="Planters.php"><button class="button button4 tablinks" style="height:50px; width:250px" >Planters</button></a><br>
  <a href="View.php"><button class="button button4 tablinks" style="height:50px; width:250px">View</button></a><br>
</div>
<div class="split right" style="width:1500px;; height:100%; right:25px;">

<div id="Plants" class="tabcontent">
  <br><br><br><br><br><br><br><br><br><br><br>
	<button style="height:50px; width:250px" class="button button4 tablinks" onmouseover="openCity2(event, 'PlantsTab')">Plants</button><br>
	<a href="AddPlant.php"><button style="height:50px; width:250px" class="button button4 tablinks">Add</button></a><br>
	<a href="EditPlant.php"><button style="height:50px; width:250px" class="button button4 tablinks">Modify</button></a><br>
	<a href="ViewAll.php"><button style="height:50px; width:250px" class="button button4">View</button></a><br>
</div>
<div id="Tools & Equipments" class="tabcontent">
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<a href="AddTool.php"><button style="height:50px; width:250px" class="button button4 tablinks">Add</button></a><br>
	<a href="EditTool.php"><button style="height:50px; width:250px" class="button button4 tablinks">Modify</button></a><br>
	<a href="ViewTools.php"><button style="height:50px; width:250px" class="button button4">View</button></a><br>
</div>

<div id="services" class="tabcontent">
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<a href="AddService.php"><button style="height:50px; width:250px" class="button button4 tablinks">Add</button></a><br>
	<a href="EditService.php"><button style="height:50px; width:250px" class="button button4 tablinks">Modify</button></a><br>
	<a href="ViewServices.php"><button style="height:50px; width:250px" class="button button4">View</button></a><br>
</div>

<div id="Advices" class="tabcontent">
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<a href="AddAdvice.php"><button style="height:50px; width:250px" class="button button4 tablinks">Add</button></a><br>
	<a href="EditAdvice.php"><button style="height:50px; width:250px" class="button button4 tablinks">Modify</button></a><br>
	<a href="ViewAdvices.php"><button style="height:50px; width:250px" class="button button4">View</button></a><br>
</div>

<div class="split right" style="width:1200px;; height:100%; right:25px;">
<div id="PlantsTab" class="tabcontent">
  <br><br><br><br><br><br><br><br><br>
	<a href="ViewIN.php"><button style="height:50px; width:250px" class="button button4 tablinks">Indoor Plants</button></a><br>
	<a href="ViewOut.php"><button style="height:50px; width:250px" class="button button4 tablinks">Outdoor Plants</button></a><br>
</div>
<div class="clearfix"></div>
</div>
</div>

<div class="split right" style="width:1000px; height:11800px; right:25px;">
  <h1>Indoor Plants</h1>
  <?php include 'In.php'; ?>
  <br>
  <h1>Outdoor Plants</h1>
  <?php include 'Out.php'; ?>
  <br>
   <h1>Tools & Equipments</h1>
  <?php include 'Tool2.php'; ?>
  <br>
  <h1>Services</h1>
  <?php include 'Service.php'; ?>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <br><br><br><br><br><br><br><br><br><br>
  <div align="left">
  <h1>Advices</h1>
  <?php include 'Advice.php'; ?>
  </div>
</div>
<div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>


<footer>
        <img src="logo.png" width="250px" alt="Roots Logo">        
        <p>Copyright 2023-2024. All rights reserved by Roots Project</p>
		<div class="social-links">
                <a href="https://instagram.com/roots_pl?igshid=YzAwZjE1ZTI0Zg%3D%3D&utm_source=qr"><img src="./img/instgram.png" alt=""  height="50px" /></a>&nbsp &nbsp &nbsp
                <a href="mailto:Roots.pl00@gmail.com"><img src="./img/mail.png" alt="" height="70px"/></a>
				<a href="https://wa.me/+966545010018"><img src="img/whatsapp.png" alt="" height="80px"/></a>
		</div>
</footer>
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
function openCity2(evt, cityName) {
  var i, tabcontent2, tablinks2;
  tabcontent2 = document.getElementsByClassName("tabcontent2");
  for (i = 0; i < tabcontent2.length; i++) {
    tabcontent2[i].style.display = "none";
  }
  tablinks2 = document.getElementsByClassName("tablinks2");
  for (i = 0; i < tablinks2.length; i++) {
    tablinks2[i].className = tablinks2[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
</body>

</html>