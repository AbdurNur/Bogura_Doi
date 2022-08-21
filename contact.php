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

<!-- =============================contact Section Start============================= -->

    <section class="bg-light vh-100">
        <div class="container py-5">
            <div class="row d-flex align-items-center justify-content-center">

                <!--Grid column-->
                <div class="col-md-6">
                    <?php session_message(); ?>
                    <!-- Default form contact -->
                    <form class="text-center" action="" method="POST">
                        <h3 class="font-weight-bold mb-4">Contact Us</h3>
                        <!-- Name -->

                            <input type="text" id="defaultContactFormName" class="form-control" placeholder="Name"     name="name">

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



                                <!-- Contact -->
                            <input type="text" id="defaultContactFormName" class="form-control mt-4" placeholder="contact" name="contact">

                                <?php
                                    
                                    if(isset($_SESSION['error_field']['contact']) && !empty($_SESSION['error_field']['contact'])){

                                    ?>
                                    <div class="error_show">
                                        <span class="text-danger">
                                            <?php

                                                echo $_SESSION['error_field']['contact'];

                                                unset($_SESSION['error_field']['contact']);

                                            ?>
                                            </span>
                                    </div>

                                <?php } ?>

                                <!-- Contact -->
                            <input type="email" id="defaultContactFormEmail" class="form-control mt-4" placeholder="E-mail" name="email">

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

                                <!-- Message -->
                    
                                <div class="form-floating mt-4">
                                  <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="Question"></textarea>
                                  <label for="floatingTextarea2">Comments</label>
                                </div>

                                    <?php                                      
                                        if(isset($_SESSION['error_field']['Question']) && !empty($_SESSION['error_field']['Question'])){

                                        ?>
                                        <div class="error_show">
                                            <span class="text-danger">
                                                <?php

                                                    echo $_SESSION['error_field']['Question'];

                                                    unset($_SESSION['error_field']['Question']);

                                                ?>
                                                </span>
                                        </div>

                                    <?php } ?>
                        <!-- Send button -->
                        <input class="btn btn-primary mt-3 btn-block" type="submit" name="Send" value="send">
                    </form>
                    <!-- Default form contact -->
                </div>
                <!--Grid column-->
            </div>
        </div>
    </section>
<!-- =============================contact Section End============================= -->

<!-- Footer Part Start-->
<?php
include "footer.php";
?>
<!-- Footer Part End -->