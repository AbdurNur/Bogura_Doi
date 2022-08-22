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
      <div class="row">
        <form method="post">

          <?php
                      
              $table_name='stock';

              $stock=get_all_data($table_name,);
            
                  // print'<pre>';    
                  // print_r($all_user);
                  // print'</pre>';
          ?>

          <?php
                
                if($stock){
                    $sl=1;
                    ?>
                        <table class="table table-bordered">
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
                                    foreach($stock as $value){ 
                            
                                       
                                        
                                    
                                        ?>
                                        <tr >
                                            
                                            <th scope="row"><?php echo $sl++?></th>
                                            <td><?php echo $value->product_sl?></td>
                                            <td><?php echo $value->product_name	?></td>
                                            
                                            <td style="background-color:white;">
                                            <img style="height: 50px; width: 50px;  " src="../assets/images/<?php echo $value->product_img?>" class="card-img-top" alt="">
                                            </td>
                                            <td><?php echo $value->quantity ?></td>
                                            <td><?php echo $value->dp ?></td>
                                            <td><?php echo ($value->dp*$value->quantity) ?></td>
                                            
                                            <td><?php echo $value->product_price ?></td>
                                            <td><?php echo $value->created_at ?></td>
                                            <td><?php echo $value->created_by ?></td>
                                            <td><?php echo $value->updated_at?></td>
                                            <td><?php echo $value->updated_by ?></td>                                                      
                                            <td>
                                                
                                                  <input type="hidden" name="product_id" value="<?php echo $value->id ?>">
                                                  <input type="submit" class="btn btn-danger" name="delete_btn" value="Delete">                                                                                                
                                                
                                                 <a href="#" class="btn btn-success " >Edit</a>
                                                
                                                
                                            </td>                                                      
                                                                                                  
                                        </tr>
                                    <?php } ?>
                            
                            </tbody>
                        </table>
                    
                    <!-- end of foreach -->

                <?php } ?>

           


        </form>
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