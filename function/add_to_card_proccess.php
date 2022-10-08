<?php

// If Order
if (isset($_POST['add_to_cart']) && !empty($_POST['add_to_cart'])) {
    if (isset($_SESSION['login_id'])) {

        $order_id       = $_POST['order_id'];
        $item_name      = $_POST["hidden_name"];
        $item_pricce    = $_POST['hidden_price'];
        $item_image    = $_POST['hidden_image'];
        $item_quantity  = 1;

        $_SESSION['order_id'] = $order_id;


        if (isset($_SESSION["shopping_cart"])) {

            $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");

            if (!in_array($_POST['order_id'], $item_array_id)) {
                $count = count($_SESSION["shopping_cart"]);
                $item_array = array(
                    'item_id'                   =>     $order_id,
                    'item_name'                 =>     $item_name,
                    'item_price'                =>     $item_pricce,
                    'item_image'                =>     $item_image,
                    'item_quantity'             =>     $item_quantity,
                );
                $_SESSION["shopping_cart"][$count] = $item_array;
            } else {
                echo '<script>alert("Item Already Added")</script>';
                echo '<script>window.location="shop.php"</script>';
            }
        } else {
            $item_array = array(
                'item_id'                   =>     $order_id,
                'item_name'                 =>     $item_name,
                'item_price'                =>     $item_pricce,
                'item_image'                =>     $item_image,
                'item_quantity'             =>     $item_quantity,
            );
            $_SESSION["shopping_cart"][0] = $item_array;
        }
    }else{
        header('Location:login.php');
        exit;
    }
}



// If Cancel Order
if (isset($_POST['order_cancel']) && !empty($_POST['order_cancel'])) {


    unset($_SESSION['order_id']);
    unset($_SESSION['shopping_cart']);
    header('Location:shop.php');
    exit;
}

// If Confirm Order
if (isset($_POST['confirm_order']) && !empty($_POST['confirm_order'])) {

    // print'<pre>';
    // print_r($_POST);
    // print'</pre>';

    // $user_id        =$_SESSION['login_id'];
    // $product_name   = $_POST[''];
    // $product_img    = $_POST[''];
    // $product_code   = $_POST[''];
    // $quantity       = $_POST[''];
    // $price          = $_POST[''];
    // $commission     = $_POST[''];
    // $total_price    = $_POST[''];
    // $color_code     = '#FF3333';
    // $order_status   = 'no_dalivered';
    // $order_no       = $_POST[''];
    // $order_date     = date("Y-m-d H:i:s");;   
    // $reciver_name   = $_POST['reciver_name'];
    // $reciver_contact= $_POST['reciver_contact'];
    // $reciver_address= $_POST['reciver_address'];




}
