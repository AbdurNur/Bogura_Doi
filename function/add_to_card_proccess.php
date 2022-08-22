<?php
// If Order
if(isset($_POST['card'])&& !empty($_POST['card'])){
    
    $order_id=$_POST['order_id'];

    $_SESSION['order_id']=$order_id;
    
}

// If Cancel Order
if(isset($_POST['order_cancel'])&& !empty($_POST['order_cancel'])){
    
    
   unset($_SESSION['order_id']);
   header('Location:shop.php');
   exit;

   

}











?>