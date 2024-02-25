<?php include 'assets/headAdmin.php'; ?>
<body>
<?php
    include 'connect.php';
    $query = "SELECT * FROM category";
    $result = mysqli_query($conn , $query);
?>
<div class="totalin"><a>หมวดหมู่สินค้า</a></div>
<form class="catepd" action="cate.php" method="POST">
    <ul>
	<table>
			<tr>
                <td>
                <a><b>หมวดหมู่สินค้าทั้งหมด</b></a><br>
                <?php foreach ($result as $row) {     ?>
                    [<?php echo $row['categoryID']; ?>]
                    <?php echo $row['Name']; ?><br>
                    <a href="editcate.php?categoryID=<?php echo $row['categoryID']; ?>" style="font-size:15px">Edit</a>
                    <a>     </a>
					<a href="delcate.php?categoryID=<?php echo $row['categoryID']; ?>" style="font-size:15px">Delete</a>
                    <br>
                <?php  } ?>
                </td>
				<td>
					<label>ชื่อหมวดหมู่</label><br>
					<input type="text" name="Name" placeholder="ชื่อหมวดหมู่">
					<br>
					<button type="submit"> Create </button>
				</td>	
			</tr>	
		</table>
    </ul>
</form>
</body>