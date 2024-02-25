
<?php
    include 'db_con2.php';
    $user = new DB_con();
    $TransactionID = $_GET['TransactionID'];
    
    $result = $user->confirm($TransactionID);
    header("location: admin_confirm.php");
?>
