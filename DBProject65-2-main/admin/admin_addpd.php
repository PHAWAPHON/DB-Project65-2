<!DOCTYPE html>
<html>
<body>
<?php include 'assets/headAdmin.php'; ?>
<div class="totalin"><a>เพิ่มสินค้า</a></div>
<form class="addpd" action="addpd.php" method="POST">
    <ul>
        <table>
			<tr>
				<td>
					<label>ชื่อสินค้า</label><br>
					<input type="text" name="Name" placeholder="ชื่อสินค้า">
					<br>
					<label>รหัสแบรนด์</label><br>
					<input type="text"  name="BrandID" placeholder="รหัสแบรนด์">
					<br>
					<label>รหัสหมวดหมู่สินค้า</label><br>
					<input type="text"  name="categoryID" placeholder="ชื่อหมวดหมู่สินค้า">
					<br>
					<label>จำนวนสินค้า</label><br>
					<input type="text" name="Stock" placeholder="จำนวนวินค้า">
					<br>
					<label>ราคาสินค้า</label><br>
					<input type="text"  name="Price" placeholder="ราคา">
                    <br>
                    <label>รูปสินค้า</label><br>
					<input type="text"  name="Img" placeholder="ชื่อรูปภาพ">
					<br>
                    <label>คำอธิบายสินค้า</label><br>
					<input type="text"  name="Description" placeholder="คำอธิบาย">
					<br><br>
					<button type="submit"> Create </button>
				</td>	
			</tr>	
		</table>
    </ul>
</form>
</html>