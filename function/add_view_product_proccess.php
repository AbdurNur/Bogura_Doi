<?php

    if(isset($_POST["add_stock"]) && !empty($_POST["add_stock"])){
   
               
                $product_sl    = $_POST["product_sl"];
                $product_name  = $_POST["product_name"];
                $quantity      = $_POST["quantity"];
                $dp            = $_POST["dp"];
                $product_price = $_POST["product_price"];
                $product_code  = $_POST["product_code"];
                $weight        = $_POST["weight"];
                $created_at    =  date("Y-m-d H:i:s");
                $created_by    = $_SESSION["login_user_type"];
                

            //  call function add data validation
            $add_data_validation =   Add_stock_validation();


            if($add_data_validation->status == "success"){
               

                $fileinfo = @getimagesize($_FILES["product_img"]["tmp_name"]);

    

                $width = $fileinfo[0];
                $height = $fileinfo[1];
               
                
                $allowed_image_extension = array(
                    "png",
                    "jpg",
                    "jpeg"
                );
                
                // Get image file extension
                $file_extension = pathinfo($_FILES["product_img"]["name"], PATHINFO_EXTENSION);
            
                // Validate file input to check if is not empty
                if (! file_exists($_FILES["product_img"]["tmp_name"])) {
                    $_SESSION["error"]    = true;
                    $_SESSION["message"]  = 'Choose image file to upload.';
                    
                } // Validate file input to check if is with valid extension
                else if (! in_array($file_extension, $allowed_image_extension)) {
                    $_SESSION["error"]    = true;
                    $_SESSION["message"]  = 'Upload valid images. Only PNG and JPEG are allowed.';
                  
                }    
                
                // Validate image file size
                else if (($_FILES["product_img"]["size"] > 5000000)) {
                    $_SESSION["error"]    = true;
                    $_SESSION["message"]  = 'Image size exceeds 5MB';
                    
                }    
                
                // Validate image file dimension
                else if ($width > "500" || $height > "500") {
                    $_SESSION["error"]    = true;
                    $_SESSION["message"]  = 'Image dimension should be within 500X500';

                } else {
                    $image_name=$_FILES["product_img"]["name"];

                    $target   = "../assets/images./". $image_name;
                    
                    if (move_uploaded_file($_FILES["product_img"]["tmp_name"], $target)) {
                        $table_name         = "stock";

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

                        $store_data =  store_data($table_name, $data);

                        if($store_data->status == "success"){
                            $_SESSION["success"] = true;
                            $_SESSION["message"]  = $store_data->message;
                        }else{
                            $_SESSION["error"]    = true;
                            $_SESSION["message"]  = $store_data->message;
                        }

                    } else {
                        $_SESSION["error"]    = true;
                        $_SESSION["message"]  = 'Problem in uploading image files';                    
                    }
                }          
            }else{
                $_SESSION["error"]   = true;
                $_SESSION["message"] = "Field not must be empty !";
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
                $response      = (object)[
                "status"       => "error",
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