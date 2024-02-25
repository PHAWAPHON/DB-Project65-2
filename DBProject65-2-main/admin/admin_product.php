<!DOCTYPE html>
<html>
<body>
<?php include 'assets/headAdmin.php'; ?>

<?php
    include 'connect.php';
    $query = "SELECT * FROM product join brands on product.BrandID = brands.BrandID group by ProductID";
    $result = mysqli_query($conn , $query);  //รับจากฟอร์มแล้วใส่ตาราง
?>

<div class="total"><a>รายการสินค้าทั้งหมด</a></div>
<div class="list">
    <table  style="margin-left: 15%">
        <caption></caption>
        <thead>
            <tr>
                <th>รูปสินค้า</th>
                <th>ชื่อสินค้า</th>
                <th>ID สินค้า</th>
                <th>แบนด์</th>
                <th>ประเภท</th>
                <th>ราคา</th>
                <th>จำนวนที่มี</th>
                <th>รายละเอียด</th>
            </tr>
        </thead>
        <tbody>
                <ul>
                <?php foreach ($result as $row) {     ?>
                    <tr>
                        <td><img src="../assets/images/products/<?php echo $row['Img']; ?>" height=100></td>
                        <td><?php echo $row['Name']; ?></td>
                        <td><?php echo $row['ProductID']; ?></td>
                        <td><?php echo $row['BrandName']; ?></td>
                        <td><?php echo $row['categoryID']; ?></td>
                        <td><?php echo number_format($row['Price'],2); ?></td>
                        <td><?php echo $row['Stock']; ?></td>
                        <td><?php echo $row['Description']; ?></td>
                    </tr>
                <?php  } ?>
                </ul>
        </tbody>
    </table>
</div>
<?php mysqli_close($conn) ?>
</body>
</html>