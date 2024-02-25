
<?php
    include 'db_con2.php';
    $user = new DB_con();
    //$CustomerID = $_GET['CustomerID'];
    //echo $CustomerID;
    $result = $user->deleteTrans($_GET['TransactionID']);
    header("location: admin_transaction.php");
?>