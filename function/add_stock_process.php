<?php

    if(isset($_POST["add_product"]) && !empty($_POST["add_product"])){
        
       


  

                
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        
            
                $table         = "stock";
              
                $product_name       = $_POST["product_name"];
                               
                $product_code       = $_POST["product_code"];                
                $updated_at         =  date("Y-m-d H:i:s");
                $updated_by         = $_SESSION["login_user_type"];
                                
                
                

                //  call function add data validation
                $add_data_validation =   Add_validation();
                
               
                

                if($add_data_validation->status == "success"){

                    $wherw=[
                        'product_name' =>  $product_name 
                    ];
                    $cloum=['product_name'];                    
    
                    $product_name=get_data($table,$wherw,$cloum);
                        
                        if($product_name){  

                             $where=[
                                'product_code'=>$product_code,
                            ];
                            $cloums=['quantity'];

                            $product_name_code=get_data($table,$where,$cloums);

                            if($product_name_code){


                                
                                    $quantity           = $product_name_code->quantity; 
                                    $old_quantity           = $_POST["quantity"]; 
                                    $new_quantity          =$old_quantity+ $quantity;
                                    if($new_quantity){
                                        $where=[
                                            'product_code'=>$product_code,
                                        ];

                                        $values=[
                                            'quantity'=>$new_quantity
                                        
                                        
                                        ];

                                        $update=update_data($table,$values,$where);

                                        if($update){
                                            $_SESSION["success"]    = true;
                                            $_SESSION["message"]  = 'Product Quantity Add Success';

                                        }
                                    }
                            }else{
                                $_SESSION["error"]    = true;
                                $_SESSION["message"]  = 'Product Code is Invalid';
                            }
                        }else{
                            $_SESSION["error"]    = true;
                            $_SESSION["message"]  = 'Product Name is Invalid';

                        }                        
                }              
    }


        // create a function for add product data validation
        function Add_validation(){
            
            $error = false;
            $required     = " Is Required";
            

            if(empty($_POST["product_name"])){
                $error = true;
                $_SESSION["error_field"]["product_name"]     = "Product Name".$required;
            }else{
                $_SESSION['form_field']['product_name']        =   $_POST['product_name'];
            }
            if(empty($_POST["quantity"])){
                $error = true;
                $_SESSION["error_field"]["quantity"]     = "Quantity ".$required;
            }else{
                $_SESSION['form_field']['quantity']        =   $_POST['quantity'];
            }
                      
            if(empty($_POST["product_code"])){
                $error = true;
                $_SESSION["error_field"]["product_code"]     = "Product Code".$required;
            }else{
                $_SESSION['form_field']['product_code']        =   $_POST['product_code'];
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