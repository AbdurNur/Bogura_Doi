<?php session_start();
date_default_timezone_set('Asia/Dhaka');
// if (!isset($_SESSION['login_status'])) {

//   $message                      =   "Unauthorised access!";

//   $_SESSION['error']            =   'error';
//   $_SESSION['message']          =   $message;
//   // header("Location:index.php");
//   
//   exit;
// }
include '../function/session_info.php';
include '../function/utilitis.php';
include '../function/database_management.php';
include "../function/settings.php";
include "../function/dashbord_login_proccess.php";
include "../function/add_view_product_proccess.php";
include "../function/add_stock_process.php";
include "../function/registration_process.php";




?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title> <?php echo $_SESSION['tittle']; ?></title>
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="../assets/images/<?php echo $_SESSION['icon'];  ?>">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!-- Font Awesome cdn -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="theme/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

  <!-- bootstrap_5 css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- iCheck -->
  <link rel="stylesheet" href="theme/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="theme/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="theme/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="theme/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="theme/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="theme/plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="theme/plugins/datatables/datatables.min.css">

  <!-- Custom css -->
  <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  