<?php

    if(isset($_POST["add_stock"]) && !empty($_POST["add_stock"])){
   
                $table         = "stock";
                $product_sl    = $_POST["product_sl"];
                $product_name  = $_POST["product_name"];
                $quantity      = $_POST["quantity"];
                $dp            = $_POST["dp"];
                $product_price = $_POST["product_price"];
                $product_code  = $_POST["product_code"];
                $weight        = $_POST["weight"];


                $image_name      = $_FILES["product_img"]["name"];
                $tmp_name=$_FILES["product_img"]['tmp_name'];
                $destination   = "../assets/images./". $image_name;
                $upload=move_uploaded_file($tmp_name,$destination);



                $created_at    =  date("Y-m-d H:i:s");
                $created_by    = $_SESSION["login_user_type"];
                

            //  call function add data validation
              $add_data_validation =   Add_stock_validation();

            if($add_data_validation->status == "success"){
                $data = [
                    "product_sl"    => $product_sl,
                    "product_name"  => $product_name,
                    "quantity"      => $quantity,
                    "dp"            => $dp,
                    "product_price" => $product_price,
                    "product_code"  => $product_code,
                    "weight"        => $weight,
                    "product_img"   => $image_name,
                    "created_at"   => $created_at,
                    "created_by"   => $created_by
                ];

                if($upload){
                    $store_data =  store_data($table, $data);

                    if($store_data->status == "success"){
                        $_SESSION["success"] = true;
                        $_SESSION["message"]  = $store_data->message;
                    }else{
                        $_SESSION["error"]    = true;
                        $_SESSION["message"]  = $store_data->message;
                    }
                }

            }
                
        
    }
              


    // create a function for add product data validation
        function Add_stock_validation(){
            $error = false;
            $required     = " Is Required";
            

            if(empty($_POST["product_sl"])){
                $error = true;
                $_SESSION["error_field"]["product_sl"]     = "product sl".$required;
            }else{
                $_SESSION['form_field']['product_sl']        =   $_POST['product_sl'];
            }

            if(empty($_POST["product_name"])){
                $error = true;
                $_SESSION["error_field"]["product_name"]     = "Product Name".$required;
            }else{
                $_SESSION['form_field']['product_name']        =   $_POST['product_name'];
            }

            if(empty($_POST["quantity"])){
                $error = true;
                $_SESSION["error_field"]["quantity"]     = "Quantity".$required;
            }else{
                $_SESSION['form_field']['quantity']        =   $_POST['quantity'];
            }


            if(empty($_POST["dp"])){
                $error = true;
                $_SESSION["error_field"]["dp"]     = "DP".$required;
            }else{
                $_SESSION['form_field']['dp']        =   $_POST['dp'];
            }

            if(empty($_POST["product_price"])){
                $error = true;
                $_SESSION["error_field"]["product_price"]     = "Product Price".$required;
            }else{
                $_SESSION['form_field']['product_price']        =   $_POST['product_price'];
            }

            if(empty($_POST["product_code"])){
                $error = true;
                $_SESSION["error_field"]["product_code"]     = "Product Code".$required;
            }else{
                $_SESSION['form_field']['product_code']        =   $_POST['product_code'];
            }

            if(empty($_POST["weight"])){
                $error = true;
                $_SESSION["error_field"]["weight"]     = "Weight".$required;
            }else{
                $_SESSION['form_field']['weight']        =   $_POST['weight'];
            }

            if(empty($_FILES["product_img"]["name"])){
                $error = true;
                $_SESSION["error_field"]["name"]     = "Product Img".$required;
            }else{
                $_SESSION['form_field']['name']        =   $_FILES["product_img"]['name'];
            }
 
            if($error){
                $response     = (object)[
                "status"   => "error",
                ];   

                return $response;
            }else{
                $response     = (object)[
                    "status"   => "success",
                ];

                return $response;
            }

        } 

?>