<?php include 'assets/headAdmin.php'; ?>
<body>
	<?php
		include 'connect.php';
		$BrandID = $_GET['BrandID'];  //id ที่ส่งมาแก้ไข
		$query = "SELECT * FROM brands WHERE BrandID='$BrandID'";
		$result = mysqli_query($conn , $query);
		$row = mysqli_fetch_array($result);
	?>
<div class="totalin"><a>แก้ไขแบรนด์</a></div>
<form class="editcate" action="editbrand2.php?BrandID=<?php echo $BrandID;?>" method="POST">
	<!-- action="addpd.php" method="PUT" -->
	<table style="margin-left: 40%">
			<tr>
				<td>
					<label>ชื่อแบรนด์</label> :
					<input type="text" name="BrandName" value="<?php echo $row['BrandName']?>">
					<br>
					<label>รหัสแบรนด์</label> :  <?php echo $row['BrandID']?>
					<br><br>
					<button type="submit" name="edit"> SAVE </a></button>
				</td>	
			</tr>	
		</table>
</form>