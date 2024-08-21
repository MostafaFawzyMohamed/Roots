<?php
$cookie_name = "email";
$connect = mysqli_connect("localhost", "root", "","roots");
$query = "SELECT * FROM `advices`";
$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
?>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
        
        header {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
        }

        .tab-container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
        }

        .tab-content {
            display: none;
        }

        .detials {
            font-size: 16px;
            font-weight: normal;
			padding:25px;
            color: #021503;
			text-align:justify;
			line-height: 1.8;
            margin-bottom: 10px;
        }

        .tab-button {
            background-color:  #2a453c;
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            margin: 5px;
        }
    </style>
</head>
<body>
<?php 
if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
?>
<div class="tab-container">
        <button class="tab-button" onclick="openTab('<?php echo $row['A_id'] ;?>')"> <?php echo $row['A_title']; ?>:</button>
		
        <div id="<?php echo $row['A_id'] ; ?>" class="tab-content">
            <div class="qa">
                <div class="detials">
					<?php echo $row['A_details']; ?>
				</div>
			</div>
		</div>
</div>
<?php 
	} 
} 
?>

</body>
	<script>
        function openTab(tabName) {
            var i;
            var tabs = document.getElementsByClassName("tab-content");
            for (i = 0; i < tabs.length; i++) {
                tabs[i].style.display = "none";
            }
            document.getElementById(tabName).style.display = "block";
        }
</script>
</body>
</html>