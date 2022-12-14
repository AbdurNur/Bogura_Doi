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
          <h1 class="m-0">Stock</h1>
          <div class="div" id="show_message">

          </div>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dasbord.php">Home</a></li>
            <li class="breadcrumb-item active">Stock</li>
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
        <form method="post">

          <?php

          $table_name = 'stock';

          $stock = get_all_data($table_name,);

          // print'<pre>';    
          // print_r($all_user);
          // print'</pre>';
          ?>

          <?php

          if ($stock) {
            $sl = 1;
          ?>
            <table class="table table-bordered" id='data_table'>
              <thead>
                <tr>
                  <th scope="col">SL</th>
                  <th scope="col">view Sl</th>
                  <th scope="col">PRODUCT NAME</th>
                  <th scope="col">IMAGE</th>
                  <th scope="col">QUANTITY</th>
                  <th scope="col">DP</th>
                  <th scope="col"> STOCK DP</th>
                  <th scope="col">MRP</th>
                  <th scope="col">CREATED AT</th>
                  <th scope="col">CREATED BY</th>
                  <th scope="col">UPDATED AT</th>
                  <th scope="col">UPDATED BY</th>
                  <th scope="col">ACTION</th>

                </tr>
              </thead>
              <tbody>
                <?php
                $total = 0;
                $mrp_total = 0;
                foreach ($stock as $value) {

                  $stock_dp = $value->dp * $value->quantity;
                  $total = $total + $stock_dp;
                  $mrp_total = $mrp_total + ($value->product_price * $value->quantity);
                ?>
                  <tr>
                    <th scope="row"><?php echo $sl++ ?></th>
                    <td><?php echo $value->product_sl ?></td>
                    <td><?php echo $value->product_name  ?></td>
                    <td style="background-color:white;">
                      <img style="height: 50px; width: 50px;  " src="../assets/images/<?php echo $value->product_img ?>" class="card-img-top" alt="">
                    </td>
                    <td><?php echo $value->quantity ?></td>
                    <td><?php echo $value->dp ?></td>
                    <td><?php echo ($stock_dp) ?></td>
                    <td><?php echo $value->product_price ?></td>
                    <td><?php echo $value->created_at ?></td>
                    <td><?php echo $value->created_by ?></td>
                    <td><?php echo $value->updated_at ?></td>
                    <td><?php echo $value->updated_by ?></td>
                    <td>
                     
                      <button type="button" class="btn btn-danger"  onclick="product_delite('<?php echo $value->id ?>')" >Delete</button> 
                      <button type="button" class="btn btn-primary"  onclick="product_edit('<?php echo $value->id ?>')" >Edit</button>                    
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="6" class="text-center">
                    <h1>Total Stock</h1>
                  </td>
                  <td><?php echo '=' . $total . '/=' ?></td>
                  <td><?php echo '=' . $mrp_total . '/=' ?></td>
                  <td colspan="5"></td>
                </tr>
              </tfoot>
            </table>
            <!-- end of foreach -->
          <?php } ?>
        </form>
      </div>
      <!-- /.row -->
      <!-- /.row -->
      <div class="row">

        <!-- Modal start here -->
        <div class="modal fade" id="product_edit_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Product Edite</h5>
                <div class="text-white rounded-3 bg-primary" id="message"></div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body" id="product_edit_modal_body">





              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="product_edit_submit_btn">Submit</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal end here -->
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