<!-- Header Prat Start -->
<?php
include "header.php";
?>
<!-- Header Prat End -->

<!-- ====================Top Nav Start ===================== -->
<?php
include "top_nav.php"
?>
<!-- ====================Top Nav End ===================== -->

<!-- =============================contact Section Start ============================= -->

<section class="vh-100">
    <div class="container py-5">
        <div class="row d-flex align-items-center justify-content-center">

            <!--Grid column-->
            <div class="col-md-6">

                <!-- Default form contact -->
                <form class="text-center" method="POST" enctype="multipart/form-data">
                    <h3 class="font-weight-bold mb-4">Login</h3>
                    <?php session_message(); ?>
                    <!-- Email -->
                    <div class="input-group flex-nowrap mt-4">
                        <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-envelope"></i></span>
                        <input type="text" class="form-control" placeholder="Email" name='email' aria-label="email" aria-describedby="addon-wrapping" value="<?php if (
                                                                                                                                                                    isset($_SESSION['form_field']['email'])
                                                                                                                                                                    && !empty($_SESSION['form_field']['email'])
                                                                                                                                                                ) {
                                                                                                                                                                    echo $_SESSION['form_field']['email'];
                                                                                                                                                                    unset($_SESSION['form_field']['email']);
                                                                                                                                                                } ?>">

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
                    <!-- pass  -->
                    <div class="input-group flex-nowrap mt-4">
                        <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-key"></i></span>
                        <input type="text" id="password_1" name="password" class="form-control " placeholder="Password" value="<?php if (
                                                                                                                                    isset($_SESSION['form_field']['name'])
                                                                                                                                    && !empty($_SESSION['form_field']['password'])
                                                                                                                                ) {
                                                                                                                                    echo $_SESSION['form_field']['password'];
                                                                                                                                    unset($_SESSION['form_field']['password']);
                                                                                                                                } ?>">

                        <span class="input-group-text" id="addon-wrapping" id="icon"><i class="fa-solid fa-eye-slash" onclick="myFunction()"></i></span>


                    </div>
                    <div class="dv">
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
                    <input type="submit" class="btn btn-primary mt-3 btn-block" name="btn" value="Login">

                    <p class="mt-3">Do not have Account <a href="register.php">Register</a></p>
                </form>
                <!-- Default form contact -->
            </div>
            <!--Grid column-->
        </div>
    </div>
</section>
<!-- =============================contact Section End ============================= -->



<!-- Footer Part Start-->
<?php
include "footer.php";
?>
<!-- Footer Part End -->