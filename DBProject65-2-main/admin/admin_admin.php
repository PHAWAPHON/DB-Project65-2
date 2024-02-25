<!DOCTYPE html>
<html>
<?php include 'assets/headAdmin.php'; ?>
<?php
    include 'connect.php';
    $query = "SELECT * FROM admins";
    $result = mysqli_query($conn , $query);  //รับจากฟอร์มแล้วใส่ตาราง
?>
<div class="totaluser"><a>รายละเอียดแอดมิน</a></div>

<div class="datauser">
<div class="create admin">
    <button onclick="document.location='admin_addadmin.php'">Create</button>
</div>
    <table style="margin-left:20%">
        <thead>
            <tr>
                <th>ID แก้ไขแอดมิน</th>
                <th>username</th>
                <th>password</th>
                <th>แก้ไข</th>
                <th>ลบ</th>
            </tr>
        </thead>
        <tbody>
                <ul>
                <?php foreach ($result as $row) {     ?>
                    <tr>
                        <td><?php echo $row['AdminID']; ?></td>
                        <td><?php echo $row['AdminUser']; ?></td>
                        <td><?php echo $row['AdminPass']; ?></td>
                        <td><a href="editadmin.php?AdminID=<?php echo $row['AdminID']; ?>" style="font-size:13px">Edit</a></td>
                        <td><a href="deladmin.php?AdminID=<?php echo $row['AdminID']; ?>" style="font-size:13px">Delete</a></td>
                    </tr>
                <?php  } ?>
                </ul>
        </tbody>
    </table>
</div>
</body>
</html>