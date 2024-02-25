
<?php
session_start();

require_once("db_con.php");

$user = new DB_con();

$api = $_SERVER["REQUEST_METHOD"];
if ($api == "POST") {
    $email = $user->test_input($_POST['email']);
    $password = $user->test_input($_POST['password']);

    $result = $user->singIn($email,$password);
    $num = mysqli_fetch_array($result); 
    if($num>0){
        $_SESSION['email'] = $num['email'];
    
        $_SESSION['password'] = $num['password'];
        $_SESSION['username'] = $_POST['email'];
        $_SESSION['email'] = $_POST['email'];
        header("location: index.php");
    }
    else{
        $result2 = $user->singIn_Admin($email, $password);
        $num2 = mysqli_fetch_array($result2);
        if($num2>0){
            $_SESSION['email'] = $num['email'];
            $_SESSION['password'] = $num['password'];
            header("location: admin");
        }
        else{
            header("location: login.php");
        }
    }
}


?>