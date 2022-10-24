<?php

// If Order
if ((isset($_GET["process_type"]) && $_GET["process_type"] == "repley")) {
    
    include "database_management.php";

    // echo '<pre>';
    // print_r($_GET);
    // echo '</pre>';
    // exit;


        $status     = 'success';
        $redirect   = 'login.php';
        $message    = 'If you want to get service ! Please Login';



    $response  = [
        'status'    => $status,
        'redirect'  => $redirect,
        'message'   => $message,

    ];

    echo json_encode($response);
    exit;
}
