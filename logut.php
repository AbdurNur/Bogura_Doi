<?php session_start();
unset( $_SESSION['login_status']);
unset( $_SESSION['login_id']);
unset( $_SESSION['login_user_type']);
unset($_SESSION['order_id']);
unset($_SESSION['order_id']);

   

header("Location:index.php");
exit;





?>