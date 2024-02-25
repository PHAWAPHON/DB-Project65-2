<?php 
    session_start();

  

    require_once("db_con.php");
    
    $user = new DB_con();

    $api = $_SERVER["REQUEST_METHOD"];


   
    if ($api == "POST") {
        $email = $user->test_input($_POST['email']);
        $username = $user->test_input($_POST['username']);
        $password = $user->test_input($_POST['password']);

        if ($user->registration($email, $username, $password)
            && !empty($_POST['email']) && !empty($_POST['username'])
            && !empty($_POST['password'])
        ) {
            echo $user->message("User added successfully", false);
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            // move to index
            header("location: index.php");
        } else {
            echo $user->message("Failed to add an user", true);
            header("location: register.php");
        }
    }


?>