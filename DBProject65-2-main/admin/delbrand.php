
<?php
    include 'db_con2.php';
    $user = new DB_con();
    $BrandID = $_GET['BrandID'];
    $result = $user->deleteBrand($BrandID);
    header("location: admin_brand.php");
?>
