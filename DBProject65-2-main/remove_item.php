<?php
session_start();
// if(!empty($_SESSION['cart_item'])){
//     foreach($_SESSION['cart_item'] as $k => $v){
//       if($_GET['code'] == $k){
//         unset($_SESSION['cart_item'][$k]);
//       }
//       if(empty($_SESSION['cart_item'])){
//         unset($_SESSION['cart_item']);
//       }
//     }
//   }

if (isset($_POST['productId'])) {
    $productId = $_POST['productId'];
    if (isset($_SESSION['cart_item'][$productId])) {
        unset($_SESSION['cart_item'][$productId]);
        
        $response = array('success' => true);
    } else {
        $response = array('success' => false, 'message' => 'Product not found in cart');
    }
} else {
    $response = array('success' => false, 'message' => 'Invalid request');
}

header('Content-Type: application/json');
echo json_encode($response);
?>