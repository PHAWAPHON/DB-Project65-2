<?php
session_start();
require("connect.php");

$cusName = $_POST['cus_name'];
$sqlt="Select * from customer where Email = '" . $_SESSION['email'] . "'";
$result = mysqli_fetch_array(mysqli_query($conn,$sqlt));

$cusAddress = $_POST['cus_add'];
$cusTel = $_POST['cus_tel'];
$sql = "INSERT INTO transactions (CustomerID,Name,Totalqty,OrderDate, Address, Telephone, TotalPrice, Status)
    VALUES ( '" . $result['CustomerID'] . "', '$cusName'
    ,'" . $_SESSION['total_quantity'] . "',(CURRENT_TIMESTAMP),'$cusAddress'
    , '$cusTel', '" . $_SESSION['total_price'] . "', '0')";
mysqli_query($conn, $sql);

$orderID  = mysqli_insert_id($conn);
foreach ($_SESSION["cart_item"] as $item) {
    $sql1 = "SELECT * FROM product WHERE productId ='" . $item["ProductID"] . "'";
    $result1 = mysqli_query($conn, $sql1);
    $price = $item['price'];
    $total = $item['quantity'] * $item['price'];
    $sql2 = "INSERT INTO orderdetail (transactionID, ProductID, orderQty, Total)
        VALUES ('$orderID', '" . $item["ProductID"] . "', '" . $item["quantity"] . "', '$total')";
    mysqli_query($conn, $sql2);
    
}

header('Location:checkout.php?TransactionID='.$orderID);

