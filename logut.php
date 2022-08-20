<?php session_start();
unset( $_SESSION['login_status']);
unset( $_SESSION['login_id']);
unset( $_SESSION['login_user_type']);

   

header("Location:index.php");
exit;





?>