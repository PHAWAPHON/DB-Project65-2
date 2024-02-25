<?php 

    require_once("db_con2.php");
    
    

    $user = new DB_con();

    $api = $_SERVER["REQUEST_METHOD"];


    if (isset($_POST['edit'])) {
        if($api == "POST") {
            $productID = $_GET['productID'];
            $Name = $_POST['Name'];
            $BrandID = $_POST['BrandID'];
            $categoryID = $_POST['categoryID'];
            $Stock =$_POST['Stock'];
            $Price = $_POST['Price'];
            $Img = $_POST['Img'];
            $Description = $_POST['Description'];
            $user->updateProduct($Name,$BrandID,$categoryID,$Stock,$Price,$Img,$Description,$productID);
            header("location: admin_managepd.php");
        }
    }
    else {
        if ($api == "POST") {
                $Name = $_POST['Name'];
                $BrandID = $_POST['BrandID'];
                $categoryID = $_POST['categoryID'];
                $Stock =$_POST['Stock'];
                $Price = $_POST['Price'];
                $Img = $_POST['Img'];
                $Description = $_POST['Description'];
                $user->insertProduct($Name,$BrandID,$categoryID,$Stock,$Price,$Img,$Description);
                header("location: admin_managepd.php");
        }
    }

    // Add new data
    // if ($api == "POST") {
    //     $Name = $_POST['Name'];
    //     $BrandID = $_POST['BrandID'];
    //     $categoryID = $_POST['categoryID'];
    //     $Stock =$_POST['Stock'];
    //     $Price = $_POST['Price'];
    //     $Img = $_POST['Img'];
    //     $Description = $_POST['Description'];
    //     $user->insertProduct($Name,$BrandID,$categoryID,$Stock,$Price,$Img,$Description);
    //     header("location: admin_managepd.php");
    // }

    //update data
    //if ($api == "PUT") {
        // echo '<pre>';
        // print_r($_POST);
        // echo '</pre>';

        // echo '<pre>';
        // var_dump($_POST);
        // echo '</pre>';

        // $Name = $_POST['Name'];
        // $ProductID = $_POST['ProductID'];
        // $BrandID = $_POST['BrandID'];
        // $categoryID = $_POST['categoryID'];
        // $Stock =$_POST['Stock'];
        // $Price = $_POST['Price'];
        // $Img = $_POST['Img'];
        // if ($ProductID != null) {
        //     if ($user->updateProduct($Name,$ProductID,$BrandID,$categoryID,$Stock,$Price,$Img)) {
        //         echo "succes";
        //     } else {
        //         echo "failed";
        //     }
        // } else {
        //     echo "not found id";
        // }

        // parse_str(file_get_contents('php://input'), $post_input);

        // $Name = $post_input['Name'];
        // $ProductID = $post_input['ProductID'];
        // $BrandID = $post_input['BrandID'];
        // $categoryID = $post_input['categoryID'];
        // $Stock =$post_input['Stock'];
        // $Price = $post_input['Price'];
        // $Img = $post_input['Img'];
        // //$user->updateProduct($Name,$ProductID,$BrandID,$categoryID,$Stock,$Price,$Img);
        // //header("location: admin_managepd.php");
        // if ($ProductID != null) {
        //     if ($user->updateProduct($Name,$ProductID,$BrandID,$categoryID,$Stock,$Price,$Img)) {
        //         echo "succes";
        //     } else {
        //         echo "failed";
        //     }
        // } else {
        //     echo "not found id";
        // }
    //}

    // Update data
    // if ($api == 'PUT') {
    //     parse_str(file_get_contents('php://input'), $post_input);

    //     $email = $user->test_input($post_input['email']);
    //     $username = $user->test_input($post_input['username']);
    //     $password = $user->test_input($post_input['password']);

    //     if ($email != null) {
    //         if ($user->update($email, $username, $password)) {
    //             echo $user->message("User updated successfully", false);
    //         } else {
    //             echo $user->message("Failed to update and user", true);
    //         }
    //     } else {
    //         echo $user->message("User not found!", true);
    //     }
    // }

    // // Delete an user from database
    // if ($api == "DELETE") {
    //     if ($email != null) {
    //         if ($user->delete($email)) {
    //             echo $user->message("User deleted successfully", false);
    //         } else {
    //             echo $user->message("Failed to delete an user", true);
    //         }
    //     } else {
    //         echo $user->message("User not found!", true);
    //     }
    // }

?>