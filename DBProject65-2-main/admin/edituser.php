<?php include 'assets/headAdmin.php'; ?>
<body>
	<?php
		include 'connect.php';
        $CustomerID = $_GET['CustomerID'];
		$query = "SELECT * FROM customer WHERE CustomerID='$CustomerID'";
		$result = mysqli_query($conn , $query);
		$row = mysqli_fetch_array($result);

	?>
<div class="totalin"><a>แก้ไขผู้ใช้</a></div>
<form class="edituser" action="edituserdb.php?CustomerID=<?php echo $CustomerID ?>" method="POST">
	<!-- action="addpd.php" method="PUT" -->
	<table style="margin-left:40%">
			<tr>
				
				<td>
					<label>ชื่อผู้ใช้</label><br>
					<input type="text" name="username" value="<?php echo $row['username']?>">
					<br>
					<label>รหัสผ่าน</label><br>
					<input type="text" name="password" value="<?php echo $row['Password']?>">
					<br>
					<label>อีเมล</label><br>
					<input type="text" name="email" value="<?php echo $row['Email']?>">
					<br>
					
					<button type="submit" name="edit"> SAVE </a></button>
				</td>	
			</tr>	
		</table>
</form>
</body>