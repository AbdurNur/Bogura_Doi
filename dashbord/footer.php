  <footer class="main-footer">
    <div class="container">
      <div class="py-3 text-center">
        © <?php echo date("Y");?> Copyright
        <a href="dasbord.php"> বগুড়ার দই </a>
      </div>
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="theme/plugins/jquery/jquery.min.js"></script>

  <!-- jQuery UI 1.11.4 -->
  <script src="theme/plugins/datatables/datatables.min.js"></script>


  <script src="theme/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>

  <!-- Bootstrap 4 -->
  <script src="theme/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- bootstrap-5 bundle js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="theme/plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="theme/plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="theme/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="theme/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="theme/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="theme/plugins/moment/moment.min.js"></script>
  <script src="theme/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="theme/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="theme/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="theme/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="theme/dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="theme/dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="theme/dist/js/pages/dashboard.js"></script>
  <!-- Custom js -->
  <script src="js/custom.js"></script>

  <script>
    function myFunction_2() {
      var password = document.getElementById("registration_password");
      if (password.type === "password") {
        password.type = "text";
      } else {
        password.type = "password";
      }
    }


    $(document).ready(function() {
      $('#data_table').DataTable();
    });
  </script>
  </body>

  </html>