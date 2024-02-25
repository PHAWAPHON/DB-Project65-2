<?php include 'assets/headAdmin.php'; ?>
<body>
	<?php
	
		include 'connect.php';
		$productID = $_GET['ProductID'];  //id ที่ส่งมาแก้ไข
		$query = "SELECT * FROM product WHERE ProductID='$productID'";
		$result = mysqli_query($conn , $query);
		$row = mysqli_fetch_array($result);

		$query2 = "SELECT category.Name FROM category JOIN product on category.categoryID = product.categoryID where productID = '$productID'";
		$result2 = mysqli_query($conn , $query2);
		$row2 = mysqli_fetch_array($result2);
	?>
<div class="totalin"><a>แก้ไขสินค้า</a></div>
<form class="editpd" action="addpd.php?productID=<?php echo $productID?>" method="POST">
	<!-- action="addpd.php" method="PUT" -->
	<table>
			<tr>
				<td><img src="assets/images/products/<?php echo $row['Img']; ?>" height=250></td>
				<td>
					<label>ชื่อสินค้า</label><br>
					<input type="text" name="Name" value="<?php echo $row['Name']?>">
					<br>
					<label>รหัสแบรนด์</label><br>
					<input type="text" name="BrandID" value="<?php echo $row['BrandID']?>">
					<br>
					<label>รหัสหมวดหมู่สินค้า</label><br>
					<input type="text" name="categoryID" value="<?php echo $row['categoryID']?>">
					<br>
					<label>จำนวนสินค้า</label><br>
					<input type="text" name="Stock" value="<?php echo $row['Stock']?>">
					<br>
					<label>ราคาสินค้า</label><br>
					<input type="text" name="Price" value="<?php echo $row['Price']?>">
					<br>
					<label>รูปภาพสินค้า</label><br>
					<input type="text" name="Img" value="<?php echo $row['Img']?>">
					<br>
					<label>คำอธิบาย</label><br>
					<input type="text" name="Description" value="<?php echo $row['Description']?>">
					<br><br>
					<button type="submit" name="edit"> SAVE </a></button>
				</td>	
			</tr>	
		</table>
</form>
</body>