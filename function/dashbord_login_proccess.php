<?php



    if(isset($_POST['dashbord_login_btn']) && !empty($_POST['dashbord_login_btn'])){
        // input_validation
        $email      =  input_data_validation($_POST['email']);
        $password   =  input_data_validation($_POST['password']);

        
       
        
        // input_field_validation
        $validate_response   = input_field_validation();

        if( $validate_response->status == "error"){

            $_SESSION["error"]    = true;
            $_SESSION["message"]  = $validate_response->message;
            $_SESSION["data"]     = $validate_response->data;
        
        }

        if($validate_response->status == "success"){
            $where=[
                'email'=>$email,
            ];
            $cloum=['email'];
            $login_email=get_data('users',$where,$cloum);
            
            
            if($login_email){
                $where=[
                    'password'=>$password,
                    'email'=>$login_email->email,
                    
                ];
                $cloum=['password','email'];

                $login_password=get_data('users',$where,$cloum);

                if(isset($login_password)){
                    $where=[
                        'email'=>$login_password->email,
                    ];
                    $cloum=['password','id','name','email','image','staff_id','user_type',];
    
                    $login_data=get_data('users',$where,$cloum);
                    if($login_data){


                        $is_login_error         = false;
                        // $message                =   "Login was successfull";
                        // $_SESSION['success']    =   'success';
                        // $_SESSION['message']    =   $message;
    
                        $_SESSION['login_user_type']    =$login_data->user_type;
                       
                    
                    }else{
                        $is_login_error         = true;
                        $message                =   "Password not matched!";
                
                        $_SESSION['error']      =   'error';
                        $_SESSION['message']    =   $message;
                    }
                }
               
            }else{
                $is_login_error         = true;
                $message                =   "Email not found";
                $_SESSION['error']      =   'error';
                $_SESSION['message']    =   $message;
            }

            if($is_login_error==false){               
                if($_SESSION['login_user_type']== "4"){
                    header('Location:../login.php');                    
                    exit;
                }
                
                if($_SESSION['login_user_type']== "1"||"2"||"3"){
                                  
                    $_SESSION['login_status'] =1;                       
                    $_SESSION['login_id']           =$login_data->id;
                    $_SESSION['login_name']         =$login_data->name;
                    $_SESSION['login_email']        =$login_data->email;
                    $_SESSION['login_staff_id']     =$login_data->staff_id;                       
                    $_SESSION['login_user_img']     =$login_data->image;
                    header('Location:dasbord.php');
                    exit;
                }
                
            }elseif($is_login_error==true){
                header('Location:index.php');
                exit;
               
            }
        } 
    }

    
    // input_field_validation
    function input_field_validation(){
        $has_error    = false;
        $error_data   =  [];
        $required     = "is required";

        
        if(empty($_POST["email"])){
            $has_error   = true;
            $error_data["error_field"]["email"]     = "Email".$required;
        }else{
            $_SESSION['form_field']['email']        =   $_POST['email'];
        }
       
        if(empty($_POST["password"])){
            $has_error   = true;
            $error_data["error_field"]["password"]  = "Password".$required;
        }else{
            $_SESSION['form_field']['password']     =   $_POST['password'];
        }
      
        if($has_error){
            $response     = (object)[
               "status"   => "error",
               "message"  => "please fill-up all required data",
               "data"     => $error_data,
            ];   
        }else{
           $response  = (object)[
            "status"  => "success",
            "message" => "no error",
           ];
        }

        return $response;
    }
