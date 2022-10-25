<?php session_start();
unset( $_SESSION['login_status']);
unset( $_SESSION['login_id']);
unset( $_SESSION['login_user_type']);
unset( $_SESSION['login_name']);
unset( $_SESSION['login_email']);
unset( $_SESSION['login_staff_id']);
unset( $_SESSION['login_user_img']);


unset($_SESSION['item_id']);
unset($_SESSION['shopping_cart']);

                       
                       
header("Location:index.php");
exit;





?>