<?php

    // Product Delete
    if(isset($_POST['delete_btn']) && !empty($_POST['delete_btn'])){

        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        $product_id=$_POST['product_id'];

        $table_name='stock';
        $where=[
            'id'=>$product_id,
        ];
        $delete=delete_data($table_name,$where);

        if($delete){


            $_SESSION["success"] = true;
            $_SESSION["message"]  = 'Delete Success';
        }
    }
    // Generel User Delete
    if(isset($_POST['user_delete_btn']) && !empty($_POST['user_delete_btn'])){

        $user_id=$_POST['user_id'];

        $table_name='users';
        $where=[
            'id'=>$user_id,
        ];
        $delete=delete_data($table_name,$where);

        if($delete){
            $_SESSION["success"] = true;
            $_SESSION["message"]  = 'Delete Success';
        }
    }
    // Staff Delete
    if(isset($_POST['staff_delete_btn']) && !empty($_POST['staff_delete_btn'])){

        $user_id=$_POST['staff_id'];

        $table_name='users';
        $where=[
            'id'=>$user_id,
        ];
        $delete=delete_data($table_name,$where);

        if($delete){
            $_SESSION["success"] = true;
            $_SESSION["message"]  = 'Delete Success';
        }

    }
    










?>