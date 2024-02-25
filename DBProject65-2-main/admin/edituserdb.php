<?php 


    require_once("db_con2.php");
    
    $user = new DB_con();

    $api = $_SERVER["REQUEST_METHOD"];

    if (isset($_POST['edit'])) {
        if($api == "POST") {
            $CustomerID = $_GET['CustomerID'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $user->updateUser($CustomerID,$username,$password,$email);
            header("location: admin_user.php");
        }
    }
    else {
        if ($api == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $user->insertUser($username,$password,$email);
            header("location: admin_user.php");
    }
    }

?>