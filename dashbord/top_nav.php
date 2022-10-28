<?php

if ($_SESSION['login_user_type'] == '1' || $_SESSION['login_user_type'] == '2') {
  $tabe_name = 'product_order';
  $where = [
    'oder_status' => 'no_dalivered'

  ];

  //admin || maneger notification
  $data = get_table_total_row_count($tabe_name, $where);
} else {
  $tabe_name = 'product_order';

  $where = [
    'oder_status' => 'pending'

  ];

  // employee notification
  $data = get_table_total_row_count($tabe_name, $where);
}




// Message
$tabe_name = 'ask_question';
$where = [
  'replay_status' => 'not_success',

];
$messeage = get_table_total_row_count($tabe_name, $where);

?>


<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light ">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="dasbord.php" class="nav-link">Home</a>
    </li>

    <li class="nav-item d-none d-sm-inline-block">
      <a href="shop.php" class="nav-link">Shop</a>
    </li>
    <?php if (isset($_SESSION['login_user_type']) && $_SESSION['login_user_type'] == 1) { ?>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="admin_registration.php" class="nav-link">Add Employee</a>
      </li>
    <?php }  ?>
    <?php if ($_SESSION['login_user_type'] == 1 || $_SESSION['login_user_type'] == 2)  { ?>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="showroom_sales.php" class="nav-link">Showrom Sales</a>
      </li>
    <?php }  ?>


  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">

    <!-- Messages Dropdown Menu -->
    <?php
    if ($_SESSION['login_user_type'] == '1' || $_SESSION['login_user_type'] == '2') { ?>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge"><?php
                                                        echo $messeage;
                                                        ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="seen_massege.php" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">

              <div class="media-body">
                <h3 class="dropdown-item-title">
                  <?php echo $messeage ?> Message

                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>

              </div>
            </div>
            <!-- Message End -->
          </a>

        </div>
      </li>
    <?php
    }
    ?>
    <!-- Notifications Dropdown Menu -->

    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell text-danger"></i>
        <span class="badge badge-warning navbar-badge"><?php print $data  ?></span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header"><?php print $data  ?> Notifications</span>
        <div class="dropdown-divider"></div>
        <?php
        if ($_SESSION['login_user_type'] == '1' || $_SESSION['login_user_type'] == '2') { ?>
          <a href="new_order.php" class="dropdown-item">
            <i class="fa-solid fa-gift"></i> <?php print $data  ?> New Order
          </a>


        <?php } elseif ($_SESSION['login_user_type'] == '3') { ?>
          <a href="pending_order.php" class="dropdown-item">
            <i class="fa-solid fa-gift"></i> <?php print $data  ?> Pending Order
          </a>


        <?php
        }

        ?>

      </div>
    </li>


    <!-- full Scren Button -->
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>

  </ul>
</nav>
<!-- /.navbar -->