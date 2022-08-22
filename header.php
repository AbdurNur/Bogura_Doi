<?php session_start();

date_default_timezone_set('Asia/Dhaka');
include "function/session_info.php";
include "function/utilitis.php";
include "function/crud.php";
include "function/login_process.php";
include "function/registration_process.php";
include "function/contact_process.php";
include "function/add_to_card_proccess.php";
include "function/settings.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo $_SESSION['tittle']; ?></title>
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="assets/images/<?php echo $_SESSION['icon'];?>">

    <!-- bootstrap_5 css -->
     <link rel="stylesheet" href="theme/plugins/bootstrap_5/bootstrap.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="theme/plugins/fontawesome-free-6.1.2-web1/css/all.min.css">
    <link rel="stylesheet" href="theme/plugins/fontawesome-free-6.1.2-web1/css/fontawesome.min.css">

    <!-- JQUERY UI -->
    <link rel="stylesheet" href="assets/vendor/jquery-ui/jquery-ui.css">

    <!-- custom css -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    
