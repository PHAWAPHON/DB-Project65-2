
<?php
    include 'db_con2.php';
    $user = new DB_con();
    $categoryID = $_GET['categoryID'];
    $result = $user->deleteCate($categoryID);
    header("location: admin_cate.php");
?>
