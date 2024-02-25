
<?php
    include 'db_con2.php';
    $user = new DB_con();
    //$CustomerID = $_GET['CustomerID'];
    //echo $CustomerID;
    $result = $user->deleteUser($_GET['CustomerID']);
    header("location: admin_user.php");
?>