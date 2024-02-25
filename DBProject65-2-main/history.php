<div class="container mt-5">

</div>
<?php


include("assets/headernav.php");

require_once('dbcontroller.php');
require_once('connect.php');
$db_handle = new DBController;

if (empty($_SESSION['username']) || empty($_SESSION['email'])) {
    header("Location:login.php");
}
$sqlt = "Select * from customer where Email = '" . $_SESSION['email'] . "'";
$result = mysqli_fetch_array(mysqli_query($conn, $sqlt));
$sql = "Select * from transactions where CustomerID = '" . $result['CustomerID'] . "'";

$pa = $db_handle->runQuery($sql);


?>

<div class="container ">
    <div class="row">

        <?php
        foreach ($pa as $row2) {
        ?>
            <div class="col-md-4">
                <?php if ($row2["Status"] == 2) { ?>
                    <div class="border border-success p-2 mb-2">
                    <a style="color:green">สำเร็จ</a><br>
                    <?php } else if ($row2["Status"] == 1) { ?>

                        <div class="border border-warning p-2 mb-2">
                            <a style="color:chocolate">รอการยืนยัน</a><br>
                        <?php } else {
                        ?>
                            <div class="border border-danger p-2 mb-2">

                                <a style="color:red"href="checkout.php?TransactionID=<?php echo $row2["TransactionID"]; ?>">จ่ายเงิน</a>
                                <br>



                            <?php } ?>
                            <?php echo "Order ID: " . $row2["TransactionID"]; ?><br>
                            <?php
                                $TransactionID = $row2["TransactionID"];
                                $query2 = "SELECT * FROM product JOIN orderdetail on product.ProductID = orderdetail.ProductID WHERE TransactionID = '$TransactionID'";
                                $result2 = mysqli_query($conn, $query2);

                                foreach ($result2 as $row) {
                                    echo "- ".$row['Name'] . " จำนวน ". $row['OrderQty'] ." ชิ้น ราคา " .  number_format($row['Total'],2) ." บาท";

                                  ?>  <br>
                             <?php   } ?>
                            
                            <?php echo "ราคาทั้งหมด ".number_format($row2["TotalPrice"], 2) . " บาท" ?><br>
                            <?php echo "วันที่ซื้อ ".$row2["OrderDate"]; ?><br>
                            </div>
                        </div>
                    <?php

                }
                    ?>
                    </div>
            </div>