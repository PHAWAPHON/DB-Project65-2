<?php 


    require_once("db_con2.php");
    
    

    $user = new DB_con();

    $api = $_SERVER["REQUEST_METHOD"];

        if ($api == "POST") {
                $BrandName = $_POST['BrandName'];
                $BrandID = $_GET['BrandID'];
                $user->updateBrand($BrandName,$BrandID);
                header("location: admin_brand.php");
        }
