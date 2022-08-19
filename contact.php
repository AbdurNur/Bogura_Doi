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

                    <!-- Default form contact -->
                    <form class="text-center" action="#!">
                        <h3 class="font-weight-bold mb-4">Contact Us</h3>
                        <!-- Name -->
                        <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="Name">
                        <!-- Email -->
                        <input type="email" id="defaultContactFormEmail" class="form-control mb-4" placeholder="E-mail">
                        <!-- Message -->
                        <div class="form-group">
                            <textarea class="form-control rounded-1" id="exampleFormControlTextarea2" rows="3"
                                placeholder="Message"></textarea>
                        </div>
                        <!-- Send button -->
                        <button class="btn btn-primary mt-3 btn-block" type="submit">Send</button>
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