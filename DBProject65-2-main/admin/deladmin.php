
<?php
    include 'db_con2.php';
    $user = new DB_con();
    //$CustomerID = $_GET['CustomerID'];
    //echo $CustomerID;
    $result = $user->deleteAdmin($_GET['AdminID']);
    header("location: admin_admin.php");
?>