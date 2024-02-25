<?php include 'assets/headAdmin.php'; ?>
<body>
	<?php
		include 'connect.php';
		$TransactionID = $_GET['TransactionID'];  //TransectionID ที่ส่งมา
		//echo $TransactionID;
		$query = "SELECT * FROM orderdetail JOIN transactions on orderdetail.TransactionID = transactions.TransactionID where Status = '1' and transactions.TransactionID='" . $TransactionID . "'";
		$result = mysqli_query($conn , $query);
		$row = mysqli_fetch_array($result);
	?>
<div class="totalin"><a>คำสั่งซื้อทั้งหมด</a></div>
<div class="saledetail">
	<table style="margin-left:25%; text-align:center; padding: 10px">
			<thead style="background-color: #bebebe">
				<tr>
					<th>หมายเลขใบเสร็จ</th>
					<th>รหัสผู้ใช้</th>
                    <th>รูปภาพใบเสร็จ</th>
					<th>เบอร์โทร</th>
					<th>ที่อยู่</th>
                    <th>วันที่สั่งซื้อ</th>
					<th>Status</th>
                    <th>ยืนยันการจ่ายเงิน</th>

				</tr>
			</thead>
			<tbody style="background-color: #eeeeee">
                <tr>
                    <td><?php echo $row['TransactionID']?></td>
                    <td><?php echo $row['CustomerID']?></td>
                    <td><img src="themes/images/products/<?php echo $row['Img']; ?>" height=30></td>
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
                    <td><a href="confirm.php?TransactionID=<?php echo $row['TransactionID']; ?>">ยืนยัน</a></td>
                </tr>
        	</tbody>	
		</table>
</div>		
</body>