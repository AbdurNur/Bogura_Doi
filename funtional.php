<?php
if (isset($_POST["upload"])) {
    // Get Image Dimension
    $fileinfo = @getimagesize($_FILES["file-input"]["tmp_name"]);
    $width = $fileinfo[0];
    $height = $fileinfo[1];
    
    $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
    );
    // Get image file extension
    $file_extension = pathinfo($_FILES["file-input"]["name"], PATHINFO_EXTENSION);

   $validation_required = Validation_required();
   
   if($validation_required == $response["success"]){
         
   }else{

   }
  
   }

  
  function Validation_required(){
      $error = false ;
      global $width;
      global $height;
      global $file_extension;
      global $allowed_image_extension;
    if (! file_exists($_FILES["file-input"]["tmp_name"])) {
                $error = true ;
                $response = array(
                    "type" => "error",
                    "message" => "Choose image file to upload."
                );
            }    // Validate file input to check if is with valid extension
            else if (! in_array($file_extension, $allowed_image_extension)) {
                $error = true ;
                $response = array(
                    "type" => "error",
                    "message" => "Upload valid images. Only PNG and JPEG are allowed."
                );
            }    // Validate image file size
            else if (($_FILES["file-input"]["size"] > 2000000)) {
                $error = true ;
                $response = array(
                    "type" => "error",
                    "message" => "Image size exceeds 2MB"
                );
            }    // Validate image file dimension
            else if ($width > "300" || $height > "200") {
                $error = true ;
                $response = array(
                    "type" => "error",
                    "message" => "Image dimension should be within 300X200"
                );
            } else {
                $target = "image/" . basename($_FILES["file-input"]["name"]);
                if (move_uploaded_file($_FILES["file-input"]["tmp_name"], $target)) {
                    $response = array(
                        "type" => "success",
                        "message" => "Image uploaded successfully."
                    );
                } else {
                    $error = true ;
                    $response = array(
                        "type" => "error",
                        "message" => "Problem in uploading image files."
                    );
                }
            }

        if($error){
            return $response;
        }else{
            return $response;
        }

    }



        
?>