<!-- header part -->
<?php
include "header.php";

?>


<!-- Top Navbar -->
<?php
include "top_nav.php";
?>

<!-- /.navbar -->

<!-- Left Sidebar Container -->
<?php

include "left_nav.php";


?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">

      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">ADD USER </h1>
          
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dasbord.php">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row d-flex align-items-center justify-content-center">

          <!--Grid column-->
          <div class="col-md-6">

              <!-- Default form contact -->
              <form class="text-center" action="" method="POST">
            
            <h3 class="font-weight-bold mb-4">Register</h3>
            <?php session_message(); ?>
            <!-- Name -->
              <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping"><i
                        class="fa-solid fa-user"></i></span>
                <input type="text" id="defaultContactFormName" class="form-control" placeholder="Name" name="name">
              </div>

              <?php
                        
                        if(isset($_SESSION['error_field']['name']) && !empty($_SESSION['error_field']['name'])){

                        ?>
                        <div class="error_show">
                            <span class="text-danger">
                                <?php

                                    echo $_SESSION['error_field']['name'];

                                    unset($_SESSION['error_field']['name']);

                                ?>
                                </span>
                        </div>

              <?php } ?>


            <!-- Email -->

            <div class="input-group flex-nowrap mt-4">
                <span class="input-group-text" id="addon-wrapping"><i
                        class="fa-solid fa-envelope"></i></span>
                <input type="email" id="defaultContactFormAddress" class="form-control"
                    placeholder="example@gmail.com" name="email">
            </div>

            <?php
                        
                        if(isset($_SESSION['error_field']['email']) && !empty($_SESSION['error_field']['email'])){

                        ?>
                        <div class="error_show">
                            <span class="text-danger">
                                <?php

                                    echo $_SESSION['error_field']['email'];

                                    unset($_SESSION['error_field']['email']);

                                ?>
                                </span>
                        </div>

              <?php } ?>

              <!-- Number -->

              <div class="input-group flex-nowrap mt-4">
                <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-phone-volume"></i></span>
                <input type="number" id="" class="form-control"
                    placeholder="Number" name="number">
              </div>

            <?php
                        
                        if(isset($_SESSION['error_field']['number']) && !empty($_SESSION['error_field']['number'])){

                        ?>
                        <div class="error_show">
                            <span class="text-danger">
                                <?php

                                    echo $_SESSION['error_field']['number'];

                                    unset($_SESSION['error_field']['number']);

                                ?>
                                </span>
                        </div>

              <?php } ?>

              <!-- Password -->

              <div class="input-group flex-nowrap mt-4">
                <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-lock"></i></span>
                <input type="text" id="registration_password" class="form-control"
                    placeholder="Password" name="password">
                    <span class="input-group-text" id="addon-wrapping"><i
                      class="fa-solid fa-eye" onclick="myFunction_2()" style="cursor:pointer"></i></span>
              </div>

            <?php
                        
                        if(isset($_SESSION['error_field']['password']) && !empty($_SESSION['error_field']['password'])){

                        ?>
                        <div class="error_show">
                            <span class="text-danger">
                                <?php

                                    echo $_SESSION['error_field']['password'];

                                    unset($_SESSION['error_field']['password']);

                                ?>
                                </span>
                        </div>

              <?php } ?>


            
            <!-- address -->
            <div class="input-group flex-nowrap mt-4">
                <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-location-dot"></i></span>
                <input type="text" id="defaultContactFormAddress" class="form-control"
                    placeholder="Address" name="address">
            </div>
            <?php
                        
                        if(isset($_SESSION['error_field']['address']) && !empty($_SESSION['error_field']['address'])){

                        ?>
                        <div class="error_show">
                            <span class="text-danger">
                                <?php

                                    echo $_SESSION['error_field']['address'];

                                    unset($_SESSION['error_field']['address']);

                                ?>
                                </span>
                        </div>

              <?php } ?>

            <!-- Permanent Adress -->
            <div class="input-group flex-nowrap mt-4">
                <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-location-dot"></i></span>
                <input type="text" id="defaultContactFormAddress" class="form-control"
                    placeholder="Permanent Address" name="permanent_address">
            </div>

            <?php
                        
                        if(isset($_SESSION['error_field']['permanent_address']) && !empty($_SESSION['error_field']['permanent_address'])){

                        ?>
                        <div class="error_show">
                            <span class="text-danger">
                                <?php

                                    echo $_SESSION['error_field']['permanent_address'];

                                    unset($_SESSION['error_field']['permanent_address']);

                                ?>
                                </span>
                        </div>

              <?php } ?>
              
            <!-- Send button -->
            <input type="submit" class="btn btn-primary mt-3 btn-block" name="register" value="Registar">
           
            </form>
                <!-- Default form contact -->
          </div>
          <!--Grid column-->
      </div>
      <!-- /.row -->

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->






<!-- footer part -->
<?php
include "footer.php";

?>