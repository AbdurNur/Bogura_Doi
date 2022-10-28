<?php 

if(isset($_POST["Send"]) && !empty($_POST["Send"])){

    

 $table = "ask_question";
 $name              =  input_data_validation($_POST["name"]);
 $contact           =  input_data_validation($_POST["contact"]);
 $email             =  input_data_validation($_POST["email"]);

 $Question          =  input_data_validation($_POST['Question']);

 $created_at        =  date("Y-m-d H:i:s");


 $validation_data =  contact_validation();

   $data = [];

   if($validation_data->status == "success"){

        $data = [
            
            "name"              =>  $name,
            "contact"           => $contact,
            "email"             => $email,
            "discription"       => $Question,
            "created_at"        => $created_at,
            "replay_status"     => "not_success"

        ];
   }

   $store_data =  store_data($table, $data);
   


    if($store_data->status == "success"){
        $_SESSION["success"] = true;
        $_SESSION["message"]  = $store_data->message;
    }else{
        $_SESSION["error"]    = true;
        $_SESSION["message"]  = $store_data->message;
    }
 
}


function contact_validation(){
    global $contact;
    global $email ;
    $error = false;
    $required     = " Is Required";

    if(empty($_POST["name"])){
        $error = true;
        $_SESSION["error_field"]["name"]     = "Name".$required;
    }else{
        $_SESSION['form_field']['name']        =   $_POST['name'];
    }
    
    
    if(empty($_POST["contact"])){
        $error = true;
        $_SESSION["error_field"]["contact"]  = "Contact".$required;
    }else{

        if (preg_match("/^(?:\+88|88)?(01[3-9]\d{8})$/", $contact)){
            $_SESSION['form_field']['contact']     =   $_POST['contact'];
        }else{
            $_SESSION["error_field"]["contact"] = " THe number must be from Bangladeshi!";
        }  
    }

    
    if(empty($_POST["email"])){
        $error = true;
        $_SESSION["error_field"]["email"]     = "Email".$required;

    }else{
                if (preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/",$email)) {  
                    $_SESSION['form_field']['email']        =   $email;
                  }
                  else{
                      $error = true;
                      $_SESSION["error_field"]["email"] = "Invalid email credantial !";
                  } 
        }

    if(empty(input_data_validation($_POST['Question']))){
        $error = true;
        $_SESSION["error_field"]["Question"]  = "Question ".$required;
    }else{
        $_SESSION['form_field']['Question']     =   $_POST['Question'];
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
