<?php session_start();
if ($_SESSION['login_user_type'] == "4") {
    header("Location:index.php");
    unset($_SESSION['login_user_type']);
    unset($_SESSION['login_status']);
    unset($_SESSION['login_id']);

    unset($_SESSION['login_name']);
    unset($_SESSION['login_email']);
    unset($_SESSION['login_staff_id']);
    unset($_SESSION['login_user_img']);
    unset($_SESSION['item_id']);
    unset($_SESSION['shopping_cart']);
    exit;
}

if ($_SESSION['login_user_type'] == "1" || "2" || "3") {
    header('Location:dashbord/index.php');
    unset($_SESSION['login_user_type']);
    unset($_SESSION['login_status']);
    unset($_SESSION['login_id']);

    unset($_SESSION['login_name']);
    unset($_SESSION['login_email']);
    unset($_SESSION['login_staff_id']);
    unset($_SESSION['login_user_img']);


    unset($_SESSION['item_id']);
    unset($_SESSION['shopping_cart']);

    exit;
}

?>