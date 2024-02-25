<?php session_start() ?>
<!-- Header End====================================================================== -->
<?php require("connect.php") ?>
<title>DigitalDen</title>
<!-- BODY ====================================================================== -->

<?php $transid = $_GET['TransactionID'];
$sqlt = "SELECT * from transactions where TransactionID = '$transid' ";
    $resultt = mysqli_query($conn, $sqlt);
    $row = mysqli_fetch_array($resultt);
    ?>
<h1>
    <center>
        ชำระเงิน <br>
        Order ID : <?php echo $transid ?> <br>
        สินค้าจำนวน <?php echo  $row['Totalqty']; ?> ชิ้น <br>
        รวมราคา <?php echo $row['TotalPrice'] . ' ฿' ?><br>
        <br>
        เลขบัญชี 123456 หรือ สแกน<br>
</h1>
</center>
<div class="d-block w-50 rounded mx-auto">
    <center>
        <img src="img/yean.png" width="400px" height="400px">
</div>
</center>
<center>
    <label for="avatar">กรุณาใส่รูปหลักฐานการโอนเงิน</label>
    <form method="post">
        <input required type="file" id="avatar" name="avatar" accept="image/png, image/jpeg">
</center>


<center><button type="submit" name="submit">ตกลง</button></center>
</form>
<?php
if (isset($_POST["submit"])) {
    $sql = "UPDATE transactions
            SET Img = '" . $_POST['avatar'] . "' , status = 1
            WHERE transactionID = '" .$transid . "'";
    mysqli_query($conn, $sql);
    foreach ($_SESSION["cart_item"] as $item) {
        $sql2 = "UPDATE product SET Stock = Stock -'" . $item["quantity"] . "'
                WHERE productID = '" . $item["ProductID"] . "'";
            mysqli_query($conn, $sql2);
    }
    
    
    unset($_SESSION['cart_item']);
    header('Location:index.php');
}
?>


<!-- BODY End====================================================================== -->

<!-- Footer ================================================================== -->