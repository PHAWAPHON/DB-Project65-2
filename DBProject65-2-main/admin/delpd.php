
<?php
    include 'db_con2.php';
    $user = new DB_con();
    $productID = $_GET['ProductID'];
    $result = $user->delete($productID);
    header("location: admin_managepd.php");
?>
