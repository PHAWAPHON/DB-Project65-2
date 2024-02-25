<?php include 'assets/headAdmin.php'; ?>
<body>
<?php
    include 'connect.php';
    $query = "SELECT * FROM brands";
    $result = mysqli_query($conn , $query);
?>
<div class="totalin"><a>แบรนด์</a></div>
<form class="catepd" action="brand.php" method="POST">
    <ul>
	<table>
			<tr>
                <td>
                <a><b>แบรนด์ทั้งหมด</b></a><br>
                <?php foreach ($result as $row) {     ?>
                    [<?php echo $row['BrandID']; ?>]
                    <?php echo $row['BrandName']; ?><br>
                    <a href="editbrand.php?BrandID=<?php echo $row['BrandID']; ?>" style="font-size:15px">Edit</a>
                    <a>     </a>
					<a href="delbrand.php?BrandID=<?php echo $row['BrandID']; ?>" style="font-size:15px">Delete</a>
                    <br>
                <?php  } ?>
                </td>
				<td>
					<label>ชื่อแบรนด์</label><br>
					<input type="text" name="Name" placeholder="ชื่อแบรนด์">
					<br>
					<button type="submit"> Create </button>
				</td>	
			</tr>	
		</table>
    </ul>
</form>
</body>