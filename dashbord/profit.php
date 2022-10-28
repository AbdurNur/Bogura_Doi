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
          <h1 class="m-0">Dashboard</h1>
          <?php session_message(); ?>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dasbord.php">Home</a></li>
            <li class="breadcrumb-item active">Profit</li>
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
          'oder_status' => 'delivered'
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
                <th scope="col">TOTAL DP</th>
                <th scope="col">TOTAL PRICE</th>
                <th scope="col">PROFIT</th>
                <th scope="col">ORDER NO</th>


                <th scope="col">ORDER DATE</th>
                <th scope="col">DELIVERED DATE</th>

              </tr>
            </thead>
            <tbody>
              <?php


              $total_commission = 0;
              $total_dp = 0;
              $total_mrp = 0;
              $total_profit = 0;

              foreach ($total_order as $value) {


                $total_commission = $total_commission + $value->commission;
                $total_dp = $total_dp + $value->total_dp;
                $total_mrp = $total_mrp + $value->total_price;
                $profit = $value->total_price - $value->total_dp;
                $total_profit = $total_profit + $profit;

              ?>
                <tr>
                  <th scope="row"><?php echo $sl++ ?></th>
                  <td><?php echo $value->order_by ?></td>

                  <td style="background-color:white;">
                    <img style="height: 50px; width: 50px;  " src="../assets/images/<?php echo $value->product_img ?>" class="card-img-top" alt="">
                  </td>
                  <td ><?php echo $value->product_name ?></td>
                  <td><?php echo $value->quantity ?></td>
                  <td><?php echo $value->price ?></td>
                  <td><?php echo $value->commission ?></td>
                  <td><?php echo $value->total_dp ?></td>
                  <td><?php echo $value->total_price ?></td>
                  <td><?php echo $profit ?></td>
                  <td><?php echo $value->order_no ?></td>

                  <td><?php echo $value->order_date ?></td>
                  <td>
                    <?php
                    if (!empty($value->dalivery_date)) {
                      echo $value->dalivery_date;
                    } else {
                      echo "Delevery Not Yet";
                    }


                    ?>
                  </td>


                </tr>
              <?php } ?>

            </tbody>
            <tfoot>
              <tr>
                <td colspan="6" class="text-center">
                  <h1> Total Success Sales</h1>
                </td>
                <td><?php echo '=' . $total_commission . ' TK' ?></td>
                <td><?php echo '=' . $total_dp . ' TK' ?></td>
                <td><?php echo '=' . $total_mrp . ' TK' ?></td>
                <td><?php echo '=' . $total_profit . ' TK' ?></td>
                <td colspan="5"></td>
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