<?php session_start();
unset( $_SESSION['login_status']);
unset( $_SESSION['login_id']);
unset( $_SESSION['login_user_type']);

    $message    =   "log out was successfull";

    $_SESSION['success']            =   'success';
    $_SESSION['message']    =   $message;

header("Location:index.php");
exit;





?>