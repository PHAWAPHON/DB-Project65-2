<!DOCTYPE html>
<html>
<?php include 'assets/headAdmin.php'; ?>
<?php
    include 'connect.php';
    $query = "SELECT * FROM customer";
    $result = mysqli_query($conn , $query);  //รับจากฟอร์มแล้วใส่ตาราง
?>
<div class="totaluser"><a>รายละเอียดผู้ใช้</a></div>
<div class="datauser">
<div class="create admin">
    <button onclick="document.location='admin_adduser.php'">Create</button>
</div>

    <table style="margin-left:20%">
        <thead>
            <tr>
                <th>ID ผู้ใช้</th>
                <th>username</th>
                <th>Password</th>
                <th>E-mail</th>
                <th>แก้ไข</th>
                <th>ลบ</th>
            </tr>
        </thead>
        <tbody>
                <ul>
                <?php foreach ($result as $row) {     ?>
                    <tr>
                        <td><?php echo $row['CustomerID']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['Password']; ?></td>
                        <td><?php echo $row['Email']; ?></td>
                        <td><a href="edituser.php?CustomerID=<?php echo $row['CustomerID']; ?>" style="font-size:13px">Edit</a></td>
                        <td><a href="deluser.php?CustomerID=<?php echo $row['CustomerID']; ?>" style="font-size:13px">Delete</a></td>
                    </tr>
                <?php  } ?>
                </ul>
        </tbody>
    </table>
</div>
</body>
</html>