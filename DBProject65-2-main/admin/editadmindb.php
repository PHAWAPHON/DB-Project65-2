<?php 

    require_once("db_con2.php");
    
    $user = new DB_con();

    $api = $_SERVER["REQUEST_METHOD"];

    if (isset($_POST['edit'])) {
        if($api == "POST") {
            $AdminID = $_GET['AdminID'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user->updateAdmin($AdminID,$username,$password);
            header("location: admin_admin.php");
        }
    }
    else {
        if ($api == "POST") {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $user->insertAdmin($username,$password);
                header("location: admin_admin.php");
        }
    }

?>