<!-- Copyright Section Start -->
<section class="footer-copyright">
        <div class="container">
            <div class="py-3 text-center">
                © <?php echo date("Y");?> Copyright
                <a href="index.php"> বগুড়ার দই </a>
            </div>
        </div>
</section>
<!-- Copyright Section End -->

<!-- bootstrap bundle js -->
<script src="theme/plugins/bootstrap_5/bootstrap.min.js"></script>
<!-- JQUERY  -->
<script src="theme/plugins/jqurey/jquery-3.6.1.min.js"></script>
<!-- JQUERY UI -->
<script src="assets/vendor/jquery-ui/jquery-ui.js"></script>
<!-- Custom js -->
<script src="assets/js/custom.js"></script>



<script>
        function myFunction() {
            var password = document.getElementById("password_1");
            if (password.type === "password") {
                password.type = "text";
            } else {
                password.type = "password";
            }
        }
        function myFunction_2() {
            var password = document.getElementById("registration_password");
            if (password.type === "password") {
                password.type = "text";
            } else {
                password.type = "password";
            }
        }
       
</script>


</body>
</html>