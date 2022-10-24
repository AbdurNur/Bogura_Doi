<?php 


// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

if(isset($_POST["register"]) && !empty($_POST["register"])){
 

 $table = "users";
 $name              =  $_POST["name"];
 $email             =  $_POST["email"];
 $number            = $_POST["number"];
 $password          =  $_POST["password"];
 $address           =  $_POST["address"];
 $permanent_address =  $_POST["permanent_address"];
 $created_at        =  date("Y-m-d H:i:s");
 $user_type         = 4 ;

 $validation_data =  registration_validation();

   $data = [];

   if($validation_data->status == "success"){

        $data = [
    
            "name"              =>  $name,
            "email"             => $email,
            "number"            => $number,
            "password"          => $password,
            "address"           => $address,
            "parmanent_address" => $permanent_address,
            "created_at"        => $created_at,
            "user_type"         => $user_type
        ];
   }

   $store_data =  store_data($table, $data);
   


    if($store_data->status == "success"){
        $_SESSION["success"] = true;
        $_SESSION["message"]  = 'Registration Success';
    }else{
        $_SESSION["error"]    = true;
        $_SESSION["message"]  = 'Registration Faild !';
    }
 
}


function registration_validation(){
    global $password ;
    global $number ;
    global $email ;
    $error = false;
    $required     = " Is Required";

    if(empty($_POST["name"])){
        $error = true;
        $_SESSION["error_field"]["name"]     = "Name".$required;
    }else{
        $_SESSION['form_field']['name']        =   $_POST['name'];
    }
    

    if(empty($_POST["email"])){
        $error = true;
        $_SESSION["error_field"]["email"]     = "Email".$required;

    }else{
            $where=[
                'email'=>$email
            ];
            $cloum=['email'];
            $exist=get_data('users',$where,$cloum);

            if($exist){
                $error = true;
               $_SESSION["error_field"]["email"] = "This email is already exist try to another email !";
            }else{
                
                if (preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/",$email)) {  
                    $_SESSION['form_field']['email']        =   $email;
                  }
                  else{
                      $error = true;
                      $_SESSION["error_field"]["email"] = "Invalid email credantial !";
                  }
            }
       }

    if(empty($_POST["number"])){
        $error = true;
        $_SESSION["error_field"]["number"]  = "Number".$required;
    }else{

        if (preg_match("/^(?:\+88|88)?(01[3-9]\d{8})$/", $number)){
            $_SESSION['form_field']['password']     =   $_POST['password'];
        }else{
            
            $_SESSION["error_field"]["number"] = " THe number must be from Bangladeshi!";
        }  
    }

    if(empty($_POST["password"])){
        $error = true;
        $_SESSION["error_field"]["password"]  = "Password ".$required;
    }else{
        if(strlen(trim($password)) >= 8){

            $_SESSION['form_field']['password']     =   $_POST['password'];
        }else{
             $error = true;
            $_SESSION["error_field"]["password"] =   "password length must have 8 charecter";
        }    
    }

    if(empty($_POST["address"])){
        $error = true;
        $_SESSION["error_field"]["address"]  = "Address".$required;
    }else{
        $_SESSION['form_field']['address']     =   $_POST['address'];
    }

    if(empty($_POST["permanent_address"])){
        $error = true;
        $_SESSION["error_field"]["permanent_address"]  = "Permanent Address".$required;
    }else{
        $_SESSION['form_field']['permanent_address']     =   $_POST['permanent_address'];
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
