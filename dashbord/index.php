<!-- Header Part Start -->


<?php

include "header.php";




?>


<!-- Main Content Part Start -->
<div class=" container-fluid  bg-light">
  <div class="row ">
    <div class="col col-md-12 mt-5 ">
      <div class="login-box">

        <!-- /.login-logo -->
        <div class="card">
          <div class="login-logo mt-5">
            <a class="navbar-brand" href="index.php"><img style="width: 50px;" src="../assets/images/<?php echo $_SESSION['logo']; ?>" alt=""><span class="text-primary">বগুড়ার দই ঘর </span></a>
          </div>
          <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <?php session_message(); ?>

            <!-- From Start -->
            <form method="post">
              <div class="input-group mt-3">
                <input type="text" name="email" class="form-control" placeholder="Email" value="<?php if (
                                                                                                  isset($_SESSION['form_field']['email'])
                                                                                                  && !empty($_SESSION['form_field']['email'])
                                                                                                ) {
                                                                                                  echo $_SESSION['form_field']['email'];
                                                                                                  unset($_SESSION['form_field']['email']);
                                                                                                } ?>">


                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>

                </div>

              </div>
              <div class="div">
                <?php

                if (isset($_SESSION['data']['error_field']['email']) && !empty($_SESSION['data']['error_field']['email'])) {

                ?>
                  <div class="error_show">
                    <span class="text-danger">
                      <?php

                      echo $_SESSION['data']['error_field']['email'];

                      unset($_SESSION['data']['error_field']['email']);

                      ?>
                    </span>
                  </div>

                <?php } ?>
              </div>



              <div class="input-group mt-3">
                <input type="text" class="form-control" name="password" id="password_1" placeholder="Password" value="<?php if (
                                                                                                                        isset($_SESSION['form_field']['name'])
                                                                                                                        && !empty($_SESSION['form_field']['password'])
                                                                                                                      ) {
                                                                                                                        echo $_SESSION['form_field']['password'];
                                                                                                                        unset($_SESSION['form_field']['password']);
                                                                                                                      } ?>">





                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock" onclick="myFunction()"></span>
                  </div>
                </div>
              </div>
              <div class="div">
                <?php
                if (isset($_SESSION['data']['error_field']['password']) && !empty($_SESSION['data']['error_field']['password'])) {

                ?>
                  <div class="error_show">
                    <span class="text-danger">
                      <?php

                      echo $_SESSION['data']['error_field']['password'];

                      unset($_SESSION['data']['error_field']['password']);

                      ?>
                    </span>
                  </div>

                <?php } ?>

              </div>
              <div class="row">
                <div class="col-8">
                  <div class="icheck-primary">
                    <input type="checkbox" id="remember">
                    <label for="remember">
                      Remember Me
                    </label>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-4 mt-3">
                  <input type="submit" name="dashbord_login_btn" class="btn btn-primary btn-block" id="dashbord_login_btn" value="Sign In">

                </div>
                <!-- /.col -->
              </div>
            </form>
            <!-- From End -->


            <p class="mb-1">
              <a href="#">I forgot my password</a>
            </p>

          </div>
          <!-- /.login-card-body -->
        </div>
      </div>
      <!-- /.login-box -->
    </div>
  </div>
</div>
<!-- Main Content Part End -->


<!-- Footer Part Start -->

<footer class=" bg-light">
  <div class="container">
    <div class="py-3 text-center">
      © <?php echo date("Y"); ?> Copyright
      <a href="#"> বগুড়ার দই </a>
    </div>
  </div>
</footer>

<!-- jQuery -->
<script src="theme/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="theme/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bootstrap-5 bundle js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="theme/dist/js/adminlte.js"></script>
<!-- Custom js -->
<script src="js/custom.js"></script>

<script>
  function myFunction() {
    var password = document.getElementById("password_1");
    if (password.type === "password") {
      password.type = "text";
    } else {
      password.type = "password";
    }
  }
</script>
</body>

</html>
<!-- Footer Part End -->