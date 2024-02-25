<?php 


    require_once("db_con2.php");

    $user = new DB_con();
    $api = $_SERVER["REQUEST_METHOD"];

    if ($api == "POST") {
        $Name = $_POST['Name'];
        $user->insertBrand($Name);
        header("location: admin_brand.php");
    }

    
?>