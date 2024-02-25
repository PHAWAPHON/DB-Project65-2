<?php include 'assets/headAdmin.php'; ?>
<body>
	<?php
		include 'connect.php';
		$TransactionID = $_GET['TransactionID'];  //TransectionID ที่ส่งมา
		//echo $TransactionID;
		$query = "SELECT * FROM transactions WHERE TransactionID='$TransactionID'";
		$result = mysqli_query($conn , $query);
		$row = mysqli_fetch_array($result);
		$query2 = "SELECT * FROM product JOIN orderdetail on product.ProductID = orderdetail.ProductID WHERE TransactionID = '$TransactionID'";
		$result2 = mysqli_query($conn , $query2);
	?>
<div class="totalin"><a>รายละเอียดคำสั่งซื้อ</a></div>
<div class="saledetail">
	<table style="margin-left:25%; text-align:center; padding: 10px">
			<thead style="background-color: #bebebe">
				<tr>
					<th>หมายเลขใบเสร็จ</th>
					<th>สินค้าที่ซื้อ</th>
					<th>รหัสผู้ใช้</th>
					<th>ชื่อผู้รับ</th>
					<th>เบอร์โทร</th>
					<th>ที่อยู่</th>
					<th>วันที่สั่งซื้อ</th>
					<th>สถานะ</th>
				</tr>
			</thead>
			<tbody style="background-color: #eeeeee">
                <tr>
                    <td><?php echo $row['TransactionID']?></td>
					<td><?php 
						foreach ($result2 as $roww) {
							echo $roww['Name']; ?><br>
						<?php } ?></td>
					<td><?php echo $row['CustomerID']?></td>
					<td><?php echo $row['Name']?></td>
                    <td><?php echo $row['Telephone']; ?></td>
                    <td><?php echo $row['Address']; ?></td>
                    <td><?php echo $row['OrderDate']; ?></td>
					<td><?php  if($row['Status'] == "1") {
									echo "waiting for confirm"; 
								}
								else if($row['Status'] == "0") {
								    echo "waiting for payment";
								}
                                else {
                                    echo "succeed";
                                } ?></td>
                </tr>
        	</tbody>	
		</table>
</div>		
</body>