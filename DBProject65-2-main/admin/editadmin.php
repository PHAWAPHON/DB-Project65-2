<?php include 'assets/headAdmin.php'; ?>
<body>
	<?php
		include 'connect.php';
        $AdminID = $_GET['AdminID'];
		$query = "SELECT * FROM  admins WHERE AdminID='$AdminID'";
		$result = mysqli_query($conn , $query);
		$row = mysqli_fetch_array($result);

	?>
<div class="totalin"><a>แก้ไขแอดมิน</a></div>
<form class="editadmin" action="editadmindb.php?AdminID=<?php echo $AdminID?>" method="POST">
	<!-- action="addpd.php" method="PUT" -->
	<table style="margin-left:40%">
			<tr>
				
				<td>
					<label>ชื่อผู้ใช้</label><br>
					<input type="text" name="username" value="<?php echo $row['AdminUser']?>">
					<br>
					<label>รหัสผ่าน</label><br>
					<input type="text" name="password" value="<?php echo $row['AdminPass']?>">
					<br>
					<button type="submit" name="edit"> SAVE </a></button>
				</td>	
			</tr>	
		</table>
</form>
</body>