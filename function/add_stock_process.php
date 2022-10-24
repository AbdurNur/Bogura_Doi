<?php

if (isset($_POST["add_product"]) && !empty($_POST["add_product"])) {
    // print'<pre>';
    // print_r($_POST);
    // print'</pre>';
    // exit;

    $table_name         = "stock";
    $updated_at         =  date("Y-m-d H:i:s");
    $updated_by         = $_SESSION["login_user_type"];
    $product_name       = $_POST['product_name'];
    $product_quantity   = $_POST['quantity'];




    //  call function add data validation
    $add_data_validation =   Add_validation();


    if ($add_data_validation->status == "success") {
        $where = [
            'product_name' => $product_name
        ];
        $columns = ['quantity'];

        $quantity = get_data($table_name, $where, $columns);
       
        $total_quantity = ($quantity->quantity + $product_quantity);
        // print'<pre>';
        // print_r($total_quantity);
        // print'</pre>';
        // exit;


        $update_data = [
            'quantity' => $total_quantity,
            'updated_at' => $updated_at,
            'updated_by' => $updated_by,
        ];

        $update = update_data($table_name, $update_data, $where);
        if ($update) {
            $_SESSION["success"] = true;
            $_SESSION["message"]  = 'Stock Updated';
        }
    } else {
        $_SESSION["error"]   = true;
        $_SESSION["message"] = "Field not must be empty !";
    }
}


// create a function for add product data validation
function Add_validation()
{

    $error = false;
    $required     = " Is Required";



    if (empty($_POST["product_name"])) {
        $error = true;
        $_SESSION["error_field"]["product_name"]     = "Product Name " . $required;
    } else {
        $_SESSION['form_field']['product_name']        =   $_POST['product_name'];
    }
    if (empty($_POST["quantity"])) {
        $error = true;
        $_SESSION["error_field"]["quantity"]     = "Quantity " . $required;
    } else {
        $_SESSION['form_field']['quantity']        =   $_POST['quantity'];
    }



    if ($error) {
        $response     = (object)[
            "status"   => "error",
        ];

        return $response;
    } else {
        $response     = (object)[
            "status"   => "success",
        ];

        return $response;
    }
}
