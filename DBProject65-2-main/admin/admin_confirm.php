<!DOCTYPE html>
<html>
<?php include 'assets/headAdmin.php'; ?>

<?php
    include 'connect.php';
    $query = "SELECT * FROM orderdetail JOIN transactions on 
    orderdetail.TransactionID = transactions.TransactionID
     where Status = '1' group by transactions.TransactionID" ;
    $result = mysqli_query($conn , $query);
?>
<div class="totalsale"><a>คำสั่งซื้อทั้งหมดที่ยังไม่ได้ชำระเงิน</a></div>
<div class="tran">
    <table>
        <thead>
            <tr>
                <th>TransactionID</th>
                <th>รหัสผู้ใช้</th>
                <th>วันที่สั่งซื้อ</th>
                <th>ราคารวม</th>
                <th>สถานะ</th>
                <th>รายละเอียด</th>
       
            </tr>
        </thead>
        <tbody>
                <ul>
                <?php foreach ($result as $row) {     ?>
                    <tr>
                        <td><?php echo $row['TransactionID']; ?></td>
                        <td><?php echo $row['CustomerID']; ?></td>
                        <td><?php echo $row['OrderDate']; ?></td>
                        <td><?php echo number_format($row['TotalPrice'],2); ?></td>
                        <td><?php  if($row['Status'] == "1") {
									echo "waiting for confirm"; 
								}
								else if($row['Status'] == "0") {
								    echo "waiting for payment";
								}
                                else {
                                    echo "succeed";
                                } ?></td>
                        <td><a href="admin_confirm_detail.php?TransactionID=<?php echo $row['TransactionID']; ?>">ดู</a></td>
                      
                    </tr>
                <?php  } ?>
                </ul>
        </tbody>
    </table>
</div>
</body>
</html>