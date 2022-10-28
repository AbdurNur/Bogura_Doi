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
          <h1 class="m-0">Cancel Order</h1>
          <?php session_message(); ?>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dasbord.php">Home</a></li>
            <li class="breadcrumb-item active">Cancel Order</li>
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
      <div class="row">

        <?php
        $where = [
          'oder_status' => 'cancel'
        ];
        $table_name = 'product_order';
        $total_order = get_all_data($table_name, $where);

        // print'<pre>';    
        // print_r($all_user);
        // print'</pre>';
        ?>
        <?php


        if ($total_order) {
          $sl = 1;
        ?>
          <table class="table table-bordered" id='data_table'>
            <thead>
              <tr>
                <th scope="col">SL</th>
                <th scope="col">ORDER BY</th>
                <th scope="col">PRODUCT</th>
                <th scope="col">PRODUCT NAME</th>
                <th scope="col">QUANTITY</th>
                <th scope="col">RATE</th>
                <th scope="col">COMMISSION</th>
                <th scope="col">TOTAL PRICE</th>
                <th scope="col">ORDER NO</th>

                <th scope="col">ORDER STATUS</th>
                <th scope="col">Remaeks</th>
                <th scope="col">ORDER DATE</th>


              </tr>
            </thead>
            <tbody>
              <?php
              $mrp_total = 0;
              foreach ($total_order as $value) {
                $mrp_total = $mrp_total + $value->total_price;
              ?>
                <tr style="background-color:<?php echo $value->color_code ?>;">
                  <td scope="row"><?php echo $sl++ ?></td>
                  <td><?php echo $value->order_by ?></td>
                  <td style="background-color:white;">
                    <img style="height: 50px; width: 50px;  " src="../assets/images/<?php echo $value->product_img ?>" class="card-img-top" alt="">
                  </td>
                  <td><?php echo $value->product_name ?></td>
                  <td><?php echo $value->quantity ?></td>
                  <td><?php echo $value->price ?></td>
                  <td><?php echo $value->commission ?></td>
                  <td><?php echo $value->total_price ?></td>
                  <td><?php echo $value->order_no ?></td>
                  <td><?php echo $value->oder_status ?></td>
                  <td><?php echo $value->comment ?></td>
                  <td><?php echo $value->order_date ?></td>
                </tr>
              <?php } ?>

            </tbody>
            <tfoot>
              <tr>
                <td colspan="7" class="text-center">
                  <h1> Total Cancel </h1>
                </td>
                <td><?php echo '=' . $mrp_total . '/=' ?></td>
                <td colspan="4"></td>
              </tr>

            </tfoot>
          </table>

          <!-- end of foreach -->

        <?php } ?>












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