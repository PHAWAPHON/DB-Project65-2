<?php include 'assets/headAdmin.php'; ?>
<body>
	<?php
		include 'connect.php';
		$categoryID = $_GET['categoryID'];  //id ที่ส่งมาแก้ไข
		$query = "SELECT * FROM category WHERE categoryID='$categoryID'";
		$result = mysqli_query($conn , $query);
		$row = mysqli_fetch_array($result);
	?>
<div class="totalin"><a>แก้ไขหมวดหมู่สินค้า</a></div>
<form class="editcate" action="editcate2.php?categoryID=<?php echo $categoryID;?>" method="POST">
	<!-- action="addpd.php" method="PUT" -->
	<table style="margin-left: 40%">
			<tr>
				<td>
					<label>ชื่อหมวดหมู่</label> :
					<input type="text" name="Name" value="<?php echo $row['Name']?>">
					<br>
					<label>รหัสหมวดหมู่</label> :  <?php echo $row['categoryID']?>
					<br><br>
					<button type="submit" name="edit"> SAVE </a></button>
				</td>	
			</tr>	
		</table>
</form>