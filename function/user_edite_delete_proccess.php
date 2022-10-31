<?php

// User Delete Section Start
if (isset($_GET["process_type"]) && $_GET["process_type"] == "delete_user_id") {
    include "database_management.php";

    $delete_user_id = $_POST['delete_user_id'];

    $table_name = 'users';
    $where = [
        'id' => $delete_user_id,
    ];

    $delete = delete_data($table_name, $where);
    if ($delete) {

        // default:
        $status = 'success';
        $message = "<div class='alert alert-success'>Delete has been successfully completed</div>";
    } else {
        $status = 'error';
        $message = "<div class='alert alert-danger'>Please fix the error!</div>";
    }
    // response section

    $response  = [
        'status' => $status,
        'message' => $message,


    ];

    echo json_encode($response);
    exit;
}
// User Delete Section End
