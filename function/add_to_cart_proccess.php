<?php

// If Order
if ((isset($_GET["process_type"]) && $_GET["process_type"] == "add_cart")) {


    session_start();
    include "database_management.php";
    if (isset($_SESSION['login_id'])) {
        // echo '<pre>';
        // print_r($_POST);
        // echo '</pre>';
   
        $status     = 'success';
        $redirect   = 'shop.php';
        $message    =print_r($_POST) ;



        // $item_id                = $_POST['item_id'];
        // $_SESSION['item_id']    = $item_id;

        // $table_name = 'stock';

        // $wheres     = [
        //     "id"      => $item_id,
        // ];

        // $item_data          = get_data($table_name, $wheres,);
        // $item_name          = $item_data->product_name;
        // $item_price         = $item_data->product_price;
        // $item_image         = $item_data->product_img;
        // $item_quantity      = 1;


        // $item_array = [];

        // if (!empty($item_array)) {

        //     $item_array_id = array_column($item_array, "item_id");

        //     if (!in_array($_POST['item_id'], $item_array_id)) {
        //         // $count = count($_SESSION["shopping_cart"]);
        //         $item_array = array(
        //             'item_id'                   =>     $item_id,
        //             'item_name'                 =>     $item_name,
        //             'item_price'                =>     $item_price,
        //             'item_image'                =>     $item_image,
        //             'item_quantity'             =>     $item_quantity,
        //         );
        //         $status     = 'success';
        //         $redirect   = 'shop.php';
        //         $message    = 'add Success';
        //     } else {
        //         $status     = 'error';
        //         $redirect   = 'shop.php';
        //         $message    = 'Item Already Added';
        //     }
        // } else {
        //     $item_array = array(
        //         'item_id'                   =>     $item_id,
        //         'item_name'                 =>     $item_name,
        //         'item_price'                =>     $item_price,
        //         'item_image'                =>     $item_image,
        //         'item_quantity'             =>     $item_quantity,
        //     );

        //     $status     = 'success';
        //     $redirect   = 'shop.php';
        //     $message    = 'add Success';
        // }
    } else {

        $status     = 'error';
        $redirect   = 'login.php';
        $message    = 'If you want to get service ! Please Login';
    }


    $response  = [
        'status'    => $status,
        'redirect'  => $redirect,
        'message'   => $message,

    ];

    echo json_encode($response);
    exit;
}



// If item remove
if ((isset($_GET["process_type"]) && $_GET["process_type"] == "item_remove")) {




    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
        if ($values["item_id"] == $_POST["remove_item_id"]) {
            unset($_SESSION["shopping_cart"][$keys]);
        }
    }
    $status = 'error';
    $redirect = 'shop.php';



    $response  = [
        'status'    => $status,
        'redirect'  => $redirect,
    ];

    echo json_encode($response);
    exit;
}

// If Cancel Order
if ((isset($_GET["process_type"]) && $_GET["process_type"] == "cancel_order")) {



    unset($_SESSION['item_id']);

    $status = 'error';
    $redirect = 'shop.php';

    $response  = [
        'status'    => $status,
        'redirect'  => $redirect,
    ];

    echo json_encode($response);
    exit;
}
